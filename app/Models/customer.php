<?php

// app/Models/Customer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers'; // Specify the table name
    protected $primaryKey = 'customerID'; // Specify the primary key column name
    public $timestamps = true; // Enable timestamps (created_at and updated_at)

    // Define other properties or relationships as needed
}

