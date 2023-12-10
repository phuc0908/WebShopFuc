<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Image;
use App\Models\Cartegory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Helpers\Cart as Cart;


class ProductController extends Controller
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
    public function create($id)
    {
        $datas = $this->getCate();

        $data = (new Product)->get($id);
        $sizes = (new ProductSize)->getSize($id);
        $colors = (new ProductColor)->getColorAndImage($id);
        $imgs = (new Image)->get($id);

        return view('client.product', compact('data', 'sizes', 'imgs', 'colors', 'datas'));
    }

    public function store(Request $request, $id)
    {
    }

    public function showAll()
    {
        $data = (new Product)->showAll();
        return view('admin.product.list', compact('data'));
    }
    public function get($id)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }
}
