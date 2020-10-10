<?php 

namespace App\Http\Controllers;

use Auth;
use App\Models\Admin;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:customer');
    }

    
    public function adminRegisterForm()
    {
        return view('admin.register', ['url' => 'admin']);
    }

    public function customerRegisterForm()
    {
        return view('customer.register', ['url' => 'customer']);
    }


    protected function createAdmin(Request $request)
    {       
        $this->validate($request, [
            'name' => 'required|string|max:100',           
            'email' => 'required|email|unique:admins,email',           
            'password' => 'required|confirmed|min:6',
        ]);          
        
       
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('admin');
    }


    protected function createCustomer(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:100',           
            'last_name' => 'required|string|max:100',           
            'contact_no' => 'required|integer',           
            'email' => 'required|email|unique:customers,email',           
            'password' => 'required|confirmed|min:6',
        ]);                
     
        $customer = Customer::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'contact_no' => $request['contact_no'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->url('login');
    }

}