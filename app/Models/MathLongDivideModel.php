<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MathLongDivideModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'math_long_divide';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'long_divide_count',
        'long_divide_win',
        'long_divide_loss',
        'updated_at',
        'created_at',
        'user_id'

    ];


}
