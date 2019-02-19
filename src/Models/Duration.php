<?php

namespace Poing\Eviternity\Models;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{

    protected $fillable = [
        'alpha',
    ];

    /**
     * Used to test access to this class
     */
    public static function probe()
    {
        return true;
    }
}
