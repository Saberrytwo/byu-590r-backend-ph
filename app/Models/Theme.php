<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'duration',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
