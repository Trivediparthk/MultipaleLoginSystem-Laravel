<?php
    
    namespace App;
    
    use Illuminate\Database\Eloquent\Model;

    class SocialLogin extends Model
    {
        protected $table = 'social_login';
        
        public static function findGoogleUser($googleId)
        {
            return SocialLogin::where('social_id', $googleId)->get()->toArray();
            
        }
        
        public static function add($social_id, $token, $social_site_name, $user_name, $email)
        {
            $social_login = new SocialLogin();
            $social_login->social_id = $social_id;
            $social_login->token = $token;
            $social_login->social_site_name = $social_site_name;
            $social_login->user_name = $user_name;
            $social_login->email = $email;
            $social_login->created_at = time();
            $social_login->updated_at = time();
            $social_login->save();
            
            return $social_login;
            
        }
    }
