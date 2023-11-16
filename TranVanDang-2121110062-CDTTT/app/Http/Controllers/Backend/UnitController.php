<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $list = Unit::all();

        $title = 'ĐƠN VỊ TÍNH';
        return view('backend.unit.index', compact('list', 'title'));
    }
}
