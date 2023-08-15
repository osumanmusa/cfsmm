<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    
    protected $table = "events";

    protected $fillable = [
        'title' ,
        'description' ,
        'location' ,
        'sponsors' ,
        'event_date' ,
        'event_image' ,

    ];
}
