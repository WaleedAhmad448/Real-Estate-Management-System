<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'property_id',
        'client_id',
        'agent_id',
        'transaction_type',
        'status',
        'date'
    ];
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'property_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'user_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'user_id');
    }
}
