<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Locales;

class ProfileController extends Controller
{
    //
    public function edit()
    {

        $user = Auth::user();
        $orders = Order::where('user_id',$user->id)->get();
        $destinations = Destination::all();

        return view('frontend.pages.profile.user_profile', [
            'user'=>$user,
            'orders'=>$orders,
            'destinations'=>$destinations,
            'countries'=> Countries::getNames('ar'),
            'locales'=>Locales::getNames('ar')
        ]);
    }

    public function getCities(Request $request)
    {
        // dd($request->governorate_id);

        $governorateId = $request->governorate_id;
        $cities = Destination::where('parent_id',$governorateId)->get();

        return response()->json(['cities' => $cities]);
    }

    public function getNeighborhoods(Request $request)
    {
        // dd($request->governorate_id);

        $cityId = $request->city_id;
        $neighborhoods = Destination::where('parent_id',$cityId)->get();

        return response()->json(['neighborhoods' => $neighborhoods]);
    }


    public function update(Request $request)
    {


        $request->validate([
            'first_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'gender'=>['in:male,female'],
            'email_address'=>['required'],
            'phone_number' => ['required','min:11'],
        ],[
            'first_name.required'=>'أدخل الأسم الأول'
        ]);
        $user = Auth::user('user');
        $data = $request->all();
        $data['password'] = $request->password ? Hash::make($request->password) : $user->password;
        $user->update($data);
        return redirect()->route('profile.edit');


    }

    public function userOrders()
    {
        $user = Auth::user('user');
        $orders = Order::where('user_id',$user->id)->get();
        return view('frontend.pages.profile.user_profile',compact('orders'));
    }


}
