<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MathMinusModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'math_minus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'minus_count',
        'minus_win',
        'minus_loss',
        'updated_at',
        'created_at',
        'user_id'

    ];

}
