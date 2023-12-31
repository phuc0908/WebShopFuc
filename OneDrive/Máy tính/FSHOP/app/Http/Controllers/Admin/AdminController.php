<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->name;
        $pass = $request->pass;
        if ($name == "admin") {
            if ($pass == "admin") {
                session([
                    'name' => $name,
                    'pass' => $pass
                ]);
                // dd(session('name'));
                return redirect()->route('admin.product.list');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->session()->forget(['name', 'pass']);
        return view('admin.login');
    }

}
