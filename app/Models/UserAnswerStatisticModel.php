<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswerStatisticModel extends Model
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
        'plus_win',
        'plus_loss',
        'plus_count',
        'minus_win',
        'minus_loss',
        'minus_count',
        'minus_x_win',
        'minus_x_loss',
        'minus_x_count',
        'plus_x_win',
        'plus_x_loss',
        'plus_x_count',
        'divide_win',
        'divide_loss',
        'divide_count',
        'multiply_win',
        'multiply_loss',
        'multiply_count'
    ];

    static function getStatistic()
    {
        return UserAnswerStatisticModel::where('user_id', auth()->user()->id)->first();
    }

    static function getAllUsersStatistic()
    {
        return UserAnswerStatisticModel::all();
    }


}
