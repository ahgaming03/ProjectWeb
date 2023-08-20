<?php
//app/Models/Customer.php;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory; // Use the HasFactory trait

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

}

