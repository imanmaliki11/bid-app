<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        "user_id", "name", "status", "start_price", "adding_per_bid", "descriptions", "images", "end_bid", "comments", "props"
    ];
}
