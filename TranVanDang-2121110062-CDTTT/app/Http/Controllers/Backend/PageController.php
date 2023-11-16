<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function index()
    {
        $pages = Post::where([['tvd_post.status', '!=', '0'], ['tvd_post.type', '=', 'page']])
            ->select('id','title','slug','status','image','description')
            ->orderBy('tvd_post.created_at', 'desc')
            ->get();
        $title = 'TRANG ĐƠN';
        return view('backend.page.index', compact('pages', 'title'));
    }
    public function create()
    {
        return view('backend.page.create');
    }
    public function store(Request $request)
    {
        $pages = new Post();
        $pages->title = $request->title;
        $pages->slug = strlen($request->slug) > 0 ? $request->slug : Str::of($request->title)->slug('-');
        $pages->detail = $request->detail;
        $pages->type = 'page';
        $pages->description = $request->description;
        $pages->created_at = date('Y-m-d H:i:s');
        $pages->created_by = 1;
        $pages->status = $request->status;
        $files = $request->file('image');
        if ($files != null) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete = app_path('images/pages/' . $pages->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $pages->slug . '.' . $extension;
            $pages->image = $filename;
            $files->move(public_path('images/pages'), $filename);
        }
        $pages->save();
        return redirect()
            ->route('pages.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }
    public function edit($id)
    {
        $pages = Post::find($id);
        if ($pages == null) {
            return redirect()
                ->route('post.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }

        return view('backend.page.edit', compact('pages'));
    }
    public function show(string $id)
    {
        $pages = Post::find($id);
        return view('backend.page.show', compact('pages'));
    }
    public function destroy($id)
    {
        $pages = post::find($id);
        if ($pages == null) {
            return redirect()
                ->route('page.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        if ($pages->delete()) {
            $link = Link::where([['type', '=', 'page'], ['table_id', '=', $id]])->first();
            $link->delete();
        }
        return redirect()
            ->route('page.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    public function trash()
    {
        $pages = Post::where([['tvd_post.status', '=', '0'], ['tvd_post.type', '=', 'page']])
        ->select('id','title','slug','status','image','description')
        ->orderBy('tvd_post.created_at', 'desc')
        ->get();
        $title = 'THÙNG RÁC TRANG ĐƠN';
        return view('backend.page.trash', compact('pages', 'title'));
    }
    //trả về
    public function restore($id)
    {
        $pages = post::find($id);
        if ($pages == null) {
            return redirect()
                ->route('page.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $pages->status = 2;
        $pages->updated_at = date('Y-m-d H:i:s');
        $pages->updated_by = Auth::id() ?? 1;
        $pages->save();
        return redirect()
            ->route('page.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $pages = post::find($id);
        if ($pages == null) {
            return redirect()
                ->route('page.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $pages->status = 0;
        $pages->updated_at = date('Y-m-d H:i:s');
        $pages->updated_by = Auth::id() ?? 1;
        $pages->save();
        return redirect()
            ->route('page.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    //trangj thais
    public function status($id)
    {
        $pages = post::find($id);
        if ($pages == null) {
            return redirect()
                ->route('page.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $pages->status = $pages->status == 1 ? 2 : 1;
        $pages->updated_at = date('Y-m-d H:i:s');
        $pages->updated_by = Auth::id() ?? 1;
        $pages->save();
        return redirect()
            ->route('page.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
