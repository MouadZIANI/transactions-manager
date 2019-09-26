<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $phone_number
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Transaction[] $transactions
 */
class Client extends Model
{

    protected $with = ['user'];
    
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'phone_number', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'client_id');
    }
}
