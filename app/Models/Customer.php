<?php
//app/Models/Customer.php;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory; // Use the HasFactory trait

    protected $fillable =[
        'firstName',
        'lastName',
        'username',
        'password',
        'email',
        'photo',
        'provider_id',
        'provider_name',
        'provider_token',
    ];

    public static function login($customer){
        $cus = [
            'ID' => $customer->customerID == null ? $customer->id : $customer->customerID,
            'firstName' => $customer->firstName,
            'lastName' => $customer->lastName,
            'photo' => $customer->photo,
        ];
        session(['customer'=>$cus]);
    }

    public static function generateUsername($username){
        if($username == null){
            $username = Str::lower(Str::random(8));
        }
        if(Customer::where('username', $username)->exists()){
            $newUsername = $username.Str::lower(Str::random(3));
            $username = self::generateUsername($newUsername);
        }
        return $username;
    }

    public static function generateName($name){
        if($name == null){
            $name = 'user_'. time();
        }
        return $name;
    }

}

