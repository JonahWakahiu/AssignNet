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
        $academicLevels = [
            [
                'label' => 'College',
                'value' => 'College',
            ],
            [
                'label' => 'Undergraduate',
                'value' => 'Undergraduate',
            ],
            [
                'label' => 'Masters',
                'value' => 'Masters',
            ],
            [
                'label' => 'PhD',
                'value' => 'PhD',
            ],
        ];


        $paper_types = [
            'Research Paper',
            'Essay',
            'Report',
            'Case Study',
            'Literature Review',
            'Thesis/Dissertation',
            'Annoted Bibliography',
            'Team Paper',
            'Reflective Paper',
            'Business Plan',
            'White Paper',
            'Proposal',
            'Creative Writing',
            'Lab Report'
        ];

        $disciplines = [
            ['label' => 'Arts', 'value' => 'Arts'],
            ['label' => 'Biology', 'value' => 'Biology'],
            ['label' => 'Business', 'value' => 'Business'],
            ['label' => 'Chemistry', 'value' => 'Chemistry'],
            ['label' => 'childcare', 'value' => 'Childcare'],
            ['label' => 'Computers', 'value' => 'Computers'],
            ['label' => 'Counseling', 'value' => 'Counseling'],
            ['label' => 'Criminology', 'value' => 'Criminology'],
            ['label' => 'Education', 'value' => 'Education'],
            ['label' => 'Economics', 'value' => 'Economics'],
            ['label' => 'Enginering', 'value' => 'Engineering'],
            ['label' => 'Environmental-Studies', 'value' => 'Environment-Studies'],
            ['label' => 'Ethics', 'value' => 'Ethics'],
            ['label' => 'Ethnic-Studies', 'value' => 'ethnic-Studies'],
            ['label' => 'Finance', 'value' => 'Finance'],
            ['label' => 'Food-Nutrition', 'value' => 'Food-Nutrition'],
            ['label' => 'Geograpy', 'value' => 'Geograpy'],
            ['label' => 'Health-Care', 'value' => 'Health-Care'],
            ['label' => 'History', 'value' => 'History'],
            ['label' => 'Law', 'value' => 'Law'],
            ['label' => 'Linguistic', 'value' => 'Linguistic'],
            ['label' => 'Literature', 'value' => 'Literature'],
            ['label' => 'Management', 'value' => 'Management'],
            ['label' => 'Mathematics', 'value' => 'Mathematics'],
            ['label' => 'Medicine', 'value' => 'Medicine'],
            ['label' => 'Music', 'value' => 'Music'],
            ['label' => 'Nursing', 'value' => 'Nursing'],
            ['label' => 'Philosophy', 'value' => 'Philosophy'],
            ['label' => 'Physical-Education', 'value' => 'Physical-Education'],
            ['label' => 'Physics', 'value' => 'Physics'],
            ['label' => 'Political-Science', 'value' => 'Political-Science'],
            ['label' => 'Programming', 'value' => 'Programming'],
            ['label' => 'Psycology', 'value' => 'Psycology'],
            ['label' => 'Religion', 'value' => 'Religion'],
            ['label' => 'Sociology', 'value' => 'Sociology'],
            ['label' => 'Statistics', 'value' => 'Statistics'],
        ];

        // prices
        $basePrices = [
            'college' => 20,
            'undergraduate' => 25,
            'masters' => 30,
            'PhD' => 35,
        ];

        // Additional cost per page
        $pricePerPage = 5;

        // Urgency multipliers
        $urgencyMultipliers = [
            '6 hours' => 2.0,
            '12 hours' => 1.75,
            '24 hours' => 1.5,
            '48 hours' => 1.25,
            '3 days' => 1.1,
            '5 days' => 1.05,
            '7 days' => 1.0,
        ];

        // Writer category multipliers
        $writersCategoryMultipliers = [
            'standard' => 1.0,
            'premium' => 1.2,
            'platinum' => 1.5,
        ];




        $order = $request->session()->get('order');

        return view(
            'client.order.step-one',
            compact(
                'academicLevels',
                'paper_types',
                'disciplines',
                'order',
                'basePrices',
                'pricePerPage',
                'urgencyMultipliers',
                'writersCategoryMultipliers'

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
