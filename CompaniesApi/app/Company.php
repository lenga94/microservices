<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Company extends Model
{
    //Table
    protected $table = 'companies';

    //Primary key
    protected $primaryKey = 'id';

    //timestamps
    public $timestamps = true;


    protected $fillable = [
        'company_code',
        'company_name',
        'company_profile',
        'status',
        'company_image',
    ];

    public function scopeStatus($query, $channel)
    {
        return $query->where('status', $channel);
    }
}
