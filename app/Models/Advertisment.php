<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;
    protected $fillable = ['*'];

    public function books(){
        return $this->hasMany(Book::class,'advertisment_id');
    }
}
