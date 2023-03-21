<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoFasilitas extends Model
{
    use HasFactory;
    protected $table = 'foto_fasilitas';
    protected $guarded = [''];
    public $timestamps = false;

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
