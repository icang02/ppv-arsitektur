<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoPrestasi extends Model
{
    use HasFactory;
    protected $table = 'foto_prestasi';
    protected $guarded  = [''];
    public $timestamps = false;

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class);
    }
}
