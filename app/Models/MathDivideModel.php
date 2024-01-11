<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MathDivideModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'math_divide';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'divide_count',
        'divide_win',
        'divide_loss',
        'updated_at',
        'created_at',
        'user_id'

    ];

}
