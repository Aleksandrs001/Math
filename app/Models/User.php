<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function wrongAnswers(): HasMany
    {
        return $this->hasMany(WrongAnswerModel::class);
    }

    public function userParam(): HasMany
    {
        return $this->hasMany(UserParam::class);
    }

    public function mathDivide(): BelongsTo
    {
        return $this->belongsTo(MathDivideModel::class, 'id', 'user_id');
    }

    public function mathMultiply(): BelongsTo
    {
        return $this->belongsTo(MathMultiplyModel::class, 'id', 'user_id');
    }

    public function mathMinus(): BelongsTo
    {
        return $this->belongsTo(MathMinusModel::class, 'id', 'user_id');
    }

    public function mathPlus(): BelongsTo
    {
        return $this->belongsTo(MathPlusModel::class, 'id', 'user_id');
    }

    public function plusXFind(): BelongsTo
    {
        return $this->belongsTo(MathPlusXModel::class, 'id', 'user_id');
    }

    public function minusXFind(): BelongsTo
    {
        return $this->belongsTo(MathMinusXModel::class, 'id', 'user_id');
    }

    public function longDivideWithoutReminder(): BelongsTo
    {
        return $this->belongsTo(MathLongDivideWithoutReminderModel::class, 'id', 'user_id');
    }
}
