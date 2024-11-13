<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanDetail;

class LoanController extends Controller
{
    //
    public function index()
    {
        $loans = LoanDetail::all();

        return view('admin.index', compact('loans'));
    }
}
