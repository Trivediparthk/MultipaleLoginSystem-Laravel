<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>
</p>

##LoginWith Facebook and google with sociallite without Authuser in Laravel

composer require laravel/socialite

'providers' => [
    // Other service providers...
Laravel\Socialite\SocialiteServiceProvider::class,
],

<p>You also need to add its facade in aliases array,</p>
'Socialite' => Laravel\Socialite\Facades\Socialite::class,

<p>Register yourself at developers.facebook.com.
</p>

in you .env file,
FB_CLIENT_ID = Your FB App Id
FB_CLIENT_SECRET = Your FB App Secret
FB_REDIRECT = 'http://localhost:8000/callback/facebook'

and in your config/services.php file
'facebook' => [ 
                'client_id' => env ( 'FB_CLIENT_ID' ),
                'client_secret' => env ( 'FB_CLIENT_SECRET' ),
                'redirect' => env ( 'FB_REDIRECT' ) 
        ],
        <p>same as google</p> 
      <p>  
        'google' => [
    'client_id'     => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect'      => env('GOOGLE_REDIRECT')
],</p>
Since we added a new package, make sure to add to the service providers array in config/app.php:
/*
* Package Service Providers...
*/
Laravel\Socialite\SocialiteServiceProvider::class,

Add an alias to Socialite so it is easier to reference later, also in config/app.php file:
'aliases' => [
    // ...
    'Socialite' => Laravel\Socialite\Facades\Socialite::class,
]

5. Create your app in Google 🌈
Create a project: https://console.developers.google.com/projectcreate
Create credentials: https://console.developers.google.com/apis/credentials

