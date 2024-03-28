<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'imageURL',
        'weightClass',
        'originGame',
        'releasePack',
        'playstyleDescription',
    ];

    public function moves()
    {
        return $this->hasMany(Move::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function theme(){
        return $this->hasOne(Theme::class);
    }
}
