<?php
    
    namespace App;
    
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Hash;

    class User extends Model
    {
        protected $table = 'user';
//        protected $dateFormat = 'U';

//        public $timestamps = false;
        
        public static function add($full_name, $email, $mobile, $password, $social_login_id = null)
        {
            $user = new User();
            $user->full_name = $full_name;
            $user->mobile = $mobile;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->is_active = true;
            $user->social_login_id = $social_login_id;
            $user->created_at = time();
            $user->updated_at = time();
            
            $user->save();
            
            return $user;
        }
        
        public static function getByEmail($email)
        {
            return User::where('email', $email)->first();
        }
        
        public function updateLastLoggedinTime($currentTime)
        {
            
            $this->last_logged_in = $currentTime;
            $this->save();
        }
        
    }
