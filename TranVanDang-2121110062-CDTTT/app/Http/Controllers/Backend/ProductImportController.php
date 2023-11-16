<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImport;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ProductImportController extends Controller
{
    public function index()
    {
        $list = ProductImport::join('tvd_product', 'tvd_product.id', '=', 'tvd_productimport.product_id')
            ->select('tvd_productimport.*', 'tvd_product.name as name_product')
            ->get();

        $title = 'CÁC SẢN PHẨM NHẬP';
        $list_product = Product::where('status', '!=', '0')->get();
        $html_product_id = '';
        foreach ($list_product as $item) {
            $html_product_id .= "<option value='" . $item['id'] . "'>" . $item['name'] . '</option>';
        }
        return view('backend.product_import.index', compact('list', 'title', 'html_product_id'));
    }
    // public function create()
    // {
    //     $list = ProductImport::all();
    //     $list_product = Product::where('status', '!=', '0')->get();
    //     $html_product_id = "";
    //     foreach ($list_product as $item) {
    //         $html_product_id .= "<option value='" . $item['id'] . "'>" . $item["name"] . "</option>";
    //     }

    //     return view('backend.product_import.create', compact('html_product_id','list'));
    // }
    public function store(Request $request)
    {
        $product_import = new ProductImport();
        $product_import->product_id = $request->product_id;
        $product_import->qty = $request->qty;
        $product_import->price = $request->price;
        $product_import->created_at = date('Y-m-d H:i:s');
        $product_import->created_by = 1;

        //end upload
        $product_import->save();
        return redirect()
            ->route('product_import.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }
    public function destroy($id)
    {
        $product_import = ProductImport::find($id);
        if ($product_import == null) {
            return redirect()
                ->route('product_import.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $product_import->delete();
        return redirect()
            ->route('product_import.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    // public function trash()
    // {
    //     $list = ProductImport::all();
    //     $title = 'Thùng rác nhập hàng';
    //     return view('backend.product_import.trash', compact('list', 'title'));
    // }
    // public function delete(Request $request, $id = null)
    // {

    //     $product_import = ProductImport::find($id);
    //     if ($product_import == NULL) {
    //         return redirect()->route('product_import.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    //     }
    //     $product_import->updated_at = date('Y-m-d H:i:s');
    //     $product_import->updated_by = Auth::id() ?? 1;
    //     $product_import->save();
    //     return redirect()->route('product_import.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    // }

    public function restore($id)
    {
        $product_import = ProductImport::find($id);
        if ($product_import == null) {
            return redirect()
                ->route('product_import.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $product_import->status = 2;
        $product_import->updated_at = date('Y-m-d H:i:s');
        $product_import->updated_by = Auth::id() ?? 1;
        $product_import->save();
        return redirect()
            ->route('product_import.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
}
