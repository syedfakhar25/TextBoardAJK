<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowerArrangement extends Model
{
    use HasFactory;
    protected $fillable = ['*'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
