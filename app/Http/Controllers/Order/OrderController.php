<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function orderStepOne(Request $request): View
    {
        $levels = config('order.levels');
        $disciplines = config('order.disciplines');
        $deadline = config('order.deadline');
        $paperTypes = config('order.paperTypes');
        $categories = config('order.categories');
        $currency = config('order.currency');
        $currencySymbols = config('order.currencySymbols');
        $currencyMultipliers = config('order.currencyMultipliers');
        $basePrices = config('order.basePrices');
        $pricePerPage = config('order.pricePerPage');
        $urgencyMultipliers = config('order.urgencyMultipliers');
        $writerCategoryMultipliers = config('order.writerCategoryMultipliers');
        $deadline = config('order.deadline');


        $order = $request->session()->get('order');

        return view(
            'client.order.step-one',
            compact(
                'levels',
                'paperTypes',
                'categories',
                'disciplines',
                'deadline',
                'order',
                'basePrices',
                'pricePerPage',
                'urgencyMultipliers',
                'writerCategoryMultipliers',
                'currency',
                'currencyMultipliers',
                'currencySymbols',
            )
        );
    }

    public function handleOrderStepOne(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'academic_level' => 'required',
            'paper_type' => 'required',
            'discipline' => 'required',
            'topic' => 'required',
            'paper_instructions' => 'required',
            'additional_materials' => 'required',
            'paper_format' => 'required',
            'number_of_pages' => 'required',
            'currency' => 'required',
            'deadline' => 'required',
            'writer_category' => 'required',
        ]);

        if ($request->hasFile('additional_materials')) {
            $temporaryPath = $request->additional_materials->store('orders/temp', 'public');
            $validated['additional_materials'] = $temporaryPath;
        }


        if (empty($request->session()->get('order'))) {
            $order = new Order();
            $order->fill($validated);
            $request->session()->put('order', $order);
        } else {
            $order = $request->session()->get('order');
            $order->fill($validated);
            $request->session()->put('order', $order);
        }

        return redirect()->route('order.step-two');
    }

    public function orderStepTwo(Request $request): View|RedirectResponse
    {
        if (empty($request->session()->get('order'))) {
            return redirect()->route('order.step-one');
        }

        return view('client.order.step-two');
    }

    public function handleOrderStepTwo(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('newUser', [
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|string|email|unique:users,email',
            'phone_number' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->symbols()],
        ]);


        try {
            DB::beginTransaction();
            $role_id = Role::where('name', 'user')->first()->pluck('id');

            $user = User::create($validated);
            $user->roles()->sync($role_id);

            $order = $request->session()->get('order');

            if ($order->additional_materials) {
                $finalPath = str_replace('orders/temp', 'orders/additional_materials', $order->additional_materials);
                Storage::move($order->additional_materials, $finalPath);
                $order->additional_materials = $finalPath;
            }

            $order['order_id'] = Str::random(10);

            $order->user()->associate($user)->save();

            $request->session()->forget('order');

            Auth::login($user);
            event(new Registered($user));

            DB::commit();
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            DB::rollback();

            // Delete the temporary file if something goes wrong
            if ($order->additional_materials) {
                Storage::delete($order->additional_materials);
            }

            return back()->withInput()->with('error', $th->getMessage());
        }


    }
    public function handleOrderStepTwoExistingUser(Request $request): RedirectResponse
    {
        $credentials = $request->validateWithBag('exisitingUser', [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            try {
                DB::beginTransaction();

                $user = $request->user();

                $order = $request->session()->get('order');

                if ($order->additional_materials) {
                    $finalPath = str_replace('orders/temp', 'orders/additional_materials', $order->additional_materials);
                    Storage::move($order->additional_materials, $finalPath);
                    $order->additional_materials = $finalPath;
                }

                $order['order_id'] = Str::random(10);


                $order->user()->associate($user)->save();

                $request->session()->regenerate();

                DB::commit();
                return redirect()->route('dashboard');
            } catch (\Throwable $th) {
                DB::rollBack();

                // Delete the temporary file if something goes wrong
                if ($order->additional_materials) {
                    Storage::delete($order->additional_materials);
                }

                return back()->withInput()->with('error', $th->getMessage());
            }

        }
        return back()->withErrors(['email' => 'We could not find the provided details in our records'])->onlyInput('email');


    }
}
