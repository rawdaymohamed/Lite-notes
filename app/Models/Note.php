<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return "uuid";
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}