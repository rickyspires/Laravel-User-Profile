<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city', 'state', 'country', 'about', 'user_id'
    ];

    /**
     * Profile has one User
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];
}
