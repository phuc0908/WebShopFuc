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
        $validatedData = $request->validate(
            [
                'username' => ['required', 'min:6'],
                'password' => ['required', 'min:8', 'max:20', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@^&*]).*$/'],
            ],
            [
                // REQUIRED
                'username.required' => 'Bạn chưa điền vào ô trống',
                'password.required' => 'Bạn chưa điền vào ô trống',

                // MIN
                'username.min' => 'Phải tối thiểu 6 kí tự',
                'password.min' => 'Phải tối thiểu 8 kí tự',
                // MAX
                'password.max' => 'Tối đa chỉ được 12 kí tự',
                // REGEX
                'password.regex' => 'Phải gồm ít nhất 1 chữ cái, 1 chữ số [0->9] và 1 kí tự đặc biệt [!,$,#,%,@,^,&,*]',
            ]
        );
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
        $validatedData = $request->validate(
            [
                'lastName' => ['required'],
                'firstName' => ['required'],
                'username' => ['required', 'min:6'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:11'],
                'address' => ['required'],
                'provinces' => ['required'],
                'districts' => ['required'],
                'wards' => ['required'],
                'pass' => ['required', 'min:8', 'max:20', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@^&*]).*$/'],
                're_pass' => ['required', 'same:pass'],
            ],
            [
                // REQUIRED
                'username.required' => 'Bạn chưa điền vào ô trống',
                'pass.required' => 'Bạn chưa điền vào ô trống',
                're_pass.required' => 'Bạn chưa điền vào ô trống',
                'email.required' => 'Bạn chưa điền vào ô trống',
                'firstName.required' => 'Bạn chưa điền vào ô trống',
                'lastName.required' => 'Bạn chưa điền vào ô trống',
                'phone.required' => 'Bạn chưa điền vào ô trống',
                'address.required' => 'Bạn chưa điền vào ô trống',
                'provinces.required' => 'Bạn chưa chọn option nào',
                'districts.required' => 'Bạn chưa chọn option nào',
                'wards.required' => 'Bạn chưa chọn option nào',

                // MIN
                'username.min' => 'Phải tối thiểu 6 kí tự',
                'pass.min' => 'Phải tối thiểu 8 kí tự',
                'phone.min' => 'Phải tối thiểu 10 số',
                // MAX
                'pass.max' => 'Tối đa chỉ được 12 kí tự',
                'phone.max' => 'Tối đa chỉ được 11 số',
                // REGEX
                'pass.regex' => 'Phải gồm ít nhất 1 chữ cái, 1 chữ số [0->9] và 1 kí tự đặc biệt [!,$,#,%,@,^,&,*]',
                'phone.regex' => 'Số điện thoại chỉ được chứa các chữ số',
                'email.email' => 'Email của bạn chưa đúng cú pháp',
            ]
        );

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
}
