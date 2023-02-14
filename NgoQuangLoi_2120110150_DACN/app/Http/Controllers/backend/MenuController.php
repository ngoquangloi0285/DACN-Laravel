<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\menuStoreRequest;
use App\Http\Requests\menuUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Link;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

date_default_timezone_set("Asia/Ho_Chi_Minh");


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $post = Post::where([['status', '!=', 0], ['type', '=', 'post']])->orderBy('created_at', 'desc')->get();
        $menu = Menu::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $count = Menu::query()->where('status', '=', '0')->count();
        return view('backend.menu.index', compact('menu', 'count', 'category', 'brand', 'topic', 'post'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $menu = Menu::where('status', '=', 0)->get();
        $count = Menu::query()->where('status', '=', '0')->count();
        return view('backend.menu.trash', compact('menu', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($menu as $item) {
            $list_html_parentID .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $list_html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.menu.create', compact('menu', 'list_html_parentID', 'list_html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = $request->link;
        $menu->type = 'custom';
        $menu->parent_id = $request->parent_id;
        $menu->sort_order = $request->sort_order;
        $menu->position = $request->position;
        $menu->status = 1;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->save();
        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm Menu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        // category
        if (isset($request->ADDCATEGORY)) {
            $list_id = $request->checkIdCategory;
            foreach ($list_id as $id) {
                $category = Category::find($id);
                $menu = new Menu();
                $menu->name = $category->name;
                $menu->slug = $category->slug;
                $menu->table_id = $id;
                $menu->parent_id = 0;
                $menu->sort_order = 1;
                $menu->type = 'category';
                $menu->position = $request->position;
                $menu->status = $category->status;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm Menu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        // brand
        if (isset($request->ADDRAND)) {
            $list_id = $request->checkIdBrand;
            foreach ($list_id as $id) {
                $brand = Brand::find($id);
                $menu = new Menu();
                $menu->name = $brand->name;
                $menu->slug = $brand->slug;
                $menu->table_id = $id;
                $menu->parent_id = 0;
                $menu->sort_order = 1;
                $menu->type = 'brand';
                $menu->position = $request->position;
                $menu->status = $brand->status;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm Menu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        // topic
        if (isset($request->ADDTOPIC)) {
            $list_id = $request->checkIdTopic;
            foreach ($list_id as $id) {
                $topic = Topic::find($id);
                $menu = new Menu();
                $menu->name = $topic->name;
                $menu->slug = $topic->slug;
                $menu->table_id = $id;
                $menu->parent_id = 0;
                $menu->sort_order = 1;
                $menu->type = 'topic';
                $menu->position = $request->position;
                $menu->status = $topic->status;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm Menu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        // post
        if (isset($request->ADDPOST)) {
            $list_id = $request->checkIdPost;
            foreach ($list_id as $id) {
                $post = Post::find($id);
                $menu = new Menu();
                $menu->name = $post->title;
                $menu->slug = $post->slug;
                $menu->table_id = $id;
                $menu->parent_id = 0;
                $menu->sort_order = 1;
                $menu->type = 'post';
                $menu->position = $request->position;
                $menu->status = $post->status;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm Menu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if (isset($request->ADDCUSTOM)) {
            $menu = new Menu();
            $menu->name = $request->name;
            $menu->slug = $request->link;
            $menu->type = 'custom';
            $menu->parent_id = 0;
            $menu->sort_order = 1;
            $menu->position = $request->position;
            $menu->status = 1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->save();
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm Menu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('menu.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return view('backend.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $list_menu_html = Menu::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($list_menu_html as $item) {
            $list_html_parentID .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $list_html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.menu.edit', [$id], compact('menu', 'list_html_parentID', 'list_html_sort_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->slug = Str::slug($menu->name = $menu->name, '-');
        $menu->type = 'custom';
        $menu->parent_id = $request->parent_id;
        $menu->sort_order = $request->sort_order;
        $menu->position = $request->position;
        $menu->status = 1;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->save();
        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Sửa Menu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function status($id)
    {
        $status_menu = Menu::find($id);
        if ($status_menu == null) {
            return redirect()->route('menu.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_menu->status = ($status_menu->status == 1) ? 0 : 1;
        $status_menu->updated_at = date('Y-m-d H:i:s');
        // $status_menu->updated_by = 1;
        $status_menu->save();
        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function restore($id)
    {
        $status_menu = Menu::find($id);
        if ($status_menu == null) {
            return redirect()->route('menu.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_menu->status = ($status_menu->status == 0) ? 1 : 0;
        $status_menu->updated_at = date('Y-m-d H:i:s');
        // $status_menu->updated_by = 1;
        $status_menu->save();
        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function delete($id)
    {
        $status_menu = Menu::find($id);
        if ($status_menu == null) {
            return redirect()->route('menu.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_menu->status = 0;
        $status_menu->save();
        return redirect()->route('menu.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function destroy($id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('menu.menu_trash')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if ($menu->delete()) {
            return redirect()->route('menu.menu_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('menu.menu_trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa vĩnh viễn không thành công', 'created_at' => date('Y-m-d H:i:s')]);
    }
}
