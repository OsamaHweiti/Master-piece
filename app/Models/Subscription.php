<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscriptionshost';
    protected $fillable = ['user_id', 'price_id', 'duration_days'];

    public function user()
    {
        return $this->belongsTo(users::class);
    }

    public function price()
    {
        return $this->belongsTo(prices::class);
    }
}
