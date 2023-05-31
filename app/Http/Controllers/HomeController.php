<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.admin');
        } elseif ($usertype == '2') {
            return redirect()->route('mahasiswa.index');
        } elseif ($usertype == '3') {
            return redirect()->route('dosen.index');
        } elseif ($usertype == '4') {
            return redirect()->route('staff.index');
        } elseif ($usertype == '5') {
            return redirect()->route('mitra.index');
        } elseif ($usertype == '6') {
            return redirect()->route('alumni.index');
        } elseif ($usertype == '7') {
            return redirect()->route('pengguna-lulusan.index');
        }
    }
}
