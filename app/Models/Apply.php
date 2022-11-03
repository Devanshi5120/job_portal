<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $table = 'applies';

    protected $fillable = [
        
        'fname',
        'lname',
        'gender',
        'contact',
        'email',
         'file',
       
        
    ];

}
