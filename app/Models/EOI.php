<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOI extends Model
{
    use HasFactory;
    protected $fillable = ['*'];

    public function eoibooks(){
        return $this->hasMany(EoiBook::class,'eoi_id');
    }

    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }

    public function advertisment(){
        return $this->belongsTo(Advertisment::class, 'advertisment_id');
    }
}
