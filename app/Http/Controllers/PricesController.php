<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PricesController extends Controller
{
    public function index(): View
    {
        $categories = config('order.categories');
        $deadline = config('order.deadline');
        $levels = config('order.levels');
        $basePrices = config('order.basePrices');
        $writerCategoryMultipliers = config('order.writerCategoryMultipliers');
        $urgencyMultipliers = config('order.urgencyMultipliers');
        return view(
            'client.prices.index',
            compact(
                'categories',
                'deadline',
                'levels',
                'basePrices',
                'writerCategoryMultipliers',
                'urgencyMultipliers',
            )
        );
    }
}
