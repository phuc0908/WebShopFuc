<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $address = new Address();
        $provinces = $address->getProvinces();
        return view('admin.user.add', compact('provinces'));
    }
    /**
     * ADDRESS
     */
    public function showDistricts($id)
    {
        $address = new Address();
        $districts = $address->getDistricts($id);
        return response()->json($districts);
    }
    public function showWards($id)
    {
        $address = new Address();
        $wards = $address->getWards($id);
        return response()->json($wards);
    }

    /**
     * CHECK VALIDATE
     */
    public function checkUserName(Request $request)
    {
        $username = $request->username;
        $olddata = (new User)->showAll();
        $count = 0;
        foreach ($olddata as $data) {
            if ($username === $data->username) {
                $count++;
                break;
            }
        }
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkUserNameUpdate(Request $request, $id)
    {
        $username = $request->username;
        $olddata = (new User)->showAllExcept($id);
        $count = 0;
        foreach ($olddata as $data) {
            if ($username === $data->username) {
                $count++;
                break;
            }
        }
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $olddata = (new User)->showAll();
        $count = 0;
        foreach ($olddata as $data) {
            if ($email === $data->email) {
                $count++;
                break;
            }
        }
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * CRUD
     */
    public function store(Request $request)
    {
        if ($this->checkUserName($request)) {
            if ($this->checkEmail($request)) {
                $user = new User();

                $name = $request->name;
                $username = $request->username;
                $pass = $request->pass;
                $email = $request->email;
                $address = $request->address;
                $phone = $request->phone;
                $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');
                $status = 0;
                $token = "";
                $province_id = $request->provinces;
                $district_id = $request->districts;
                $ward_id = $request->wards;

                $add = $user->insert($name, $username, $email, $pass, $address, $phone, $dateNow, $status, $token, $province_id, $district_id, $ward_id);

                return redirect(route('admin.user.add'))->with('alert', 'Thêm thành công');
            } else {
                return redirect(route('admin.user.add'))->with('alertErr', 'Email đã tồn tại');
            }
        } else {
            return redirect(route('admin.user.add'))->with('alertErr', 'Tên đăng nhập đã tồn tại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        $add = new Address();
        $province = $add->getProvinces();
        $district = $add->getAllDistricts();
        $ward = $add->getAllWards();

        $data = (new User)->showAll();

        return view('admin.user.list', compact('data', 'province', 'district', 'ward'));
        // return view('admin.user.list', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = new User();
        // data where id
        $data = $user->get($id);

        $pro_id = $data[0]->province_id;
        $dis_id = $data[0]->district_id;

        $province = (new Address)->getProvinces();
        $district = (new Address)->getDistricts($pro_id);
        $ward = (new Address)->getWards($dis_id);
        // list cartegory
        return view('admin.user.edit', compact('data', 'province', 'district', 'ward'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($this->checkUserNameUpdate($request, $id)) {

            $user = new User();
            $name = $request->name;
            $username = $request->username;
            $pass = $request->pass;
            $email = $request->email;
            $address = $request->address;
            $phone = $request->phone;
            $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');
            $status = 0;
            $token = "";
            $province_id = $request->provinces;
            $district_id = $request->districts;
            $ward_id = $request->wards;

            $up = $user->upd($name, $username, $email, $pass, $address, $phone,  $status, $token, $dateNow, $province_id, $district_id, $ward_id, $id);
            if ($up) {
                return redirect(route('admin.user.list'))->with('alertUpdate', 'Cập nhật thành công');
            }
            return redirect(route('admin.user.list'))->with('alertDelete', 'Cập nhật ko thành công');
        }
        return redirect(route('admin.user.add'))->with('alertErr', 'Tên đăng nhập đã tồn tại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        (new User)->del($id);
        return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
