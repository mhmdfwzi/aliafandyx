<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Currency;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\TempSession;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cart;


    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = session('coupon', null);
        $temp_session = null;

        if (Auth::check()) {
            $temp_session = TempSession::where('user_id', Auth::user()->id)->first();
        }

        return view('frontend.pages.cart', [
            'cart' => $this->cart,
            'coupon' => $coupon,
            'temp_session' => $temp_session,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartRepository $cart)
    {

        $product = Product::findOrFail($request->post('product_id'));

        $cart->add($product, 
        $request->post('quantity'),
        $request->post('color'),
        $request->post('size'),
        $request->post('measure'),
        
    );
       

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            // 'product_id'=>['required','int','exists:products,id'],
            'quantity' => ['required', 'int', 'min:1'],
        ]);
        // $this->cart->update($id, $request->post('quantity'),);

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->cart->delete($id);

        return redirect()->route('cart.index');
    }

    public function emptyCart()
    {
        $this->cart->empty();

        return redirect()->route('cart.index');
    }

    public function total()
    {
        // return Currency::format($this->cart->total());
        $this->cart->total();

    }


    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');


        // Retrieve the coupon details from the database
        $coupon = Coupon::where('code', $couponCode)
            ->first();



        if ($coupon) {

            if ($coupon->expiration_date > now()) {
                $temp_session = new TempSession();
                $temp_session->coupon_id = $coupon ? $coupon->id : null;
                $temp_session->user_id = Auth::user('user')->id;
                $temp_session->save();
                // Check if the coupon is already applied for the current user
                if (Session::has('coupon') && Session::get('coupon')->id === $coupon->id) {
                    return redirect()->back()->with('error', 'Coupon has already been applied.');
                }
                // Store the coupon details in the session
                Session::put('coupon', $coupon);
                Session::put('coupon_code', $coupon->code);

                $coupon->increment('usage_count');

                return redirect()->back()->with('success', 'Coupon applied successfully.');
            } else {
                return redirect()->back()->with('error', 'Coupon is expired');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid coupon code.');
        }

        return null;
    }




    // function to edit sub_total using ajax
    public function get_sub_total(Request $request)
    {

        $quantity = $request->quantity;
        $product_id = $request->product_id;
        $cart_id = $request->cart_id;


        $product_price = Product::where('id', $product_id)->value('price');
        $product_measure = Product::where('id', $product_id)->value('measure');
        $item_measure = Cart::where('id', $cart_id)->value('measure');

        $this->cart->update($cart_id, $quantity, $product_id);

        if($product_measure==.10){
            $sub_total =  $quantity*$product_price*$item_measure/100;
        }else{
            $sub_total =  $quantity*$product_price*$item_measure;
        }
       

        $formatted_sub_total = Currency::format($sub_total);

        return response()->json([
            'formatted_sub_total' => $formatted_sub_total,
        ]);
        // return response()->json([
        //     'sub_total' => $sub_total,
        // ]);
    }


    public function getFormattedCurrency($amount)
    {
        // dd($amount);
        $formattedCurrency = Currency::format($amount);
        return response()->json([
            'formatted_currency' => $formattedCurrency,
        ]);
    }

    public function get_all_total(Request $request)
    {

        $quantity = $request->quantity;

        dd(Cart::with('product')->get());
        $total = Cart::with('product')->get()->sum(function ($item) use ($quantity) {
            dd($item);
            return $quantity * $item->product->price;
        });

        return view('frontend.pages.total_price_part', [
            'total' => $total,
        ]);

        // return $total;
    }


    public function calculateShippingFees(){
        
    }
}