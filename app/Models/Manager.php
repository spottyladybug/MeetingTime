<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function business_hours()
    {
        return $this->hasMany(BusinessHour::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class)->with('candidate');
    }

    public function candidates()
    {

    }
}
