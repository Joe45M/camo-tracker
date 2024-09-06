<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GunChallengeUser extends Model
{
    use HasFactory;


    public $fillable = [
        'gun_challenge_id',
        'user_id',
        'completed',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gun_challenge()
    {
        return $this->belongsTo(GunChallenge::class);
    }
}
