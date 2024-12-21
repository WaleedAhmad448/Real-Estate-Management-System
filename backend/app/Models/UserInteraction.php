<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInteraction extends Model
{
    use HasFactory;
    protected $table = 'user_interactions';
    protected $primaryKey = 'interaction_id';
    protected $fillable = [
        'user_id_1',
        'user_id_2',
        'notes',
        'interaction_type',
        'interaction_date'
    ];
    public function user1()
    {
        return $this->belongsTo(User::class, 'user_id_1', 'user_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user_id_2', 'user_id');
    }
}
