<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MathPlusModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'math_plus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plus_count',
        'plus_win',
        'plus_loss',
        'updated_at',
        'created_at',
        'user_id'

    ];

}
