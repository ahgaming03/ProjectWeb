<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
        $socialUser = Socialite::driver($provider)->user();
        $customer = Customer::where([
            'provider_id' => $socialUser->id,
            'provider_name' => $provider
        ])->first();

        if (!$customer) {
            // Insert new customer
            $customer = Customer::create([
                'provider_id' => $socialUser->id,
                'provider_name' => $provider,
                'firstName' => Customer::generateName($socialUser->name),
                'username' => Customer::generateUsername($socialUser->nickname),
                'password' => Hash::make(Str::random(25)),
                'email' => $socialUser->email,
                'photo' => $socialUser->avatar,
                'provider_token' => $socialUser->token,
            ]);
        }
        Customer::login($customer);
        return redirect()->route('product-index');
        } catch (\Exception $ex) {
            return redirect()->route('customer-login');
        }

    }
}