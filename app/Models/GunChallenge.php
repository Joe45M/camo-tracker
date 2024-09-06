<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GunChallenge extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['came_category', 'camo_name', 'gun_id', 'challenge', 'mode'];

    public function gun()
    {
        return $this->belongsTo(Gun::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
