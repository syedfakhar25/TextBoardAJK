<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Royalty extends Model
{
    use HasFactory;
    protected $fillable=[
        'advertisment_id',
        'user_id',
        'total_price',
        'current_price',
    ];
    public function advertisment(){
        return $this->belongsTo(Advertisment::class, 'advertisment_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function royaltychallan(){
        return $this->hasMany(RoyaltyChallan::class, 'royalty_id');
    }
}
