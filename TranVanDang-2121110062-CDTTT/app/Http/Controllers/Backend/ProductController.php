<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Link;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
class ProductController extends Controller
{
    public function index()
    {
        // $list = Product::
        // ->select('tvd_productimport.*', 'tvd_product.name as name_product')
        // ->get();
        $list = Product::where('tvd_product.status', '!=', '0')
            ->select('tvd_product.*', 'tvd_category.name as namecategory', 'tvd_brand.name as namebrand')
            ->join('tvd_category', 'tvd_category.id', '=', 'tvd_product.category_id')
            ->join('tvd_brand', 'tvd_brand.id', '=', 'tvd_product.brand_id')
            ->where('tvd_product.status', '!=', '0')
            ->orderBy('tvd_product.created_at', 'desc')
            ->get();
        $title = 'Danh sách sản phẩm';

        return view('backend.product.index', compact('list', 'title'));
    }
    public function create()
    {
        $list = Product::where('status', '!=', '0')->get();
        $list_category = Category::where('status', '!=', '0')->get();
        $list_brand = Brand::where('status', '!=', '0')->get();
        $html_category_id = '';
        $html_brand_id = '';

        foreach ($list_category as $item) {
            $html_category_id .= "<option value='" . $item['id'] . "'>" . $item['name'] . '</option>';
        }
        foreach ($list_brand as $item) {
            $html_brand_id .= "<option value='" . $item['id'] . "'>" . $item['name'] . '</option>';
        }
        return view('backend.product.create', compact('html_category_id', 'html_brand_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->price_Import = $request->price_Import;
        $product->price_retail = $request->price_retail;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = 1;
        $product->status = $request->status;
        $files = $request->file('image');
        if ($files != null) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete = app_path('images/product/' . $product->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $product->slug . '.' . $extension;
            $product->image = $filename;
            $files->move(public_path('images/product'), $filename);
        }
        //end upload
        $product->save();
        return redirect()
            ->route('product.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()
                ->route('product.index')
                ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
        }
        $list = Product::where('status', '!=', '0')->get();
        $list_category = Category::where('status', '!=', '0')->get();
        $list_brand = Brand::where('status', '!=', '0')->get();
        $html_category_id = '';
        $html_brand_id = '';
        foreach ($list_category as $item) {
            if ($product->category_id == $item->id) {
                $html_category_id .= "<option selected value='" . $item->id . "'>" . $item->name . '</option>';
            } else {
                $html_category_id .= "<option value='" . $item->id . "'>" . $item->name . '</option>';
            }
        }
        foreach ($list_brand as $item) {
            if ($product->brand_id == $item->id) {
                $html_brand_id .= "<option selected value='" . $item->id . "'>" . $item->name . '</option>';
            } else {
                $html_brand_id .= "<option value='" . $item->id . "'>" . $item->name . '</option>';
            }
        }

        return view('backend.product.edit', compact('html_category_id', 'html_brand_id', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()
                ->route('product.index')
                ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->price_Import = $request->price_Import;
        $product->price_retail = $request->price_retail;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->status = $request->status;
        $files = $request->file('image');
        if ($files != null) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete = app_path('images/product/' . $product->image);
                if (File::exists($image_path_delete)) {
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $product->slug . '.' . $extension;
            $product->image = $filename;
            $files->move(public_path('images/product'), $filename);
        }
        //end upload
        $product->save();
        return redirect()
            ->route('product.index')
            ->with('message', ['type' => 'success', 'msg' => 'Cập nhật Thành Công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return redirect()
                ->route('product.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        if ($product->delete()) {
            $link = Link::where([['type', '=', 'product'], ['table_id', '=', $id]])->first();
            $link->delete();
        }
        return redirect()
            ->route('product.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
    }
    public function trash()
    {
        $list = product::where('status', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Thùng rác sản phẩm';
        return view('backend.product.trash', compact('list', 'title'));
    }
    //trả về
    public function restore($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return redirect()
                ->route('product.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()
            ->route('product.trash')
            ->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    //Xóa vào thùng rác
    public function delete(Request $request, $id = null)
    {
        $product = product::find($id);
        if ($product == null) {
            return redirect()
                ->route('product.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()
            ->route('product.index')
            ->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    //trangj thais
    public function status($id)
    {
        $product = product::find($id);
        if ($product == null) {
            return redirect()
                ->route('product.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $product->status = $product->status == 1 ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()
            ->route('product.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
