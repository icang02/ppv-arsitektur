<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';
    protected $guarded = [''];

    public function foto_prestasi()
    {
        return $this->hasMany(FotoPrestasi::class);
    }
}
