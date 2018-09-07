<?php

namespace ExpenseTracker\Models;

use Illuminate\Database\Eloquent\Model;
use ExpenseTracker\User;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'amount',
        'due_date',
        'paid'
    ];

    /**
     * Bill Belongs to User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
