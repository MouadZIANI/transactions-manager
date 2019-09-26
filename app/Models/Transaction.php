<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $client_id
 * @property string $to_name
 * @property string $to_email
 * @property string $to_phone_number
 * @property string $transaction_code
 * @property float $total
 * @property string $sent_at
 * @property string $created_at
 * @property string $updated_at
 * @property Client $client
 * @property int $operator_id
 */
class Transaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['client_id', 'to_name', 'to_email', 'to_phone_number', 'transaction_code', 'total', 'sent_at', 'operator_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }
}
