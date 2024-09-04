<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $primaryKey = 'id';
    protected $fillable = [
        'agent_id',
        'title',
        'description',
        'city_id',
        'location',
        'size',
        'buildingType',
        'propertyType',
        'price'
    ];
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(User::class, 'city_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class, 'id', 'property_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id', 'property_id');
    }
}
