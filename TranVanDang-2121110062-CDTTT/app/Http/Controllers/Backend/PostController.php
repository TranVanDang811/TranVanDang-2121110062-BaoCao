<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $list = Post::where([['tvd_post.status', '!=', '0'], ['tvd_post.type', '=', 'post']])
            ->join('tvd_topic', 'tvd_topic.id', '=', 'tvd_post.topic_id')
            ->select('tvd_post.*', 'tvd_topic.name as nametopic')
            ->orderBy('tvd_post.created_at', 'desc')
            ->get();
        $title = 'BÀI VIẾT';
        return view('backend.post.index', compact('list', 'title'));
    }
    public function create()
    {
        $list = Topic::where('status', '!=', '0')
            ->select('name', 'id', 'status')
            ->orderBy('created_at', 'desc')
            ->get();
        $html_topic_id = '';
        foreach ($list as $item) {
            $html_topic_id .= "<option value='" . $item->id . "'>" . $item->name . '</option>';
        }
        return view('backend.post.create', compact('html_topic_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->topic_id = $request->topic_id;
        $post->title = $request->title;
        $post->slug = strlen($request->slug) > 0 ? $request->slug : Str::of($request->title)->slug('-');
        $post->detail = $request->detail;
        $post->type = $request->type;
        $post->description = $request->description;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = 1;
        $post->status = $request->status;
        $files = $request->file('image');
        if ($files != null) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete = app_path('images/post/' . $post->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $post->slug . '.' . $extension;
            $post->image = $filename;
            $files->move(public_path('images/post'), $filename);
        }
        $post->save();
        return redirect()
            ->route('post.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }
    public function edit($id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()
                ->route('post.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $list = Topic::where('status', '!=', '0')
            ->select('name', 'id', 'status')
            ->orderBy('created_at', 'desc')
            ->get();
        $html_topic_id = '';
        foreach ($list as $item) {
            if ($item->id == $post->topic_id) {
                $html_topic_id .= "<option selected value='" . $item->id . "'>" . $item->name . '</option>';
            } else {
                $html_topic_id .= "<option value='" . $item->id . "'>" . $item->name . '</option>';
            }
        }
        return view('backend.post.edit', compact('html_topic_id','post'));
    }
    public function update(Request $request,string $id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()
                ->route('post.index')
                ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
        }
        $post->topic_id = $request->topic_id;
        $post->title = $request->title;
        $post->slug = strlen($request->slug) > 0 ? $request->slug : Str::of($request->title)->slug('-');
        $post->detail = $request->detail;
        $post->type = $request->type;
        $post->description = $request->description;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = 1;
        $post->status = $request->status;
        $files = $request->file('image');
        if ($files != null) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete = app_path('images/post/' . $post->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $post->slug . '.' . $extension;
            $post->image = $filename;
            $files->move(public_path('images/post'), $filename);
        }
        //end upload
        $post->save();
        return redirect()
            ->route('post.index')
            ->with('message', ['type' => 'success', 'msg' => 'Cập nhật Thành Công']);
    }
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('backend.post.show', compact('post'));
    }
    public function destroy($id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()
                ->route('post.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        if ($post->delete()) {
            $link = Link::where([['type', '=', 'post'], ['table_id', '=', $id]])->first();
            $link->delete();
        }
        return redirect()
            ->route('post.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    public function trash()
    {
        $list = Post::where([['tvd_post.status', '=', '0'], ['tvd_post.type', '=', 'post']])
            ->join('tvd_topic', 'tvd_topic.id', '=', 'tvd_post.topic_id')
            ->select('tvd_post.*', 'tvd_topic.name as nametopic')
            ->orderBy('tvd_post.created_at', 'desc')
            ->get();
        $title = 'Thùng rác danh mục';
        return view('backend.post.trash', compact('list', 'title'));
    }
    //trả về
    public function restore($id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()
                ->route('post.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();
        return redirect()
            ->route('post.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()
                ->route('post.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();
        return redirect()
            ->route('post.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    //trangj thais
    public function status($id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()
                ->route('post.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $post->status = $post->status == 1 ? 2 : 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();
        return redirect()
            ->route('post.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
