<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'father_name',
        'dob',
        'gender',
        'marital_status',
        'husband_name',
        'cnic',
        'father_cnic',
        'husband_cnic',
        'email',
        'present_address',
        'permanent_address',
        'firm_name',
        'firm_phone',
        'firm_cell',
        'firm_address',
        'firm_status',
        'firm_tax_no',
        'firm_gst_no',
        'initial_approve',
        'eoi_approve',
        'user_type',
        'password',
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function showroom(){
        return $this->hasOne(Showroom::class,'user_id');
    }

    public function printing_machine(){
        return $this->hasMany(PrintingMachine::class,'user_id');
    }

    public function power_arrangement(){
        return $this->hasOne(PowerArrangement::class,'user_id');
    }

    public function binding_facility(){
        return $this->hasOne(BindingFacility::class,'user_id');
    }

    public function financial_position(){
        return $this->hasMany(FinancialPosition::class,'user_id');
    }

    public function publishing_experience(){
        return $this->hasOne(PublishingExperience::class,'user_id');
    }
    public function godown_facility(){
        return $this->hasOne(GodownFacility::class,'user_id');
    }

    public function document(){
        return $this->hasOne(Document::class,'user_id');
    }

    public function rsgister_publisher(){
        return $this->hasOne(RegisterPublisher::class,'user_id');
    }

    public function eoi(){
        return $this->belongsTo(EOI::class, 'user_id');
    }
    public function firstreview(){
        return $this->belongsTo(firstReview::class, 'user_id');
    }
    public function secondreview(){
        return $this->belongsTo(secondReview::class, 'user_id');
    }
    public function thirdreview(){
        return $this->belongsTo(thirdReview::class, 'user_id');
    }

}
