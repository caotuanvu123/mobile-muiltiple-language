<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Socialite;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        try {
            $userFacebook = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
        $user = User::where('provider_id', $userFacebook->getId())->first();
        if(!$user) {
            $ur = User::create([
                'name' => $userFacebook->getName() ,
                'email' => $userFacebook-> getEmail(),
                'provider' => 'facebook',
                'provider_id' => $userFacebook->getId()
            ]);
            $ur->attachRole(User::CUSTOMER);
        }

        auth()->login($user);
        return redirect()->to('/');
    }
}
