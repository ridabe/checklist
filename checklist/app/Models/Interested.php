<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interested extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cake_id',
        'sent'
    ];

    public function cake(){
        return $this->belongsTo(Cake::class);
    }
}
