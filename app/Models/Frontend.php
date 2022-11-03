<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontend extends Model
{
    use HasFactory;
    protected $table = 'frontends';

    protected $fillable = [
        'message',
        'name',
        'email',
        'subject',
        
    ];
}
