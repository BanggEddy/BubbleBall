<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'prix',
        'quantity',
        'image',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function addQuantity($quantity)
    {
        $this->quantity += $quantity;
        $this->save();
    }

    public function removeQuantity($quantity)
    {
        $this->quantity -= $quantity;
        if ($this->quantity < 0) {
            $this->quantity = 0;
        }
        $this->save();
    }
}
