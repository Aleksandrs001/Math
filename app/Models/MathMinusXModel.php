<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MathMinusXModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'math_minus_x';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'minus_x_count',
        'minus_x_win',
        'minus_x_loss',
        'updated_at',
        'created_at',
        'user_id'

    ];

}
