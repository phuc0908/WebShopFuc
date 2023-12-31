<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SizeController extends Controller
{
    public function showAll()
    {
        $data = (new Size)->showAll();
        return view('admin.size.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new Size();
        // dd($request);
        $name = $request->name;
        $weight = $request->weight;
        $height = $request->height;
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        $isAdded = $obj->insert($name, $weight, $height, $dateNow);

        return redirect(route('admin.size.add'))->with('alertStore', 'Thêm thành công');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = (new Size)->get($id);
        return view('admin.size.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = new Size();
        $name = $request->name;
        $weight = $request->weight;
        $height = $request->height;
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        $isUpd = $obj->upd($id, $name, $weight, $height, $dateNow);

        return redirect(route('admin.size.list'))->with('alertUpdate', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del = (new Size)->del($id);

        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
