<?php

namespace App\Http\Controllers\View;
use App\Entity\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
       public function toLogin(){
            return view('login');
       }
       public function toRegister(){
            return view('register');
       }
}
