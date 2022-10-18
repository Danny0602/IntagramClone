<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LogoutController extends Controller
{
    public function store( ){
        auth()->logout();

        return redirect()->route('login');
    }
}
