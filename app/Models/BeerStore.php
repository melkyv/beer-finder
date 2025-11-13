<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BeerStore extends Pivot
{
    protected $fillable = [
        'price',
        'url',
        'promo_label',
    ];

    public function casts(): array
    {
        return [
            'price' => 'integer',
        ];
    }
}
