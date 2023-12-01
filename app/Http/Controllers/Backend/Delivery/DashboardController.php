<?php

namespace App\Http\Controllers\Backend\Delivery;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    //
    public function index(){

     

        return view('backend.Delivery_Dashboard.dashboard.index');
    }
}
