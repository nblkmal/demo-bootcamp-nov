<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    // use HasFactory;

    // data/ column yang boleh diisi
    protected $fillable = [
        'title',
        'description',
        'amount',
        'category',
        'notes',
    ];
}
