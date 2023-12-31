<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class services extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'photo',
    ];

    public function prices()
    {
        return $this->hasMany(prices::class);
    }
}
