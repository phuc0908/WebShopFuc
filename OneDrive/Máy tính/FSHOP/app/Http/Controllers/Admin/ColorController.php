<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function showAll()
    {
        $data = (new Color)->showAll();
        return view('admin.color.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new Color();
        // dd($request);
        $name = $request->name;
        $code_color = $request->code_color;
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        $isAdded = $obj->insert($name, $code_color, $dateNow);

        return redirect(route('admin.color.add'))->with('alertStore', 'Thêm thành công');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = (new Color)->get($id);
        return view('admin.color.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = new Color();
        $name = $request->name;
        $code_color = $request->code_color;
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        $isUpd = $obj->upd($id, $name, $code_color, $dateNow);

        return redirect(route('admin.color.list'))->with('alertUpdate', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del = (new Color)->del($id);

        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
