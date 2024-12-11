<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MathLongDivideWithoutReminderModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'math_long_divide_without_reminder';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'long_divide_without_reminder_count',
        'long_divide_without_reminder_win',
        'long_divide_without_reminder_loss',
        'updated_at',
        'created_at',
        'user_id'

    ];

}
