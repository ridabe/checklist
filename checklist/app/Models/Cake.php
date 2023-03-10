<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'price',
        'amount'
    ];

    public function hasInteresteds(){
        return $this->hasMany(Interested::class);
    }
}
