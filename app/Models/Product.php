<?php

namespace App\Models;

use App\Traits\UuidManager;
use App\Traits\ModelEventThrower;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use UuidManager;
    use ModelEventThrower;

    protected $fillable = [

        'uuid', 'name', 'price', 'discount', 'description', 'image'
    ];
}
