<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Link;
use App\Http\Requests\StoreBrandRequest;


use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $list = Brand::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $title = 'Thương hiệu';
        return view('backend.brand.index', compact('list', 'title'));
    }
    public function create()
    {
        $list = Brand::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $html_sort_order = '';
        foreach ($list as $item) {
            $html_sort_order .= "<option value='" . ($item->sort_order) . "'>Sau:" . $item->name . "</option>";
        }
        return view('backend.brand.create', compact('html_sort_order'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand(); //làm cái mới
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order = $request->sort_order;
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;
        $brand->status = $request->status;
        //upload file image
        $files = $request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete=app_path("images/brand/".$brand->image);
                if(File::exists($image_path_delete)){
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $brand->slug . '.' . $extension;
            $brand->image = $filename;
            $files->move(public_path('images/brand'), $filename);
        }
        if ($brand->save()) {
            $link = new Link();
            $link->slug = $brand->slug;
            $link->type = 'brand';
            $link->table_id = $brand->id;
            $link->save();
        }
        return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
        }
        $list = Brand::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $html_sort_order = '';
        foreach ($list as $item) {
            if ($brand->sort_order - 1 == $item->sort_order) {
                $html_sort_order .= "<option selected value ='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
            } else {
                $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
            }
        }
        return view('backend.brand.edit', compact('html_sort_order', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
        }
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order = $request->sort_order;
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->status = $request->status;
        //upload file image
        $files = $request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
               //xóa hình cũ
               $image_path_delete=app_path("images/brand/".$brand->image);
               if(File::exists($image_path_delete)){
                   unlink($image_path_delete);
               }
            }
            $filename = $brand->slug . '.' . $extension;
            $brand->image = $filename;
            $files->move(public_path('images/brand'), $filename);
        }

        if ($brand->save()) {
            $link = Link::where([['type', '=', 'brand'], ['table_id', '=', $id]])->first();
            $link->slug = $brand->slug;
            $link->type = 'brand';
            $link->table_id = $brand->id;
            $link->save();
        }
        return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $brand = Brand::find($id);
        if ($brand == NULL) {
            return redirect()->route('brand.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $brand->delete();
        return redirect()->route('brand.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

    }
    public function trash()
    {
        $list = Brand::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        $title = 'Thùng rác thương hiệu';
        return view('backend.brand.trash', compact('list', 'title'));
    }
    public function delete(Request $request, $id = null)
    {

        $brand = Brand::find($id);
        if ($brand == NULL) {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    public function restore($id)
    {
        $brand = Brand::find($id);
        if ($brand == NULL) {
            return redirect()->route('brand.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('brand.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    public function status($id)
    {
        $brand = Brand::find($id);
        if ($brand == NULL) {
            return redirect()->route('brand.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $brand->status = ($brand->status==1)?2:1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('brand.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
