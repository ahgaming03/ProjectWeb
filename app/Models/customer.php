<?php

// app/Models/Customer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'users'; // Specify the table name
    protected $primaryKey = 'user_id'; // Specify the primary key column name
    public $timestamps = true; // Enable timestamps (created_at and updated_at)

    // Define other properties or relationships as needed
}

