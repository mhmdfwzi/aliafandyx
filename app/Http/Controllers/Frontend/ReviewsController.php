<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    //

        public  function index(){

        }

        public  function show(){

        }

        public  function create(){

        }

        public  function store(Request $request){

           
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'review' => 'required',
                'rating' => 'required',
                'product_id' => 'required',
                ]);

                // dd($request->all());

                // $data = $request->all();

                $data['user_id'] = Auth::user()->id;
                $data['product_id'] = $request->product_id;
                $data['review'] = $request->review;
                $data['rating'] = $request->rating;

                // dd($data);
                Review::create($data);
                return redirect()->back()->with('success','Review Submitted Successfully');
        }

        public  function edit($id){

            $review = Review::find($id);
            return view('frontend.pages.product_details',compact('review'));
        }
        public  function update(){

        }
        public  function destroy(){

        }
}


