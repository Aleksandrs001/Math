<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswerStatistic extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_answer_statistic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'count',
        'win',
        'loss',
        'updated_at',
        'created_at',
        'minus_count',
        'minus_win',
        'minus_loss',
        'plus_count',
        'plus_win',
        'plus_loss',
        'minus_x_count',
        'minus_x_win',
        'minus_x_loss',
        'plus_x_count',
        'plus_x_win',
        'plus_x_loss',
    ];
    public function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null)
    {

    }
}
