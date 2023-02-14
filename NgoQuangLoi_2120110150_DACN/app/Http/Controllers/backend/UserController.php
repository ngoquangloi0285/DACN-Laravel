<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Ho_Chi_Minh");

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('status', '!=', 0)->orderBy('created_at','desc')->get();
        return view('backend.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.register.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo("index store ");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return view('backend.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo("index edit");
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
        //
        echo("index update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo("index destroy");
    }
    public function status($id)
    {
        $status_category = User::find($id);
        if ($status_category == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!']);
        } else {
            $status_category->status = ($status_category->status == 1) ? 0 : 1;
            $status_category->updated_at = date('Y-m-d H:i:s');
            $status_category->updated_by = 1;
            $status_category->save();
            return redirect()->route('user.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!','created_at' => date('Y-m-d H:i:s')]);
        }
    }
    public function delete($id)
    {
        $status_category = User::find($id);
        if ($status_category == null) {
            return redirect()->route('user.index')
            ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!']);
        } else {
            $status_category->status = 0;
            $status_category->updated_at = date('Y-m-d H:i:s');
            $status_category->updated_by = 1;
            $status_category->save();
            return redirect()->route('user.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!','created_at' => date('Y-m-d H:i:s')]);
        }
    }
}
