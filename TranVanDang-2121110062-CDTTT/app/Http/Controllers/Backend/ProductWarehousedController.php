<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductWarehoused;

class ProductWarehousedController extends Controller
{
    public function index()
    {
        $list = ProductWarehoused::all();
        $title = 'NHẬP HÀNG';
        return view('backend.product_warehoused.index', compact('list', 'title'));
    }
}
