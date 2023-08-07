<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    public function dashboard(){
				if(Auth::user()){
					if(Auth::user()->usertype == 'admin'){
                        return view('admin.dashboard');
					}elseif(Auth::user()->usertype == 'user'){
                        return redirect()->route('home');
					}else{
						return redirect()->route('login');
					}
				}else{
					return redirect()->route('login');
				}
			}
}
