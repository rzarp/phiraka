<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonnaciController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.fibonnaci.index', [
            'row' => $request->row,
            'column' => $request->column,
            'a' => 0,
            'b' => 1,
        ]);
    }
}
