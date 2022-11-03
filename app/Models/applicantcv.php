<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicantcv extends Model
{
    use HasFactory;
    protected $table = 'applicantcvs';

    protected $fillable = [
        'jobcategory_id',
        'recruiter_id',
        'jobseeker_id',
         'file',
    ];
    public function jobcategory()
    {
        return $this->belongsTo(Jobcategory::class);
    }
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }
    public function jobseeker()
    {
        return $this->belongsTo(Jobseeker::class);
    }
}
