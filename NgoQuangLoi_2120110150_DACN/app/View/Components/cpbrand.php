<?php

namespace App\View\Components;

use App\Models\Brand;
use Illuminate\View\Component;

class cpbrand extends Component
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
        $list_brand = Brand::where([['parent_id', '=', '0'], ['status', '=', '1']])->get();
        return view('components.cpbrand',compact('list_brand'));
    }
}
