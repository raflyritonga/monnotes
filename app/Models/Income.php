<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [
        'income_description',
        'category',
        'amount',
        'date_of_income'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
