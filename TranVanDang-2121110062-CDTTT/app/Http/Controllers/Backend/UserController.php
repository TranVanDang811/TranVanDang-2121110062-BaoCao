<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    public function index()
    {
        $list = User::where('status', '!=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'NGƯỜI DÙNG';
        return view('backend.user.index', compact('list', 'title'));
    }
    public function create()
    {
        $list = User::where('status', '!=', '0')->get();
        return view('backend.user.create');
    }
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->roles = $request->roles;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = 1;
        $user->status = $request->status;
        $user->save();
        return redirect()
            ->route('user.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);

        // echo($request->name);
    }
    public function edit($id)
    {
        $user = User::find($id);
        if ($user == NULL) {
            return redirect()->route('user.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }

        return view('backend.user.edit', compact( 'user'));
    }
    public function update(UpdateUserRequest $request , string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()
                ->route('user.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->roles = $request->roles;
        $user->updated_at = date('Y-m-d H:i:s');;
        $user->updated_by = Auth::id() ?? 1;
        $user->status = $request->status;
        $user->save();
        return redirect()
            ->route('user.index')
            ->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành Công']);

        // echo($request->name);
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.show', compact('user'));
    }
    public function trash()
    {
        $list = User::where('status', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Thùng rác thành viên';
        return view('backend.user.trash', compact('list', 'title'));
    }
    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()
                ->route('user.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()
            ->route('user.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    public function destroy($id)
    {
        $user = user::find($id);
        if ($user == null) {
            return redirect()
                ->route('user.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        if ($user->delete()) {
            $link = Link::where([['type', '=', 'user'], ['table_id', '=', $id]])->first();
            $link->delete();
        }
        return redirect()
            ->route('user.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    //trả về
    public function restore($id)
    {
        $user = user::find($id);
        if ($user == null) {
            return redirect()
                ->route('user.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $user->status = 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()
            ->route('user.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    //trangj thais
    public function status($id)
    {
        $user = user::find($id);
        if ($user == null) {
            return redirect()
                ->route('user.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $user->status = $user->status == 1 ? 2 : 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()
            ->route('user.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
