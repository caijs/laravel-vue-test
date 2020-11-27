<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $appends = ['playerCounts'];

    protected $hidden = ['players'];

    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }

    public function getPlayerCountsAttribute()
    {
        return $this->players->count();
    }
}
