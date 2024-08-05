<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CalculatePrice extends Component
{
    /**
     * Create a new component instance.
     */
    public array $levels;
    public array $paperTypes;
    public array $deadlines;
    public array $basePrices;
    public array $writerCategoryMultipliers;
    public array $urgencyMultipliers;

    public function __construct(
    ) {
        $this->levels = config('order.levels');
        $this->paperTypes = config('order.paperTypes');
        $this->deadlines = config('order.deadline');
        $this->basePrices = config('order.basePrices');
        $this->writerCategoryMultipliers = config('order.writerCategoryMultipliers');
        $this->urgencyMultipliers = config('order.urgencyMultipliers');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calculate-price', [
            'levels' => $this->levels,
            'paperTypes' => $this->paperTypes,
            'deadlines' => $this->deadlines,
            'basePrices' => $this->basePrices,
            'writerCategoryMultipliers' => $this->writerCategoryMultipliers,
            'urgencyMultipliers' => $this->urgencyMultipliers,
        ]);
    }
}
