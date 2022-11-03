<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';

    protected $fillable = [
        'jobcategory_id',
        'recruiter_id',
        'title',
        'description',
        'type',
        'vacancy',
        'qualification',
        'designation',
        'skill',
        'experience',
        'image',
     
        
    ];
    public function jobcategory()
    {
        return $this->belongsTo(Jobcategory::class);
    }
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }
}
