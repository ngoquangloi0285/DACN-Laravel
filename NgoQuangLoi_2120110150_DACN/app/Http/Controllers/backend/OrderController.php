<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('status', '!=', 0)->orderBy('created_at','desc')->get();
        $count = Order::query()->where('status', '=', '0')->count();
        return view('backend.order.index', compact('order', 'count'));
    }
    public function trash()
    {
        $order = Order::where('status', '=', 0)->get();
        $count = Order::query()->where('status', '=', '0')->count();
        return view('backend.order.trash', compact('order', 'count'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $orderdetail = Orderdetail::where('order_id','=', $order->id)->first();
        if ($order && $orderdetail == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return view('backend.order.show', compact('order','orderdetail'));
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.order_trash')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        else {
            $order->delete();
            return redirect()->route('order.order_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        return redirect()->route('order.order_trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa vĩnh viễn không thành công', 'created_at' => date('Y-m-d H:i:s')]);
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
    }
    public function restore($id)
    {
        $status_order = Order::find($id);
        if ($status_order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_order->status = ($status_order->status == 0) ? 1 : 0;
        $status_order->updated_at = date('Y-m-d H:i:s');
        // $status_order->updated_by = 1;
        $status_order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function status($id)
    {
        $status_category = Order::find($id);
        if ($status_category == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!']);
        }
        $status_category->status = ($status_category->status == 1) ? 0 : 1;
        $status_category->updated_at = date('Y-m-d H:i:s');
        // $status_category->updated_by = 1;
        $status_category->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    public function delete($id)
    {
        $status_category = Order::find($id);
        if ($status_category == null) {
            return redirect()->route('order.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        $status_category->status = 0;
        $status_category->updated_at = date('Y-m-d H:i:s');
        // $status_category->updated_by = 1;
        $status_category->save();
        return redirect()->route('order.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }
}
