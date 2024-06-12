<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = "subjects";

    protected $fillable = [
        'subjectcode',
        'subjectname',
        'description'
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
