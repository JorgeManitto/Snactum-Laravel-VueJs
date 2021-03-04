<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class personal_access_tokens extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = [
        'abilities',
    ];
}
