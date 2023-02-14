<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Link;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::where('status', '!=', 0)->orderBy('created_at','desc')->get();
        $count = Post::query()->where('status', '!=', '1')->count();
        return view('backend.post.index', compact('post', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $post = Post::where('status', '=', 0)->get();
        $count = Post::query()->where('status', '=', '0')->count();
        return view('backend.post.trash', compact('post', 'count'));
    }
    public function create()
    {
        $post = Post::get();
        $topic_id = Topic::get();
        $list_html_topic = '';
        foreach ($topic_id as $item) {
            $list_html_topic .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.post.create', compact('post', 'list_html_topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($post->title = $request->title, '-');
        $post->detail = $request->detail;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->image = $request->image;
        $post->type = 'post';
        $post->topic_id = $request->topic_id;
        $post->status = $request->status;
        // upload file
        if ($request->has('image')) {
            $path_dir = "images/post/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $post->slug . '.' . $extension;
            $file->move($path_dir, $fileName);
            $post->image = $fileName;
        }
        // end upload file
        if ($post->save()) {
            $link = new Link();
            $link->slug = $post->slug;
            $link->table_id = $post->id;
            $link->type = 'post';
            $link->save();
            return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Thêm dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm dữ liệu không thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        } else {
            return view('backend.post.show', compact('post'));
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
        $topic_id = Topic::get();
        $list_html_topic = '';
        foreach ($topic_id as $item) {
            $list_html_topic .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        $post = Post::find($id);
        return view('backend.post.edit', compact('post', 'list_html_topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = Str::slug($post->title = $request->title, '-');
        $post->detail = $request->detail;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->topic_id = $request->topic_id;
        $post->status = $request->status;
        // upload file
        if ($request->has('image')) {
            $path_dir = "images/post/";
            if (File::exists(public_path($path_dir . $post->image))) {
                File::delete(public_path($path_dir . $post->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $post->slug . '.' . $extension;
            $file->move($path_dir, $fileName);
            $post->image = $fileName;
        }
        // end upload file
        if ($post->save()) {
            $link = Link::where([['type', '=', 'post'], ['table_id', '=', $id]])->first();
            $link->slug = $post->slug;
            $link->save();
            return redirect()->route('post.index', [$id])->with('message', ['type' => 'success', 'msg' => 'Cập nhật dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật dữ liệu không thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $path_dir = "images/post/";
        $path_img_delete = public_path($path_dir . $post->image);
        if ($post == null) {
            return redirect()->route('post.post_trash')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if ($post->delete()) {
            if (File::exists($path_dir)) {
                File::delete($path_img_delete);
            }
            $link = Link::where([['type', '=', 'post'], ['table_id', '=', $id]])->first();
            $link->delete();
            return redirect()->route('post.post_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('post.post_trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa vĩnh viễn không thành công', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function delete($id)
    {
        $status = Post::find($id);
        if ($status == null) {
            return redirect()->route('post.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status->status = 0;
        $status->save();
        return redirect()->route('post.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function status($id)
    {
        $status_post = Post::find($id);
        if ($status_post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_post->status = ($status_post->status == 1) ? 0 : 1;
        $status_post->updated_at = date('Y-m-d H:i:s');
        $status_post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    public function restore($id)
    {
        $status_post = Post::find($id);
        if ($status_post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_post->status = ($status_post->status == 0) ? 1 : 0;
        $status_post->updated_at = date('Y-m-d H:i:s');
        // $status_post->updated_by = 1;
        $status_post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
}
