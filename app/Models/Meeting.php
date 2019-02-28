<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'candidate_id',
        'employer_id',
        'manager_id',
        'start',
        'finish',
        'venue'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'employer_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}
