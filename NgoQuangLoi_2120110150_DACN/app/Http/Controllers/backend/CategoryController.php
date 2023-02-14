<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Link;
use Illuminate\Support\Facades\File;
use PDO;

// Current time in Ho_Chi_Minh city
date_default_timezone_set("Asia/Ho_Chi_Minh");

class CategoryController extends Controller
{

    public function index()
    {
        $list_category = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $count = Category::query()->where('status', '=', '0')->count();
        return view('backend.category.index', compact('list_category', 'count'));
    }

    public function trash()
    {
        $category = Category::where('status', '=', 0)->get();
        $count = Category::query()->where('status', '=', '0')->count();
        return view('backend.category.trash', compact('category', 'count'));
    }

    public function create()
    {
        $category = Category::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($category as $item) {
            $list_html_parentID .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $list_html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.category.create', compact('list_html_parentID', 'list_html_sort_order'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($category->name = $category->name, '-');
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->image = $request->image;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->status = $request->status;
        // upload file
        if ($request->has('image')) {
            $path_dir = "images/category/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $category->slug . '.' . $extension;
            $file->move($path_dir, $fileName);
            $category->image = $fileName;
        }
        // end upload file
        if ($category->save()) {
            $link = new Link();
            $link->slug = $category->slug;
            $link->table_id = $category->id;
            $link->type = 'category';
            $link->save();
        }
        return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Thêm dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function show($id)
    {
        $show = Category::find($id);
        return view('backend.category.show', compact('show'));
    }


    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        $list_parentID = Category::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($list_parentID as $item) {
            $list_html_parentID .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $list_html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.category.edit', compact('category', 'list_html_parentID', 'list_html_sort_order'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($category->name = $request->name, '-');
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->status = $request->status;
        // upload file
        if ($request->has('image')) {
            $path_dir = "images/category/";
            if (File::exists(public_path($path_dir . $category->image))) {
                File::delete(public_path($path_dir . $category->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $category->slug . '.' . $extension;
            $file->move($path_dir, $fileName);
            $category->image = $fileName;
        }
        // end upload file
        if ($category->save()) {
            $link = Link::where([['type', '=', 'category'], ['table_id', '=', $id]])->first();
            $link->slug = $category->slug;
            $link->save();
        }
        return redirect()->route('category.index', [$id])->with('message', ['type' => 'success', 'msg' => 'Cập nhật dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function status($id)
    {
        $status_category = Category::find($id);
        if ($status_category == null) {
            return redirect()->route('category.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        } else {
            $status_category->status = ($status_category->status == 1) ? 0 : 1;
            $status_category->updated_at = date('Y-m-d H:i:s');
            $status_category->save();
            return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
    }

    public function delete($id)
    {
        $status_category = Category::find($id);
        if ($status_category == null) {
            return redirect()->route('category.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        // ràng buộc
        $count_product = Product::where('category_id', '=', $id)->count();
        if ($count_product != 0) {
            return redirect()->route('category.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu này không thể xoá!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_category->status = 0;
        $status_category->save();
        return redirect()->route('category.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function restore($id)
    {
        $status_category = Category::find($id);
        if ($status_category == null) {
            return redirect()->route('category.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_category->status = ($status_category->status == 0) ? 1 : 0;
        $status_category->updated_at = date('Y-m-d H:i:s');
        // $status_brand->updated_by = 1;
        $status_category->save();
        return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $path_dir = "images/category/";
        $path_img_delete = public_path($path_dir . $category->image);
        if ($category == null) {
            return redirect()->route('category.category_trash')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if ($category->delete()) {
            if (File::exists($path_dir)) {
                File::delete($path_img_delete);
            }
            $link = Link::where([['type', '=', 'category'], ['table_id', '=', $id]])->first();
            $link->delete();
            return redirect()->route('category.category_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('category.category_trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa vĩnh viễn không thành công', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function category_des_del_res_all(Request $request)
    {
        if (isset($request->desall)) {
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $category = Category::find($item);
                $category->status = 0;
                $category->save();
            }
            return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được xoá thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if (isset($request->resall)) {
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $category = Category::find($item);
                $category->status = 1;
                $category->save();
            }
            return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if (isset($request->deleteall)) {
            $path_dir = "images/category/";
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $category = Category::find($item);
                if ($category->delete()) {
                    $path_img_delete = public_path($path_dir . $category->image);
                    if (File::exists($path_dir)) {
                        File::delete($path_img_delete);
                    }
                    $link = Link::where([['type', '=', 'category'], ['table_id', '=', $item]])->first();
                    $link->delete();
                }
            }
            return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được xoá vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
    }
}
