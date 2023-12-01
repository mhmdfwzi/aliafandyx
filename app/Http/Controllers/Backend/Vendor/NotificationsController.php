<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    // 
    public function index()
    {
        $vendor = Auth::user('vendor');
        $notifications = Notification::where('notifiable_type','=','App\Models\Vendor')
        ->where('notifiable_id',Auth::user('vendor')->id)
        ->get();
        
        return view('backend.Vendor_Dashboard.notifications.index',compact('notifications'));
    }
}
