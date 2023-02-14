<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

date_default_timezone_set("Asia/Ho_Chi_Minh");


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::where('status', '!=', 0)->orderBy('created_at','desc')->get();
        $count = Slider::query()->where('status', '=', '0')->count();
        return view('backend.slider.index', compact('slider', 'count'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $slider = Slider::where('status', '=', 0)->get();
        $count = Slider::query()->where('status', '=', '0')->count();
        return view('backend.slider.trash', compact('slider', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider = Slider::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($slider as $item) {
            $list_html_sort_order .= '<option value="' . $item->id . '">Sau: ' . $item->title . '</option>';
        }
        return view('backend.slider.create', compact('slider', 'list_html_parentID', 'list_html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderStoreRequest $request)
    {
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->image = $request->image;
        $slider->sort_order = $request->sort_order;
        $slider->link = $request->link;
        $slider->position = 'slidershow';
        $slider->status = $request->status;
        // upload file
        if ($request->has('image')) {
            $path_dir = "images/slider/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $slider->title . '.' . $extension;
            $file->move($path_dir, $fileName);
            $slider->image = $fileName;
        }
        // end upload file
        if ($slider->save()) {
            $link = new Link();
            $link->slug = $slider->title;
            $link->table_id = $slider->id;
            $link->type = 'slider';
            $link->save();
            return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Thêm dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm dữ liệu không thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return view('backend.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        $list_slider_html = Slider::get();
        $list_html_sort_order = '';
        foreach ($list_slider_html as $item) {
            $list_html_sort_order .= '<option value="' . $item->id . '">Sau: ' . $item->title . '</option>';
        }
        return view('backend.slider.edit', [$id], compact('slider', 'list_html_sort_order'));
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
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->sort_order = $request->sort_order;
        $slider->status = $request->status;
        // upload file
        if ($request->has('image')) {
            $path_dir = "images/slider/";
            if (File::exists(public_path($path_dir . $slider->image))) {
                File::delete(public_path($path_dir . $slider->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $slider->title . '.' . $extension;
            $file->move($path_dir, $fileName);
            $slider->image = $fileName;
        }
        // end upload file
        if ($slider->save()) {
            $link = Link::where([['type', '=', 'slider'], ['table_id', '=', $id]])->first();
            $link->slug = $slider->title;
            $link->save();
            return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật dữ liệu không thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function status($id)
    {
        $status_slider = Slider::find($id);
        if ($status_slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_slider->status = ($status_slider->status == 1) ? 0 : 1;
        $status_slider->updated_at = date('Y-m-d H:i:s');
        // $status_slider->updated_by = 1;
        $status_slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function restore($id)
    {
        $status_slider = Slider::find($id);
        if ($status_slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_slider->status = ($status_slider->status == 0) ? 1 : 0;
        $status_slider->updated_at = date('Y-m-d H:i:s');
        // $status_slider->updated_by = 1;
        $status_slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function delete($id)
    {
        $status_slider = Slider::find($id);
        if ($status_slider == null) {
            return redirect()->route('slider.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_slider->status = 0;
        $status_slider->save();
        return redirect()->route('slider.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $path_dir = "images/slider/";
        $path_img_delete = public_path($path_dir . $slider->image);
        if ($slider == null) {
            return redirect()->route('slider.slider_trash')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if ($slider->delete()) {
            if (File::exists($path_dir)) {
                File::delete($path_img_delete);
            }
            $link = Link::where([['type', '=', 'slider'], ['table_id', '=', $id]])->first();
            $link->delete();
            return redirect()->route('slider.slider_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('slider.slider_trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa vĩnh viễn không thành công', 'created_at' => date('Y-m-d H:i:s')]);
    }
}
