<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColor;
use App\Models\Color;
use App\Models\Product;
use Carbon\Carbon;

class ProductColorController extends Controller
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
    public function create($product_id)
    {
        $colors = (new Color)->showAll();

        return view('admin.product_color.add', compact('colors', 'product_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $product_id)
    {
        $obj = new ProductColor();
        // new 
        $colors = $request->color;
        // old
        $oldcolors = $obj->getColor($product_id);
        // 
        if ($colors !== null) {
            $arr = [];
            $c = 0;
            foreach ($colors as $color) {
                $count = 0;
                foreach ($oldcolors as $oldcolor) {
                    // Consider values validate
                    if ($oldcolor->color_id == $color) {
                        $count++;
                        break;
                    }
                }
                // If not exist in table -> add it 
                if ($count == 0) {
                    $arr[$c++] = $color;
                }
            }

            $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');


            foreach ($arr as $key => $color_id) {
                $add = $obj->insert($product_id, $color_id, $dateNow);
            }
        }
        $colors = (new Color)->showAll();

        $data = (new ProductColor)->getColor($product_id);
        return view('admin.product_color.list', compact('data', 'product_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product_id)
    {
        $data = (new ProductColor)->getColor($product_id);
        return view('admin.product_color.list', compact('data', 'product_id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id, $color_id)
    {
        (new ProductColor)->del($product_id, $color_id);
        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
