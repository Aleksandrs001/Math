<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WrongAnswerModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_bad_answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'updated_at',
        'created_at',
        'user_id',
        'result',
        'competition',
        'full'
    ];

    public function user(): BelongsTo
    {
        $user_id = auth()->user();
        return $this->belongsTo(User::class);
    }

}
