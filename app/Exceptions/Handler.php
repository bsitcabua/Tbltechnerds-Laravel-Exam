<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    public function unauthenticated($request, AuthenticationException $exception)
    {

        $guard = Arr::get($exception->guards(),0);
        
        switch ($guard){
            case 'admin':
                // Check if the user already logged in
                // If true then redirect to user dashboard
                if (auth()->check()) {
                    return redirect('/');
                }
                else{
                    // Else redirect to admin login
                    return redirect('/admin/login');
                }
            break;
            default:
                // Check if the admin already logged in
                // If true then redirect to admin dashboard
                if (auth()->guard('admin')->check()) {
                    return redirect('/admin');
                }
                else{
                    return redirect('/login');
                }
            break;
        }
    }
    
}
