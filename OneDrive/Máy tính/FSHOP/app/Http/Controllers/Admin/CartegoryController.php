<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cartegory;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;

class CartegoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create new obj
        $cart = new Cartegory();
        // Show all name cartegory
        $nameAll = $cart->showNameAll();

        return view('admin.cartegory.add', compact('nameAll'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new obj
        $cart = new Cartegory();
        // Set value 
        $name = $request->name;
        $slug = $request->slug;
        $parent_id = $request->parent_id;
        $dateCreate = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        // Add new column
        $isAdded = $cart->insert($name, $slug, $parent_id, $dateCreate);
        // Finally
        return redirect(route('admin.cartegory.add'))->with('alertStore', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        $data = (new Cartegory)->showAll();
        // $arr = "";
        // foreach ($data as $k) {
        //     $arr = $arr . " INSERT INTO cartegories (id,name,slug,parent_id,created_at,updated_at) 
        //     VALUES ($k->id,$k->name,$k->slug,$k->parent_id,$k->created_at,$k->updated_at)";
        // }
        // dd($arr);
        return view('admin.cartegory.list', compact('data'));
    }

    public function showProductOfOne(string $id)
    {
        $data = (new Cartegory)->showProductOfOne($id);
        return view('admin.cartegory.detail', compact('data'));
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cart = new Cartegory();
        // data where id
        $data = $cart->get($id);
        // list cartegory
        $nameAll = $cart->showNameAll();
        return view('admin.cartegory.edit', compact('data', 'nameAll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Create new obj
        $cart = new Cartegory();
        // Set value 
        $name = $request->name;
        $slug = $request->slug;
        $parent_id = $request->parent_id;

        $dateUpdate = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');
        // Update this column
        $cart->upd($id, $name, $slug, $parent_id, $dateUpdate);

        return redirect(route('admin.cartegory.list'))->with('alertUpdate', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        (new Cartegory)->del($id);
        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }


}
