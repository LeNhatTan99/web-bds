<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'name',
        'address',
        'phone_number',
        'email',
        'content',
        'status',
    ];
}
