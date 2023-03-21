<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $guarded = [''];
    public $timestamps = false;

    public function foto_fasilitas()
    {
        return $this->hasMany(FotoFasilitas::class);
    }
}
