<?php



namespace App\Http\Controllers\ADMIN;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;



class AdminLoginController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */



    use AuthenticatesUsers;



    protected $guard = 'admin';



    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/admin';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');
    }



    public function showLoginForm()

    {

        return view('authadmin.adminLogin');
    }



    public function login(Request $request)

    {

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            dd(auth()->guard('admin')->user());
        }



        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
