<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Session\TokenMismatchException;

class Handler extends ExceptionHandler
{
	public function render($request, Throwable $exception)
{
  if ($exception instanceof TokenMismatchException){
  	return redirect()->back();    
  }

  return parent::render($request, $exception);
}
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];
	

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
            if ($e->getCode() === '23000') {
                Log::channel('sql')->warning($e->getMessage());
                return false;
            }
            return true;
        });

        $this->renderable(function(QueryException $e ,Request $request){

            // custom message for delete foreignKey errors  
            if($e->getCode() == 23000){
                $message = "Foreign Key Constraint Failed";
            }else {
                $message = $e->getMessage();
            }

            if($request->expectsJson()){
                return response()->json([
                    'message'=>$message
                ],400);
            }

            return redirect()->back()->withInput()->withErrors([
                'message'=>$message
            ])->with('info',$message);

        });
    }
}
