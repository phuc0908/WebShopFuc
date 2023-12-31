<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create new obj
        $pro = new Product();
        // Show all name cartegory
        $nameAllCart = $pro->showNameAllCart();

        return view('admin.product.add', compact('nameAllCart'));
    }
    public function storeImage(Request $request)
    {
        $path = $request->img->store('public/upload');
        return substr($path, strlen('public/'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $pro = new Product();
        $cartegory_id = $request->cartegory_id;
        $name = $request->name;
        $slug = $request->slug;
        $price = $request->price;
        $price_final = $request->price_final;
        $amount = $request->amount;
        $img = $this->storeImage($request);
        $description = $request->description;

        $dateCreate = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        // Add new column
        $isAdded = $pro->insert($name, $price, $price_final, $img, $amount, $cartegory_id, $description, $slug, $dateCreate);

        return redirect(route('admin.product.add'))->with('alertStore', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */

    public function showAll()
    {
        $data = (new Product)->showAll();

        return view('admin.product.list', compact('data'));
    }
    public function get($id)
    {
        $data = (new Product)->get($id);
        $sizes = (new Size)->showAll();
        return view('client.product', compact('data', 'sizes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pro = new Product();
        // data where id
        $data = $pro->get($id);
        // list cartegory
        $nameAll = $pro->showNameAllCart();
        return view('admin.product.edit', compact('data', 'nameAll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Create new obj
        $pro = new Product();
        // dd(is_string($this->storeImage($request)));
        $cartegory_id = $request->cartegory_id;
        $name = $request->name;
        $slug = $request->slug;
        $price = $request->price;
        $price_final = $request->price_final;
        $amount = $request->amount;
        if ($request->img == null) {
            $img = null;
        } else {
            $img = $this->storeImage($request);
        }
        $description = $request->description;

        $dateUpdate = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');
        // Update this column
        $pro->upd($id, $name, $price, $price_final, $img, $amount, $cartegory_id, $description, $slug, $dateUpdate);

        return redirect(route('admin.product.list'))->with('alertUpdate', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        (new Product)->del($id);
        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
