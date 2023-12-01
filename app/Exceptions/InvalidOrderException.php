<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class InvalidOrderException extends Exception
{
    //
    // how to make report for this exception
    // public function report(){

    // }

    // how render this exception
    public function render(Request $request){
        
        return redirect()->route('home')->withInput()->withErrors([
            'message'=>$this->getMessage()
        ])->with('info',$this->getMessage());
    }
}
