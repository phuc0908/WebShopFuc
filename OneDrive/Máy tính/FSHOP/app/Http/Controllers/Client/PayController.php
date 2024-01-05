<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cartegory;
use App\Models\User;
use App\Helpers\Cart;
use App\Models\Address;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use Carbon\Carbon;

class PayController extends Controller
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
    public function getMySelf()
    {
        $user = new User();
        $id = session('idUser');

        $inforMySelf = [];
        if (!empty($id)) {
            $inforMySelf = $user->getWithAddress($id)[0];
        }
        return $inforMySelf;
    }
    /**
     * Display a listing of the resource.
     */
    public function pay(Request $request, Cart $cart)
    {
        // dd($request);
        $datas = $this->getCate();
        // RADIO
        $radio = $request->addressRadio;
        if ($radio == 1) {

            $validatedData = $request->validate(
                [
                    'address' => ['required'],
                    'provinces' => ['required'],
                    'districts' => ['required'],
                    'wards' => ['required'],
                ],
                [
                    'address.required' => 'Bạn chưa điền vào ô trống',
                    'provinces.required' => 'Bạn chưa chọn option nào',
                    'districts.required' => 'Bạn chưa chọn option nào',
                    'wards.required' => 'Bạn chưa chọn option nào',
                ]
            );

            // get Value Address
            $address = new Address();
            $province = $address->getOneProvince($request->provinces)[0]->name;
            $district = $address->getOneDistrict($request->districts)[0]->name;
            $ward = $address->getOneWard($request->wards)[0]->name;

            $address = $request->address . " / " . $ward . " / " . $district . " / " . $province;
        } else {
            $address = $request->myAddress;
        }

        // add ORDER
        $order = new ClientOrderController();
        $order->store($request, $cart, $address);

        return redirect(route('client.myOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cart $cart)
    {
        $address = new Address();
        $provinces = $address->getProvinces();

        $total_quantity = $cart->getTotalQuantity();
        $total_price = $cart->getTotalPrice();

        $datas = $this->getCate();
        $inforMySelf = $this->getMySelf();
        $datenow =  Carbon::now('Asia/Ho_Chi_Minh')->addDay(7)->format(' d/m/Y');

        return view('client.pagePurched', compact('datas', 'inforMySelf', 'datenow', 'total_quantity', 'total_price', 'provinces'));
    }
}
