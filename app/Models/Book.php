<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['*'];

    public function advertisment(){
        return $this->belongsTo(Advertisment::class,'advertisment_id');
    }
}
