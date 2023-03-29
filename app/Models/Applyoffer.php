<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applyoffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'user_id',
        'name',
        'email',
        'cv',
        'status',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}