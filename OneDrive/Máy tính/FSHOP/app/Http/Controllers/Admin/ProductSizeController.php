<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Product;
use Carbon\Carbon;

class ProductSizeController extends Controller
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
        $sizes = (new Size)->showAll();

        return view('admin.product_size.add', compact('sizes', 'product_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $product_id)
    {
        $obj = new ProductSize();
        // new 
        $sizes = $request->size;
        // old
        $oldsizes = $obj->getSize($product_id);
        // 
        if ($sizes !== null) {
            $arr = [];
            $c = 0;
            foreach ($sizes as $size) {
                $count = 0;
                foreach ($oldsizes as $oldsize) {
                    // Consider values validate
                    if ($oldsize->size_id == $size) {
                        $count++;
                        break;
                    }
                }
                // If not exist in table -> add it 
                if ($count == 0) {
                    $arr[$c++] = $size;
                }
            }

            $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');


            foreach ($arr as $key => $size_id) {
                $add = $obj->insert($product_id, $size_id, $dateNow);
            }
        }
        $sizes = (new Size)->showAll();
        return view('admin.product_size.add', compact('sizes', 'product_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product_id)
    {
        $data = (new ProductSize)->getSize($product_id);
        return view('admin.product_size.list', compact('data', 'product_id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id, $size_id)
    {
        (new ProductSize)->del($product_id, $size_id);
        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
