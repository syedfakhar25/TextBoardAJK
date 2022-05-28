<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoyaltyChallan extends Model
{
    use HasFactory;
    protected $fillable=[
        'royalty_id',
        'challan'
    ];

    public function royalty(){
        return $this->belongsTo(Royalty::class, 'royalty_id');
    }
}
