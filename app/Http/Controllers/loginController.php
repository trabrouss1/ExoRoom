<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function logout()
    {
        Toastr::success('Vous êtes déconnecter', 'Déonnexion');
        return view('auth.login');
    }
}