<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserParam extends Model
{

    public function Model(){ return UserParam::class; }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_param';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'param',
        'value',
        'updated_at',
        'created_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
