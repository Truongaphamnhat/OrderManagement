<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::with('userType')->orderByDesc('id')->limit(10)->get();

        $customers = Customer::with('category:id,name', 'user:id,name')
            // ->withCount('images')
            ->limit(10)
            ->orderByDesc('id')
            ->get();
        
        
        $viewData = [
            'users' => $users,
            'customers' => $customers,
            
        ];
        
        return view('backend.home.index', $viewData);
    }
}
