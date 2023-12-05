<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class users extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Billable;
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
        'is_admin',

    ];
}
