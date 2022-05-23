<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EoiBook extends Model
{
    use HasFactory;
    protected $fillable = ['*'];
    public function eoi(){
        return $this->belongsTo(EOI::class,'eoi_id');
    }
}
