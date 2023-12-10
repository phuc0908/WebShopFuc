<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Cartegory;
use App\Models\Product;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function getCate()
    {
        $cart = new Cartegory();
        $parents = $cart->getParent(0);

        $datas = null;
        // Create array name parent and child (SORT)
        foreach ($parents as $keyParent => $parent) {
            $datas[$keyParent] = $parent;
            // Child of this parent
            // dd($datas[$parent['id']]);
            $childs = $cart->getParent($parent['id']);

            foreach ($childs as $key => $child) {
                $datas[$keyParent][$key] = $child;
            }
        }
        return $datas;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = $this->getCate();

        $dataProduct = (new Product)->showRandom();
        return view('client.index', compact('datas', 'dataProduct'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $datas = $this->getCate();
        $dataProduct = (new Product)->getWithSlug($slug);
        $cate_name = (new Cartegory)->getWithSlug($slug)[0]->name;
        return view('client.productOfCartegory', compact('datas', 'dataProduct', 'cate_name'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
