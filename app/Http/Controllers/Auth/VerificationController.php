<?php

namespace App\Http\Controllers\Auth;

// PASTIKAN BARIS INI ADA
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

// PASTIKAN "extends Controller" ADA DI SINI
class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Kode ini sekarang akan berjalan tanpa error
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
