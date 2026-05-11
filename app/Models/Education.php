<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    // Notice we define the table name here since Laravel might look for 'educations' plural
    protected $table = 'education';

    protected $guarded = [];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
