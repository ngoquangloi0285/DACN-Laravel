<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicStoreRequest;
use App\Http\Requests\TopicUpdateRequest;
use App\Models\Topic;
use App\Models\Link;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

date_default_timezone_set("Asia/Ho_Chi_Minh");


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at','desc')->get();
        $count = Topic::query()->where('status', '=', '0')->count();
        return view('backend.topic.index', compact('list_topic', 'count'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $topic = Topic::where('status', '=', 0)->get();
        $count = Topic::query()->where('status', '=', '0')->count();
        return view('backend.topic.trash', compact('topic', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = Topic::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($topic as $item) {
            $list_html_parentID .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $list_html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.topic.create', compact('topic', 'list_html_parentID', 'list_html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicStoreRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::slug($topic->name = $request->name, '-');
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->sort_order = 0;
        $topic->parent_id = 0;
        $topic->status = $request->status;
        if ($topic->save()) {
            $link = new Link();
            $link->slug = $topic->slug;
            $link->table_id = $topic->id;
            $link->type = 'topic';
            $link->save();
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Thêm dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm dữ liệu không thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        } else {
            return view('backend.topic.show', compact('topic'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        $list_topic_html = Topic::get();
        $list_html_parentID = '';
        $list_html_sort_order = '';
        foreach ($list_topic_html as $item) {
            $list_html_parentID .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $list_html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.topic.edit', [$id], compact('topic','list_html_parentID','list_html_sort_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TopicUpdateRequest $request, $id)
    {
        $topic = Topic::find($id);
        $topic->name = $request->name;
        $topic->slug = Str::slug($topic->name = $request->name, '-');
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->sort_order = 0;
        $topic->parent_id = 0;
        $topic->status = $request->status;
        if ($topic->save()) {
            $link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first();
            $link->slug = $topic->slug;
            $link->save();
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật dữ liệu không thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function status($id)
    {
        $status_topic = Topic::find($id);
        if ($status_topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_topic->status = ($status_topic->status == 1) ? 0 : 1;
        $status_topic->updated_at = date('Y-m-d H:i:s');
        // $status_topic->updated_by = 1;
        $status_topic->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function restore($id)
    {
        $status_topic = Topic::find($id);
        if ($status_topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_topic->status = ($status_topic->status == 0) ? 1 : 0;
        $status_topic->updated_at = date('Y-m-d H:i:s');
        // $status_topic->updated_by = 1;
        $status_topic->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function delete($id)
    {
        $status_topic = Topic::find($id);
        if ($status_topic == null) {
            return redirect()->route('topic.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_topic->status = 0;
        $status_topic->save();
        return redirect()->route('topic.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function destroy($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.topic_trash')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if ($topic->delete()) {
            $link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first();
            $link->delete();
            return redirect()->route('topic.topic_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('topic.topic_trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa vĩnh viễn không thành công', 'created_at' => date('Y-m-d H:i:s')]);
    }

}
