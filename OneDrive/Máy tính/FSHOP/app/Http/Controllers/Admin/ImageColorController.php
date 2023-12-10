<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageColor;
use App\Models\ProductColor;
use App\Models\Color;
use App\Models\Image;
use Carbon\Carbon;

class ImageColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($image_id, $product_id)
    {
        $colors = (new Color)->showAll();

        return view('admin.image_color.add', compact('colors', 'image_id', 'product_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $image_id, $product_id)
    {
        $obj = new ImageColor();
        // new 
        $color_id = $request->color;
        //   Delete
        $obj->delWithImage($image_id);

        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        $add = $obj->insert($image_id, $color_id, $dateNow);


        $colors = (new Color)->showAll();
        return view('admin.image_color.add', compact('colors', 'image_id', 'product_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $image_id, $product_id)
    {
        $data = (new ImageColor)->getColor($image_id);
        return view('admin.image_color.list', compact('data', 'image_id', 'product_id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($image_id, $color_id)
    {
        (new ImageColor)->del($image_id, $color_id);
        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
