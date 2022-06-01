<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Blok;
use App\Models\Afdeling;
use App\Models\Produksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kebun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
    
    public function changePassword(Request $request)
    {
        $rules = [
            'password' => 'required|min:6|confirmed',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            Alert::error('Gagal', 'Password konfirmasi tidak sama');
            return redirect()->back();
        } else {
            User::where('id', Auth::user()->id)->first()->update(['password' => Hash::make($request->password)]);
            Alert::success('Success', 'Ganti Password Berhasil');
            return redirect()->back();
        }
    }
}
