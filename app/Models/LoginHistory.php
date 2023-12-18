<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Agent;

class LoginHistory extends Model
{
    use HasFactory;
    protected $table = 'login_history'; 
    protected $fillable = [
        'user_id',
        'ip_address',
        'login_at',
        'browser',
		'location',
    ];
    protected $casts = [
        'login_at' => 'datetime',
    ];
    public function setBrowserAttribute($value)
    {
        $agent = new Agent();
        $this->attributes['browser'] = $agent->browser(); // You can customize this based on your needs
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
