<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Carbon\Carbon;

class ImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($product_id)
    {
        return view('admin.image.add', compact('product_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $product_id)
    {
        $img = new Image();
        $product_id = $request->product_id;
        $dateCreate = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        // Add new column
        $files = $request->file('img');
        foreach ($files as $file) {
            $value = $this->storeImage($file);
            $isAdded = $img->insert($value, $product_id, $dateCreate);
        }
        return redirect(route('admin.image.list', ['product_id' => $product_id]))->with('alertStore', 'Thêm thành công');
    }
    public function storeImage($img)
    {
        $path = $img->store('public/upload');
        return substr($path, strlen('public/'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $product_id)
    {
        $img = new Image();
        $data = $img->get($product_id);
        return view('admin.image.list', compact('data', 'product_id'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id, $id)
    {
        (new Image)->del($id);
        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }

    public function destroyAll($product_id)
    {
        (new Image)->delAll($product_id);
        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
