<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobpost extends Model
{
    use HasFactory;
    protected $table = 'jobposts';

    protected $fillable = [
        'jobcategory_id',
        'recruiter_id',
        'description',
    
     
        
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
