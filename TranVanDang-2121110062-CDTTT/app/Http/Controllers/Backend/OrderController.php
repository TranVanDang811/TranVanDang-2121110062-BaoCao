<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Orderdetail;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function index()
    {
        $list = Order::where('tvd_order.status', '!=', '0')
            ->join('tvd_user', 'tvd_user.id', '=', 'tvd_order.user_id')
            ->select('tvd_order.id', 'tvd_order.delivery_name', 'tvd_order.delivery_email', 'tvd_order.delivery_phone', 'tvd_order.delivery_address', 'tvd_order.note', 'tvd_order.status', 'tvd_user.name', 'tvd_order.created_at')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'ĐƠN HÀNG';
        return view('backend.order.index', compact('list', 'title'));
    }
    public function trash()
    {
        $list = Order::where('tvd_order.status', '=', '0')
            ->join('tvd_user', 'tvd_user.id', '=', 'tvd_order.user_id')
            ->select('tvd_order.id', 'tvd_order.delivery_name', 'tvd_order.delivery_email', 'tvd_order.delivery_phone', 'tvd_order.delivery_address', 'tvd_order.note', 'tvd_order.status', 'tvd_user.name', 'tvd_order.created_at')
            ->orderBy('created_at', 'asc')
            ->get();
        $title = 'THÙNG RÁC ĐƠN HÀNG';
        return view('backend.order.trash', compact('list', 'title'));
    }
    public function show(string $id)
    {
        $order = Order::find($id);
        $orderdetail = Orderdetail::where('tvd_orderdetail.order_id', $id)
            ->join('tvd_product', 'tvd_orderdetail.product_id', '=', 'product_id')
            ->select('tvd_product.image', 'tvd_product.name', 'tvd_orderdetail.qty', 'tvd_orderdetail.price', 'tvd_orderdetail.amount')
            ->get();
        $customer = User::where([['id', $order->user_id], ['roles', '=', '2']])->first();
        $total = 0;
        foreach ($orderdetail as $r) {
            $total += $r->price * $r->qty;
        }
        return view('backend.order.show', compact('order', 'orderdetail', 'customer', 'total'));
    }

    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()
                ->route('order.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1;
        $order->save();
        return redirect()
            ->route('order.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }

    public function restore(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()
                ->route('order.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $order->status = 2;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1;
        $order->save();
        return redirect()
            ->route('order.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    public function destroy($id)
    {
        $order = order::where([['id', '=', $id], ['status', '=', '0']])->first();
        if ($order == null) {
            return redirect()
                ->route('order.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $order->delete();
        return redirect()
            ->route('order.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    public function status($id)
    {
        $order = order::find($id);
        if ($order == null) {
            return redirect()
                ->route('order.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        if ($order->status + 1 != $status_new) {
            toastr()->error('không thể chuyển đổi', 'Thông báo');
            return redirect()->route('tvd_order.show', ['order' => $id]);
        }
        $order->status = $status_new;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1;
        $order->save();
        return redirect()
            ->route('order.show')
            ->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
