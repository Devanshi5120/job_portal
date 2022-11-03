<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    use HasFactory;
    protected $table = 'jobseekers';

    protected $fillable = [
        'jobcategory_id',
        'name',
        'gender',
        'contact',
        'email',
        'image',
        'education',
        'status',
        
    ];
    public function jobcategory()
    {
        return $this->belongsTo(Jobcategory::class);
    }
}
