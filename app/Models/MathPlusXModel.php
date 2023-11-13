<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MathPlusXModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'math_plus_x';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plus_x_count',
        'plus_x_win',
        'plus_x_loss',
        'updated_at',
        'created_at',
        'user_id'

    ];

}
