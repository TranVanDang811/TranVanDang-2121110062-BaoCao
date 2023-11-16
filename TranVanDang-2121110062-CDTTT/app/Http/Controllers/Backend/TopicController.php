<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Link;

class TopicController extends Controller
{
    public function index()
    {
        $list = Topic::where('status', '!=', '0')
            ->orderBy('created_at', 'asc')
            ->get();
        $title = 'CHỦ ĐỀ BÀI VIẾT';
        return view('backend.topic.index', compact('list', 'title'));
    }
    public function create()
    {
        $list = Topic::where('status', '!=', '0')->get();
        $html_parent_id = '';
        foreach ($list as $item) {
            $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . '</option>';
        }
        return view('backend.topic.create', compact('html_parent_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic(); //làm cái mới
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->parent_id = $request->parent_id;
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = 1;
        $topic->status = $request->status;
        if ($topic->save()) {
            $link = new Link();
            $link->slug = $topic->slug;
            $link->type = 'topic';
            $link->table_id = $topic->id;
            $link->save();
        }
        return redirect()
            ->route('topic.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        return view('backend.topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()
                ->route('topic.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $list = Topic::where('status', '!=', '0')->get();
        $html_parent_id = '';
        foreach ($list as $item) {
            if ($item->id == $topic->parent_id) {
                $html_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . '</option>';
            } else {
                $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . '</option>';
            }
        }
        return view('backend.topic.edit', compact('html_parent_id', 'topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()
                ->route('topic.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->parent_id = $request->parent_id;
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->status = $request->status;
        if ($topic->save()) {
            $link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first();
            $link->type = 'topic';
            $link->table_id = $topic->id;
            $link->save();
        }
        return redirect()
            ->route('topic.index')
            ->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành Công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $topic = topic::find($id);
        if ($topic == null) {
            return redirect()
                ->route('topic.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        if ($topic->delete()) {
            $link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first();
            $link->delete();
        }
        return redirect()
            ->route('topic.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    public function trash()
    {
        $list = topic::where('status', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Thùng rác chủ đề';
        return view('backend.topic.trash', compact('list', 'title'));
    }
    //trả về
    public function restore($id)
    {
        $topic = topic::find($id);
        if ($topic == null) {
            return redirect()
                ->route('topic.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();
        return redirect()
            ->route('topic.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $topic = topic::find($id);
        if ($topic == null) {
            return redirect()
                ->route('topic.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();
        return redirect()
            ->route('topic.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    //trangj thais
    public function status($id)
    {
        $topic = topic::find($id);
        if ($topic == null) {
            return redirect()
                ->route('topic.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $topic->status = $topic->status == 1 ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();
        return redirect()
            ->route('topic.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
