<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryAdmin extends Model
{
    use HasFactory;

    protected $table = 'history_admin';

    protected $fillable = [
        'action',
        'quantity',
        'product_id',
        'user_id',
    ];
}
