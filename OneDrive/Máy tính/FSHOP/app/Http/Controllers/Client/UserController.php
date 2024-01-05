<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Cartegory;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getCate()
    {
        $cart = new Cartegory();
        $parents = $cart->getParent(0);

        $datas = null;
        // Create array name parent and child (SORT)
        foreach ($parents as $keyParent => $parent) {
            $datas[$keyParent] = $parent;
            // Child of this parent
            $childs = $cart->getParent($parent['id']);

            foreach ($childs as $key => $child) {
                $datas[$keyParent][$key] = $child;
            }
        }
        return $datas;
    }

    public function edit(string $id)
    {
        $address = new Address();
        $user = new User();
        $datas = $this->getCate();
        $provinces = $address->getProvinces();

        // infor 
        $infor = $user->getWithAddress($id);
        // dd($datasOrder);
        return view('client.edit_infor_user', compact('datas', 'provinces', 'infor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate(
            [
                'name' => ['required'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:11'],
                'address' => ['required'],
                'provinces' => ['required'],
                'districts' => ['required'],
                'wards' => ['required'],
            ],
            [
                // REQUIRED
                'email.required' => 'Bạn chưa điền vào ô trống',
                'firstName.required' => 'Bạn chưa điền vào ô trống',
                'lastName.required' => 'Bạn chưa điền vào ô trống',
                'phone.required' => 'Bạn chưa điền vào ô trống',
                'address.required' => 'Bạn chưa điền vào ô trống',
                'provinces.required' => 'Bạn chưa chọn option nào',
                'districts.required' => 'Bạn chưa chọn option nào',
                'wards.required' => 'Bạn chưa chọn option nào',

                // MIN
                'phone.min' => 'Phải tối thiểu 10 số',
                // MAX
                'phone.max' => 'Tối đa chỉ được 11 số',
                // REGEX
                'phone.regex' => 'Số điện thoại chỉ được chứa các chữ số',
                'email.email' => 'Email của bạn chưa đúng cú pháp',
            ]
        );

        $obj = new User();

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $province_id = $request->provinces;
        $district_id = $request->districts;
        $ward_id = $request->wards;
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        $isUpd = $obj->updateInfor($name, $email, $address, $phone, $dateNow, $province_id, $district_id, $ward_id, $id);



        return redirect(route('client.auth.infor'))->with('alertUpdate', 'Cập nhật thành công');
    }
}
