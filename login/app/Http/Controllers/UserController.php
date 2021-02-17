<?php
namespace App\Http\Controllers;
// use App\User;
// namespace App;
use Illuminate\Support\Facades\DB;
use DB as DBraw;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use App\Http\Controllers\User;
class UserController extends Controller
{
    public function index() {
        return view('registration');
    }



    public function userPostRegistration(Request $request) {
// dd($request);
        // validate form fields
        $request->validate([
                'name'        =>             'required',
                'email'             =>      'required|unique:users|email',
                'password'          =>      'required',
                'confirmpassword'  =>      'required|same:password',
                // 'username'=>'required'
                
                ]);

        $input          =           $request->all();
       
        // if validation success then create an input array
        $inputArray      =           array(
            'username'=> $request->username,
            'name'        =>      $request->name,
            'email'         =>      $request->email,
            'password'          =>      Hash::make($request->password),
            'confirmpassword'             =>      $request->confirmpassword,
            'city'=>$request->city,
            'state'=>$request->state
             
        );
        // dd($inputArray );
        
        // register user
        $user           =           User::create($inputArray);
        // dd($inputArray);
        // if registration success then return with success message
        if(!is_null($user)) {
            // dd($user);
            return redirect('/user-login');
            return back()->with('success', 'You have registered successfully.');
          
        }
        // else return with error message
        else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }
    }

    function check(Request $request)
   	{
   		if($request->get('username'))
   		{
   			$username = $request->get('username');
   			$data = DB::table("users")
   				->where('username', $username)
   				->count();
   			if($data > 0)
   			{
   				echo 'not_unique';
   			}
   			else
   			{
   				echo 'unique';
   			}
   		}
   	}


// -------------------- [ User login view ] -----------------------
    public function userLoginIndex() {
        return view('login');
    }


// --------------------- [ User login ] ---------------------
    public function userPostLogin(Request $request,$id) {

        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required"
        ]);
      

        $userCredentials = $request->only('email', 'password');
           
        // check user using auth function


        
        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('dashboard');

        }

        else {
            return back()->withSuccess('Whoops! invalid username or password.');
        }
        
    }


// ------------------ [ User Dashboard Section ] ---------------------
    public function dashboard(Request $request) {
        // check if user logged in
        if(Auth::check()) {
            $city = Auth::user()->city;
            $state = Auth::user()->state;



            $sel_query = "SELECT * from users";
            $res_query = DBraw::select($sel_query);
            $res_query = json_decode(json_encode($res_query), true);
            if (count($res_query)) {
                foreach ($res_query as $res) {
    
                
                    $productlist = $res['id'];
                }
            } else {
                $productlist = array();
            }
            return view('dashboard',compact("city","state",'productlist'));
        }

        return redirect::to("user-login")->withSuccess('Oopps! You do not have access');
    }


// ------------------- [ User logout function ] ----------------------
public function logout(Request $request ) {
    $request->session()->flush();
    Auth::logout();
    return Redirect('user-login');
    }

    public function admin_product_detail(Request $request, $pbcid)
    {
        
        try {

            $sel_query = "SELECT * from users where users.id = " . $pbcid;
          
            $res_query = DBraw::select($sel_query);
            $res_query = json_decode(json_encode($res_query), true);
            
            if (count($res_query)) {
                $res = $res_query[0];
               
                $jp_obj = array(
                    'id' => $res['id'],
                    'city' => $res['city'],
                    'state' => $res['state'],
                );
                
                // dd($jp_obj);
            } else {
                //  $csrlist = array();
                //errorView
            }

           

            return view('/editpage', compact(['jp_obj']));
        } catch (\Exception $ex) {
            dd($ex);
            error_log('exception' . $ex->getMessage());
        }
    }


    public function update_product(Request $request, $pbcid)
    {
        $city=$request->input('city');
        $state=$request->input('state');

        DB::beginTransaction();

        try {
            DB::table('users')->where('id', $pbcid)->update([
    'city' => $city,
                'state' => $state,

            ]);
            DB::commit();
            return \redirect('user-login');
        } catch (\Exception $ex) {

            DB::rollback();
            dd($ex);
            return \redirect('/error-page');
        }
    }
    
public function show(request $request,$id)
{
    $crud= User::find($id);  
   
    return view('listpage', compact('crud'));  


}

public function destroy($id)  
    {  
        $crud=Crud::find($id);  
        $crud->delete();  
    } 


    

    
 
}


// }
