<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_info';

    protected $fillable = [
        'user_id',
        'companyname',
        'address',
        'city',
        'zip',
        'state',
        'country',
        'phone',
        'password',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
