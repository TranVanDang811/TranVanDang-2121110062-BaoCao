<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class SliderController extends Controller
{
    public function index()
    {
        $list = Slider::where('status', '!=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Danh sách slider';
        return view('backend.slider.index', compact('list', 'title'));
    }
    public function create()
    {
        $list = Slider::where('status', '!=', '0')->get();
        $html_sort_order = '';
        foreach ($list as $item) {
            $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
        }
        return view('backend.slider.create', compact('html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->name = $request->name;
        $slider->link = $request->link;
        $slider->slug = Str::of($request->name)->slug('-');
        $slider->sort_order = $request->sort_order;
        $slider->position = $request->position;
        $slider->created_at = date('Y-m-d H:i:s');
        $slider->created_by = 1;
        $slider->status = $request->status;
        //upload file image
        $files = $request->file('image');
        if ($files != null) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete = app_path('images/slider/' . $slider->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $slider->slug . '.' . $extension;
            $slider->image = $filename;
            $files->move(public_path('images/slider'), $filename);
        }

        //end upload
        $slider->save();
        return redirect()
            ->route('slider.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }
    public function trash()
    {
        $slider = Slider::where('status', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Thùng rác slider';
        return view('backend.slider.trash', compact('slider', 'title'));
    }
    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $slider = slider::find($id);
        if ($slider == null) {
            return redirect()
                ->route('slider.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $slider->status = 0;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = Auth::id() ?? 1;
        $slider->save();
        return redirect()
            ->route('slider.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    public function show(string $id)
    {

        $slider = Slider::find($id);
        return view('backend.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = slider::find($id);
        if ($slider == null) {
            return redirect()
                ->route('slider.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $list = Slider::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $html_sort_order = '';
        foreach ($list as $item) {
            if ($slider->sort_order - 1 == $item->sort_order) {
                $html_sort_order .= "<option selected value ='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
            } else {
                $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
            }
        }
        return view('backend.slider.edit', compact('html_sort_order', 'slider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()
                ->route('slider.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $slider->name = $request->name;
        $slider->link = $request->link;
        $slider->slug = Str::of($request->name)->slug('-');
        $slider->sort_order = $request->sort_order;
        $slider->position = $request->position;
        $slider->created_at = date('Y-m-d H:i:s');
        $slider->created_by = 1;
        $slider->status = $request->status;
        //upload file image
        $files = $request->file('image');
        if ($files != null) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete = app_path('images/slider/' . $slider->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $slider->slug . '.' . $extension;
            $slider->image = $filename;
            $files->move(public_path('images/slider'), $filename);
        }

        //end upload
        $slider->save();
        return redirect()
            ->route('slider.index')
            ->with('message', ['type' => 'success', 'msg' => 'Cập nhật Thành Công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(string $id)
    {
        $slider = Slider::find($id);
        if ($slider == NULL) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $slider->status = 2;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = Auth::id() ?? 1;
        $slider->save();
        return redirect()->route('slider.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    public function destroy($id)
    {

        $slider = Slider::find($id);
        if ($slider == NULL) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $slider->delete();
        return redirect()->route('slider.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

    }
    public function status($id)
    {
        $slider = Slider::find($id);
        if ($slider == NULL) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $slider->status = ($slider->status==1)?2:1;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = Auth::id() ?? 1;
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
