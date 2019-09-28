<?php
    
    namespace App\Http\Controllers;
    
    use App\SocialLogin;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Laravel\Socialite\Facades\Socialite;

    class UserController extends Controller
    {
        public function index()
        {
            return view('welcome');
        }
        
        public function login()
        {
            return view('user.login');
        }
        
        public function create()
        {
            return view('account.create');
        }
        
        public function add(Request $request)
        {
            $full_name = $request->input('full_name');
            $email = $request->input('email');
            $mobile = $request->input('mobile');
            $password = $request->input('password');
            
            $validationRules = [
                'full_name' => 'bail|required|string|max:75',
                'email'     => 'bail|required|email|max:75',
                'mobile'    => 'bail|required|digits_between:8,16',
                'password'  => 'bail|required|string|between:4,10',
            ];
            $validator = Validator::make($request->input(), $validationRules);
            
            if($validator->fails()) {
                $errorMessage = $validator->errors()->first();
                
                return redirect('/account/create')->with(['error' => $errorMessage]);
                
            }
            $user = User::getByEmail($email);
            if(!$user) {
                User::add($full_name, $email, $mobile, $password);
                
                return redirect('/login')->with(['success' => "Your account has been created successfully."]);
            } else {
                return redirect('account/create')->with(['error' => "This Account is already created."]);
            }
            
        }
        
        public function validateCredential(Request $request)
        {
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::getByEmail($email);
            if(!$user) {
                return redirect('/login')->with(['invalidEmail' => 'Invalid Username or Password']);
            }
            if($user && (Hash::check($password, $user['password']))) {
                $currentTime = time();
                $user->updateLastLoggedinTime($currentTime);
                $request->session()->put('user_id', $user['id']);
                $request->session()->put('full_name', $user['full_name']);
                
                return redirect('/');
            } else {
                return redirect('/login')->with(['invalidEmail' => 'Invalid Username or Password']);
                
            }
        }
        
        public function logout(Request $request)
        {
            $request->session()->flush();
            
            return redirect('/login');
        }
        
        public function redirectToGoogle()
        {
            return Socialite::driver('google')->redirect();
        }
        
        public function handleGoogleCallback(Request $request)
        {
            $socialSiteName = "Google";
            try {
                $social_user = Socialite::driver('google')->stateless()->user();

//                if(Socialite::driver('google')) {
//
//                    $social_user = Socialite::driver('google')->stateless()->user();
//                    dd($social_user);
//                } elseif(Socialite::driver('facebook')) {
//
//                    $social_user = Socialite::driver('facebook')->stateless()->user();
//                    dd($social_user);
//                }
                $findUser = SocialLogin::findGoogleUser($social_user['id']);
                if(empty($findUser)) {
                    $socialLogin = SocialLogin::add($social_user['id'], $social_user->token, $socialSiteName, $social_user['name'], $social_user['email']);
                    User::add($socialLogin['user_name'], $socialLogin['email'], null, null, $socialLogin['id']);
                }
                $user = User::getByEmail($social_user['email']);
                if($user) {
                    $request->session()->put('user_id', $user['id']);
                    $request->session()->put('full_name', $user['full_name']);
                }
                
                return redirect('/');
                
            } catch (\Exception $e) {
                return redirect('redirect/google');
            }
            
        }
        
        public function redirectToFacebook()
        {
            return Socialite::driver('facebook')->redirect();
        }
        
        public function handleFacebookCallback(Request $request)
        {
            $socialSiteName = "Facebook";
            
            try {
                $social_user = Socialite::driver('facebook')->stateless()->user();
                $findUser = SocialLogin::findGoogleUser($social_user['id']);
                if(empty($findUser)) {
                    $socialLogin = SocialLogin::add($social_user['id'], $social_user->token, $socialSiteName, $social_user['name'], $social_user['email']);
                    User::add($socialLogin['user_name'], $socialLogin['email'], null, null, $socialLogin['id']);
                }
                $user = User::getByEmail($social_user['email']);
                if($user) {
                    $request->session()->put('user_id', $user['id']);
                    $request->session()->put('full_name', $user['full_name']);
                }
                
                return redirect('/');
            } catch (\Exception $e) {
                return redirect('redirect/facebook');
            }
            
        }
        
        public function update(Request $request, User $user)
        {
            //
        }
        
        public function destroy(User $user)
        {
            //
        }
    }
