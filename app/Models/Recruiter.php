<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;
    protected $table = 'recruiters';

    protected $fillable = [
        'jobcategory_id',
        'name',
        'address',
        'city',
        'contact',
        'email',
        'website',
        'image',
    ];
    public function jobcategory()
    {
        return $this->belongsTo(Jobcategory::class);
    }
}
