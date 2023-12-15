<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('Authorization.login');
    }

    public function registerStore(Request $req)
    {
        // dd($req->all());
        if($req["Peran"] === 'Buyer') {
            $data = $req->validate([
                'Username' => 'required|max:255|unique:master_account,Username',
                'Email' => 'required|string|unique:master_account,Email',
                'Password' => 'required',
                'No_Telp' => 'required',
                'Peran' => 'required',
                'Status' => 'required'
            ]);
        } else if($req["Peran"] === 'Supplier')  {
            $data = $req->validate([
                'Username' => 'required|max:255|unique:master_account,Username',
                'Email' => 'required|unique:master_account,Email',
                'Password' => 'required',
                'No_Telp' => 'required',
                'Alamat' => 'required',
                'Bidang_Usaha' => 'required',
                'Nama' => 'required',
                'Peran' => 'required',
                'Status' => 'required'
            ]);
        }

        if($data['Password'] === $req['Confirm_Password']) {
            $data['Password'] = bcrypt($data['Password']);

            User::create($data);
            return redirect('/login')->with('berhasil', 'Berhasil Daftar!');
        } else {
            return back()->withErrors(['Password' => 'Password tidak sama.'])->withInput();
        }
    }

    public function loginStore(Request $req)
    {
        // dd($req->filled('remember'));
        $data = $req->validate([
            'Username' => 'required|max:255',
            'Password' => 'required',
        ]);

        $user = User::where('Username', $data['Username'])->first();
        // dd("Login successful for user: " . $user->Username);

        if($user && Hash::check($data['Password'], $user->Password))
        {
            $req->session()->regenerate();
            $req->session()->put('peran', $user->Peran);

            if($user->Peran === 'Admin'){
                return redirect('/admin')->with('berhasil', 'Berhasil Masuk!');
            } else if($user->Peran === 'Buyer'){
                return redirect('/buyer')->with('berhasil', 'Berhasil Masuk!');;
            } else if ($user->Peran === 'Supplier'){
                return redirect('/supplier')->with('berhasil', 'Berhasil Masuk!');;
            }
        } else {
            return redirect('/login')->with('gagal', 'Kesalahan username/password!');
        }
    }

    public function showRegistration()
    {
        return view('Authorization.regist');
    }

    public function showSupplierRegistration()
    {
        return view('Authorization.regist-supplier');
    }

    public function showBuyerRegistration()
    {
        return view('Authorization.regist-buyer');
    }

    public function logout(){
        if(Session::has('peran')) {
            Session::pull('peran');
            return redirect('/login')->with('berhasil', 'Berhasil logout');
        }
    }

}
