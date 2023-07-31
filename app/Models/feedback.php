<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // Define any relationships or additional methods as needed
    protected $table = 'feedbacks';
    protected $primaryKey = 'fb_id';
    protected $fillable = [
        'user_id',
        'feedback_message',
        // Add other fillable columns here
    ];
}
