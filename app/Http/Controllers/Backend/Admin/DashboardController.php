<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
        // $this->middleware(['auth'])->except('index');
        // $this->middleware(['auth'])->only('index');
    }

    public function index(){
        // $delivery_admin = Admin::whereHas('roles', function ($query) {
        //     $query->where('name', 'Delivery Admin');
        // })->first();  
        // dd($delivery_admin);
        return view('backend.Admin_Dashboard.dashboard.index');
    }
}