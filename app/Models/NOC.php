<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NOC extends Model
{
    use HasFactory;
    protected $fillable =[
        'advertisment_id',
        'user_id',
        'noc',
    ];

    public function advertisment(){
        return $this->belongsTo(Advertisment::class, 'advertisment_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
