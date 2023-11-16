<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orderdetail;
class OrderdetailController extends Controller
{
    public function index()
    {
        $list=Orderdetail::all();
        $title='Chi tiết đơn hàng';
        return view('backend.orderdetail.index',compact('list','title'));
    }
}
