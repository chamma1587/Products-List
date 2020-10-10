<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    
    /**
     * Admin logout 
     * 
     */
    public function adminLogout(Request $request){
  
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->intended('admin');
    }


    /**
     * Admin logout 
     * 
     */
    public function customerLogout(Request $request){
        
        Auth::guard('customer')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        
        return redirect()->intended('login');
    }
}