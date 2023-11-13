<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MathMultiplyModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'math_multiply';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'multiply_count',
        'multiply_win',
        'multiply_loss',
        'updated_at',
        'created_at',
        'user_id'

    ];

}
