<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPhoto extends Model
{
    use HasFactory;
    protected $table = 'property_photos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'property_id',
        'photo_url',
        'date'
    ];
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'property_id');
    }
}
