<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Cartegory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCate()
    {
        $cart = new Cartegory();
        // Show all name cartegory
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

    public function signup()
    {
        $address = new Address;
        $datas = $this->getCate();
        $provinces = $address->getProvinces();
        return view('client.auth.signup', compact('provinces', 'datas'));
    }
    public function signin()
    {
        $datas = $this->getCate();
        return view('client.auth.signin', compact('datas'));
    }

    public function didSignIn()
    {
        $datas = $this->getCate();

        $infor = (new User)->getWithAddress(session('idUser'));

        return view('client.infor_user', compact('datas', 'infor'));
    }
    public function logout(Request $request)
    {
        $request->session()->forget(['nameUser', 'passUser', 'idUser']);

        return redirect()->route('client.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    // SIGN IN 
    public function create(Request $request)
    {
        $name = $request->username;
        $pass = $request->password;
        $datas = (new User)->showAll();

        $count = 0;
        foreach ($datas as $data) {
            if ($data->username === $name || $data->email === $name) {
                if ($data->password === $pass) {
                    session([
                        'nameUser' => $name,
                        'passUser' => $pass,
                        'idUser' => $data->id,
                    ]);
                    $count++;
                    break;
                }
            }
        }
        // Check
        if ($count == 0) {
            return redirect()->back()->with("alertErr", "Đăng nhập không thành công");
        } else {
            return redirect()->route("client.index");
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function checkSignUp(Request $request)
    {
        $user = new User();
        $olddatas = $user->showAll();

        $count = 0;
        foreach ($olddatas as $data) {
            if ($data->username === $request->username || $data->email === $request->email || $request->pass !== $request->re_pass) {
                $count++;
                break;
            }
        }
        // dd($count);
        // Check
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function store(Request $request)
    {
        if ($this->checkSignUp($request)) {
            $name = $request->lastName . " " . $request->firstName;
            $username = $request->username;
            $pass = $request->pass;
            $email = $request->email;
            $address = $request->address;
            $phone = $request->phone;
            $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');
            $status = 1;
            $token = "";
            $province_id = $request->provinces;
            $district_id = $request->districts;
            $ward_id = $request->wards;

            (new User)->insert($name, $username, $email, $pass, $address, $phone, $dateNow, $status, $token, $province_id, $district_id, $ward_id);
            return redirect()->route("client.auth.signin")->with("alertSignUp", "Đăng ký thành công");
        } else {
            return redirect()->route("client.auth.signup")->with("alertSignUpErr", "Đăng ký không thành công, Bạn cần kiểm tra lại email, tên đăng nhập, mật khẩu");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
