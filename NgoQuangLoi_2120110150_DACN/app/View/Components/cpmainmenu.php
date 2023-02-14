<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\View\Component;

class cpmainmenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $row_menu;
    public $row_category;
    public function __construct($menu, $listcategory)
    {
        $this->row_menunu = $menu;
        $this->row_category = $listcategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $render_menu = $this->row_menunu;
        $render_category = $this->row_category;
        foreach ($render_category  as $cat) {
            $subcat = Category::where([['parent_id', '=', $cat->id], ['status', '=', '1']])->get();
        }

        $mainmenu = Menu::where([['position', '=', 'mainmenu'], ['status', '=', '1']])->get();
        $category = Category::where([['parent_id', '=', '0'], ['status', '=', '1']])->get();
        return view('components.cpmainmenu', compact('mainmenu', 'category', 'subcat'));
    }
}
