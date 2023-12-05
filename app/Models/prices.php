<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prices extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'price', 'currency'];
    public function service()
    {
        return $this->belongsTo(services::class);
    }
}
