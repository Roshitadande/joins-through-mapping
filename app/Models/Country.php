<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    
    use SoftDeletes;
    use HasFactory;
    protected $table="country";
    protected $fillable = [
        'name',
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
