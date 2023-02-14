<?php

namespace App\View\Components;

use App\Models\Slider;
use Illuminate\View\Component;

class cpslider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $list_slider = Slider::where([
            ['status', '=', '1'],
            ['position', '=', 'slidershow']
        ])->orderBy('sort_order', 'ASC')->get();
        return view('components.cpslider', compact('list_slider'));
    }
}
