<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

date_default_timezone_set("Asia/Ho_Chi_Minh");


class BrandController extends Controller
{
    
    public function index()
    {
        $list_brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $count = Brand::query()->where('status', '=', '0')->count();
        return view('backend.brand.index', compact('list_brand', 'count'));
    }

    public function trash()
    {
        $brand = Brand::where('status', '=', 0)->get();
        $count = Brand::query()->where('status', '=', '0')->count();
        return view('backend.brand.trash', compact('brand', 'count'));
    }

    public function create()
    {
        $brand = Brand::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($brand as $item) {
            $list_html_parentID .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $list_html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.brand.create', compact('brand', 'list_html_parentID', 'list_html_sort_order'));
    }

    public function store(BrandStoreRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($brand->name = $request->name, '-');
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->image = $request->image;
        $brand->sort_order = 0;
        $brand->parent_id = 0;
        $brand->status = $request->status;
        // upload file
        if ($request->has('image')) {
            $path_dir = "images/brand/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $brand->slug . '.' . $extension;
            $file->move($path_dir, $fileName);
            $brand->image = $fileName;
        }
        // end upload file
        if ($brand->save()) {
            $link = new Link();
            $link->slug = $brand->slug;
            $link->table_id = $brand->id;
            $link->type = 'brand';
            $link->save();
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thêm dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm dữ liệu không thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function show($id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return view('backend.brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        $list_brand_html = Brand::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($list_brand_html as $item) {
            $list_html_parentID .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $list_html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.brand.edit', compact('brand', 'list_html_parentID', 'list_html_sort_order'));
    }

    public function update(BrandUpdateRequest $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($brand->name = $request->name, '-');
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->sort_order = 0;
        $brand->parent_id = 0;
        $brand->status = $request->status;
        // upload file
        if ($request->has('image')) {
            $path_dir = "images/brand/";
            if (File::exists(public_path($path_dir . $brand->image))) {
                File::delete(public_path($path_dir . $brand->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $brand->slug . '.' . $extension;
            $file->move($path_dir, $fileName);
            $brand->image = $fileName;
        }
        // end upload file
        if ($brand->save()) {
            $link = Link::where([['type', '=', 'brand'], ['table_id', '=', $id]])->first();
            $link->slug = $brand->slug;
            $link->save();
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật dữ liệu không thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function status($id)
    {
        $status_brand = Brand::find($id);
        if ($status_brand == null) {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_brand->status = ($status_brand->status == 1) ? 0 : 1;
        $status_brand->updated_at = date('Y-m-d H:i:s');
        // $status_brand->updated_by = 1;
        $status_brand->save();
        return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function delete($id)
    {
        $status_brand = Brand::find($id);
        if ($status_brand == null) {
            return redirect()->route('brand.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_brand->status = 0;
        $status_brand->save();
        return redirect()->route('brand.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function restore($id)
    {
        $status_brand = Brand::find($id);
        if ($status_brand == null) {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_brand->status = ($status_brand->status == 0) ? 1 : 0;
        $status_brand->updated_at = date('Y-m-d H:i:s');
        // $status_brand->updated_by = 1;
        $status_brand->save();
        return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $path_dir = "images/brand/";
        $path_img_delete = public_path($path_dir . $brand->image);
        if ($brand == null) {
            return redirect()->route('brand.brand_trash')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if ($brand->delete()) {
            if (File::exists($path_dir)) {
                File::delete($path_img_delete);
            }
            $link = Link::where([['type', '=', 'brand'], ['table_id', '=', $id]])->first();
            $link->delete();
            return redirect()->route('brand.brand_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('brand.brand_trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa vĩnh viễn không thành công', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function des_del_res_all(Request $request)
    {
        if (isset($request->desall)) {
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $brand = Brand::find($item);
                $brand->status = 0;
                $brand->save();
            }
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được xoá thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if (isset($request->resall)) {
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $brand = Brand::find($item);
                $brand->status = 1;
                $brand->save();
            }
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if (isset($request->deleteall)) {
            $path_dir = "images/brand/";
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $brand = Brand::find($item);
                if ($brand->delete()) {
                    $path_img_delete = public_path($path_dir . $brand->image);
                    if (File::exists($path_dir)) {
                        File::delete($path_img_delete);
                    }
                    $link = Link::where([['type', '=', 'brand'], ['table_id', '=', $item]])->first();
                    $link->delete();
                }
            }
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được xoá vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
    }
}
