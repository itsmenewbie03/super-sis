<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'age',
    ];

    public function grades(){
        return $this->hasMany(Grade::class);
    }
}
