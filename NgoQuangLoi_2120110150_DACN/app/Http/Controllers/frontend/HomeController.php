<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Link;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($slug = null)
    {
        if ($slug == null) {
            return $this->home();
        } else {
            $link = Link::where('slug', '=', $slug)->first();
            if ($link == null) {
                $product = Product::where([['status', '=', '1'], ['slug', '=', $slug]])->first();
                if ($product != null) {
                    return $this->product_detail($product);
                } else {
                    $args = [
                        ['status', '=', '1'],
                        ['slug', '=', $slug],
                        ['type', '=', 'post']
                    ];
                    $post = Post::where($args)->first();
                    if ($post != null) {
                        return $this->post_detail($post);
                    } else {
                        return $this->error_404($slug);
                    }
                }
            } else {
                $type = $link->type;
                switch ($type) {
                    case 'category': {
                            return $this->product_category($slug);
                        }
                    case 'brand': {
                            return $this->product_brand($slug);
                        }
                    case 'topic': {
                            return $this->post_topic($slug);
                        }
                }
            }
        }
    }
    public function home()
    {
        $menu = Menu::where([['position', '=', 'mainmenu'], ['status', '=', '1']])->get();
        $listcategory = Category::where([['parent_id', '=', '0'], ['status', '=', '1']])->get();

        $product = Product::where([['status', '=', '1']])->orderBy('created_at', 'DESC')->get()->take(8);
        return view('frontend.index', compact('menu', 'listcategory', 'product'));
    }
    public function product_category($slug)
    {
        $row_cat = Category::where([['slug', '=', $slug], ['parent_id', '=', '0'], ['status', '=', '1']])->first();
        $arr_category = array();
        array_push($arr_category, $row_cat->id);
        // xét cấp cha 0
        $list_category_c1 = Category::where([['parent_id', '=', $row_cat->id], ['status', '=', '1']])->get();
        if (count($list_category_c1) > 0) {
            foreach ($list_category_c1 as $row_cat_1) {
                array_push($arr_category, $row_cat_1->id);
                // xét cấp con 1
                $list_category_c2 = Category::where([['parent_id', '=', $row_cat_1->id], ['status', '=', '1']])->get();
                if (count($list_category_c2) > 0) {
                    foreach ($list_category_c2 as $row_cat_2) {
                        array_push($arr_category, $row_cat_2->id);
                        // xét cấp con 1
                        $list_category_c3 = Category::where([['parent_id', '=', $row_cat_2->id], ['status', '=', '1']])->get();
                        if (count($list_category_c3) > 0) {
                            foreach ($list_category_c3 as $row_cat_3) {
                                array_push($arr_category, $row_cat_3->id);
                            }
                        }
                    }
                }
            }
        }
        $product_list = Product::where('status', '=', '1')->whereIn('category_id', $arr_category)
        ->orderBy('created_at', 'desc')
        ->paginate(18);
        return view('frontend.product-category', compact('row_cat','product_list'))->with('ads', $product_list);
    }
    public function product_brand($slug)
    {
        $row_brand = Brand::where([['slug', '=', $slug], ['status', '=', '1']])->first();
        $product_list = Product::where([['status', '=', '1'],['brand_id','=',$row_brand->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('frontend.product-brand',compact('row_brand','product_list'));
    }
    // product_detail
    public function product_detail($product)
    {
        return view('frontend.product-detail',compact('product'));
    }
    public function post_topic($slug)
    {
        return view('frontend.news');
    }


    // post_detail
    public function post_detail($post)
    {
        return view('frontend.post-detail');
    }
    public function error_404($slug)
    {
        return view('frontend.404');
    }
}
