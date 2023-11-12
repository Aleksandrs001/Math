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
        'created_at'
    ];
}
