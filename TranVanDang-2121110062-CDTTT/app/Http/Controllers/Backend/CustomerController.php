<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    public function index()
    {
        $list = User::where([['status', '!=', '0'], ['roles', '=', '2']])
            ->select('id', 'name', 'username', 'status', 'phone', 'email')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Danh sách khách hàng';
        $count_all = User::where('roles', '=', 'customer')->count();
        $count_trash = User::where([['status', '=', '0'], ['roles', '=', 'customer']])->count();
        return view('backend.customer.index', compact('list', 'title', 'count_all', 'count_trash'));
    }
    public function trash()
    {
        $list = User::where([['status', '=', '0'], ['roles', '=', '2']])
            ->select('id', 'name', 'username', 'status', 'phone', 'email')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Thùng rác khách hàng';
        $count_all = User::where('roles', '=', 'customer')->count();
        $count_trash = User::where([['status', '=', '0'], ['roles', '=', 'customer']])->count();
        return view('backend.customer.trash', compact('list', 'title', 'count_all', 'count_trash'));
    }
    public function create()
    {
        $list = User::where('status', '!=', '0')->get();
        return view('backend.customer.create');
    }
    public function store(Request $request)
    {
        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->username = $request->username;
        $customer->password = bcrypt($request->password);
        $customer->roles = 2;
        $customer->created_at = date('Y-m-d H:i:s');
        $customer->created_by = Auth::id() ?? 1;
        $customer->status = $request->status;
        $customer->save();
        return redirect()
            ->route('customer.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);

        // echo($request->name);
    }
    public function show(string $id)
    {
        $customer = User::where([['status', '=', '0'], ['roles', '=', '2']])->first();
        if ($customer == null) {
            return redirect()
                ->route('customer.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        return view('backend.customer.show', compact('customer'));
    }
    public function edit($id)
    {
        $customer = User::where([['id', '=', $id], ['roles', '=', '2']])->first();

        return view('backend.customer.edit', compact('customer'));
    }
    public function update(Request $request, string $id)
    {
        $customer = User::where([['id', '=', $id], ['roles', '=', '2']])->first();
        if ($customer == null) {
            return redirect()
                ->route('customer.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->username = $request->username;
        $customer->password = bcrypt($request->password);
        $customer->roles = 2;
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->updated_by = Auth::id() ?? 1;
        $customer->status = $request->status;
        $customer->save();
        return redirect()
            ->route('customer.index')
            ->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành Công']);

        // echo($request->name);
    }
    public function destroy($id)
    {
        $customer = User::where([['id', '=', $id], ['roles', '=', '2']])->first();
        if ($customer == null) {
            return redirect()
                ->route('customer.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $customer->delete();
        return redirect()
            ->route('customer.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    public function restore($id)
    {
        $customer = User::where([['id', '=', $id], ['roles', '=', '2']])->first();
        if ($customer == null) {
            return redirect()
                ->route('customer.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $customer->status = 2;
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->updated_by = Auth::id() ?? 1;
        $customer->save();
        return redirect()
            ->route('customer.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $customer = User::where([['id', '=', $id], ['roles', '=', '2']])->first();
        if ($customer == null) {
            return redirect()
                ->route('customer.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $customer->status = 0;
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->updated_by = Auth::id() ?? 1;
        $customer->save();
        return redirect()
            ->route('customer.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    //trangj thais
    public function status($id)
    {
        $customer = User::where([['id', '=', $id], ['roles', '=', '2']])->first();
        if ($customer == null) {
            return redirect()
                ->route('customer.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $customer->status = $customer->status == 1 ? 2 : 1;
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->updated_by = Auth::id() ?? 1;
        $customer->save();
        return redirect()
            ->route('customer.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
