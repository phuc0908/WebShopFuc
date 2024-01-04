<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DetailOrder;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('admin.order.add');
    }

    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        $data = (new Order)->showAll();
        return view('admin.order.list', compact('data'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idorder)
    {
        //
    }
    public function destroyDetail(string $id)
    {
        //
    }
    public function updateState(string $id, $state)
    {
        $upd = (new Order)->updateState($id, $state);
        return redirect()->route('admin.order.list');
    }


    public function showDetaiOrder(string $idorder)
    {
        $data = (new DetailOrder)->get($idorder);
        return view('admin.order.detail', compact('data'));
    }
}
