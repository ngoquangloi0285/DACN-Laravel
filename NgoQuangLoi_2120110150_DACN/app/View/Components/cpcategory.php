<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class cpcategory extends Component
{
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $list_category = Category::where([['status', '=', '1']])->get();
        return view('components.cpcategory',compact('list_category'));
    }
}
