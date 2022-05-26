<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secondReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'advertisment_id',
        'challan',
        'status',
        'message'
    ];

    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }

    public function advertisment(){
        return $this->belongsTo(Advertisment::class, 'advertisment_id');
    }
}
