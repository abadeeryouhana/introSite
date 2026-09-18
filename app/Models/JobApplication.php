<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(JobPosition::class, 'job_position_id');
    }
}
