<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitem::class);
    }

    public function price()
    {
        $price = 0;
        foreach ($this->ingredients as $ingredient)
        {
            $price += $ingredient->price;
        }
        return $price;
    }

    public function pizza()
    {
        return $this->belongsTo(User::class);
    }
}
