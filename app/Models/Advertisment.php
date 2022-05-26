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
    public function eois(){
        return $this->hasMany(EOI::class,'advertisment_id');
    }

    public function firstreview(){
        return $this->hasMany(firstReview::class,'advertisment_id');
    }
    public function secondreview(){
        return $this->hasMany(secondReview::class,'advertisment_id');
    }
    public function thirdreview(){
        return $this->hasMany(thirdReview::class,'advertisment_id');
    }
}
