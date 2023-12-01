<?php 


namespace App\Repositories\Cart;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
Interface CartRepository {

          // function get cart items
          public function get() : Collection;

          // function to add to cart 
          public function add(Product $product , $quantity = 1,$color,$size,$measure);

          public function update($cart_id,$quantity,$product_id);

          public function delete($cart_id);

          public function empty();

          public function total();

          public function setCouponCode($request);


}
