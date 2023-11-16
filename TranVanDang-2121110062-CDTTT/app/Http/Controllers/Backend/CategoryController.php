<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $title = 'Danh mục sản phẩm';
        return view('backend.category.index', compact('list', 'title'));
    }
    public function create()
    {
        $list = Category::where('status', '!=', '0')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list as $item) {
            $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
        }
        return view('backend.category.create', compact('html_parent_id', 'html_sort_order'));
    }



    public function store(StoreCategoryRequest $request)
    {
        $category = new Category(); //làm cái mới
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id = $request->parent_id;
        $category1 = Category::find($request->parent_id);
        $category->sort_order = $request->sort_order;
        $category->level = 1;
        if ($category1 != NULL) {
            $category->level = $category1->level + 1;
        }
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = 1;
        $category->status = $request->status;
        //upload file image
        $files = $request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                $image_path_delete = app_path("images/category/" . $category->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            $filename = $category->slug . '.' . $extension;
            $category->image = $filename;
            $files->move(public_path('images/category'), $filename);
        }

        //end upload
        //lưu CSDL
        if ($category->save()) {
            $link = new Link();
            $link->slug = $category->slug;
            $link->type = 'category';
            $link->table_id = $category->id;
            $link->save();
        }
        return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if ($category == NULL) {
            return redirect()->route('category.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $list = Category::where('status', '!=', '0')->get();

        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list as $item) {
            if ($item->id == $category->parent_id) {
                $html_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            } else {
                $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
            if ($item->sort_order == $category->sort_order - 1) {
                $html_sort_order .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
            } else {
                $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
            }
        }
        return view('backend.category.edit', compact('html_parent_id', 'html_sort_order', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);; //sửa
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id = $request->parent_id;
        $category1 = Category::find($request->parent_id);
        $category->sort_order = $request->sort_order;
        $category->level = 1;
        if ($category1 != NULL) {
            $category->level = $category1->level + 1;
        }


        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = 1;
        $category->status = $request->status;
        //upload file image
        $files = $request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                $image_path_delete = app_path("images/category/" . $category->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            $filename = $category->slug . '.' . $extension;
            $category->image = $filename;
            $files->move(public_path('images/category'), $filename);
        }

        //end upload
        //lưu CSDL
        if ($category->save()) {
            $link = Link::where([['type', '=', 'category'], ['table_id', '=', $id]])->first();
            $link->slug = $category->slug;
            $link->type = 'category';
            $link->table_id = $category->id;
            $link->save();
        }
        return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành Công']);
    }


    //Xóa khỏi CSDL
    public function destroy( $id)
    {
        $category = Category::find($id);
        if ($category == NULL) {
            return redirect()->route('category.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        if ($category->delete()) {
            $link = Link::where([['type', '=', 'category'], ['table_id', '=', $id]])->first();
            $link->delete();
        }
        return redirect()->route('category.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    public function trash()
    {
        $list = Category::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        $title = 'Thùng rác danh mục';
        return view('backend.category.trash', compact('list', 'title'));
    }
    //trả về
    public function restore($id)
    {
        $category = Category::find($id);
        if ($category == NULL) {
            return redirect()->route('category.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $category->status = 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('category.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $category = Category::find($id);
        if ($category == NULL) {
            return redirect()->route('category.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    //trangj thais
    public function status($id)
    {
        $category = Category::find($id);
        if ($category == NULL) {
            return redirect()->route('category.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $category->status = ($category->status == 1) ? 2 : 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('category.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
