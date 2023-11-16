<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{
    public function index()
    {
        $list_category = Category::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $list_brand = Brand::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $list_topic = Topic::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $list_page = Post::where([['status', '!=', '0'], ['type', '=', 'page']])->orderBy('created_at', 'desc')->get();
        $list_menu = Menu::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        $title = 'Menu';
        return view('backend.menu.index', compact('list_category', 'list_brand', 'list_topic', 'list_menu', 'title'));
    }
    public function create()
    {
        $list = Menu::where('status', '!=', '0')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list as $item) {
            $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
        }
        return view('backend.menu.create', compact('html_parent_id', 'html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->ADDCATEGORY)) {
            $list_id = $request->checkIdCategory;
            foreach ($list_id as $id) {
                $category = Category::find($id);
                $menu = new Menu();
                $menu->name = $category->name;
                $menu->link = $category->slug;
                $menu->sort_order = 1;
                $menu->parent_id = 1;
                $menu->level = 1;
                $menu->table_id = $id;
                $menu->type = 'category';
                $menu->position = $request->position;
                $menu->status = 2;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu Thành Công']);
        }
        if (isset($request->ADDBRAND)) {
            $list_id = $request->checkIdBrand;
            foreach ($list_id as $id) {
                $brand = Brand::find($id);
                $menu = new Menu();
                $menu->name = $brand->name;
                $menu->link = $brand->slug;
                $menu->sort_order = 1;
                $menu->parent_id = 1;
                $menu->level = 1;
                $menu->table_id = $id;
                $menu->type = 'brand';
                $menu->position = $request->position;
                $menu->status = 2;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu Thành Công']);
        }
        if (isset($request->ADDTOPIC)) {
            $list_id = $request->checkIdTopic;
            foreach ($list_id as $id) {
                $topic = Topic::find($id);
                $menu = new Menu();
                $menu->name = $topic->name;
                $menu->sort_order = 1;
                $menu->parent_id = 1;
                $menu->level = 1;
                $menu->link = $topic->slug;
                $menu->table_id = $id;
                $menu->type = 'topic';
                $menu->position = $request->position;
                $menu->status = 2;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu Thành Công']);
        }
        if (isset($request->ADDPAGE)) {
            $list_id = $request->checkIdPage;
            foreach ($list_id as $id) {
                $page = Post::find($id);
                $menu = new Menu();
                $menu->name = $page->name;
                $menu->link = $page->slug;
                $menu->sort_order = 1;
                $menu->parent_id = 1;
                $menu->level = 1;
                $menu->table_id = $id;
                $menu->type = 'page';
                $menu->position = $request->position;
                $menu->status = 2;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu Thành Công']);
        }
        if (isset($request->ADDCUSTOM)) {
            $menu = new Menu();
            $menu->name = $request->name;
            $menu->link = $request->link;
            $menu->sort_order = 1;
            $menu->parent_id = 1;
            $menu->level = 1;
            $menu->type = 'custom';
            $menu->position = $request->position;
            $menu->status = 2;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->save();

            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu Thành Công']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::find($id);
        return view('backend.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = menu::find($id);
        if ($menu == NULL) {
            return redirect()->route('menu.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $list = menu::where('status', '!=', '0')->get();

        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list as $item) {
            if ($item->id == $menu->parent_id) {
                $html_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            } else {
                $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
            if ($item->sort_order == $menu->sort_order - 1) {
                $html_sort_order .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
            } else {
                $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
            }
        }
        return view('backend.menu.edit', compact('html_parent_id', 'html_sort_order', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu =Menu::find($id);
            $menu->name = $request->name;
            $menu->link = $request->link;
            $menu->sort_order = $request->sort_order+1;
            $menu->parent_id = $request->parent_id;
            $menu->level = 1;
            $menu->type = 'custom';
            $menu->position = $request->position;
            $menu->status = $request->status;
            $menu->updated_at = date('Y-m-d H:i:s');
            $menu->updated_by = 1;

            $menu->save();

            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật menu Thành Công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function restore($id)
    {
        $menu = Menu::find($id);
        if ($menu == NULL) {
            return redirect()->route('menu.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $menu->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('menu.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    public function trash()
    {
        $list = Menu::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        $title = 'Thùng rác menu';
        return view('backend.menu.trash', compact('list', 'title'));
    }
    public function delete(Request $request, $id = null)
    {
        $menu = Menu::find($id);
        if ($menu == NULL) {
            return redirect()->route('menu.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    public function status($id)
    {
        $menu = Menu::find($id);
        if ($menu == NULL) {
            return redirect()->route('menu.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $menu->status = ($menu->status==1)?2:1;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
