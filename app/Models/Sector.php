<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function caseStudies()
    {
        return $this->hasMany(CaseStudy::class);
    }
}
