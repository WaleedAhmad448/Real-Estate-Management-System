<?php

namespace App\Models;
// Author: Riham Muneer 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

}
