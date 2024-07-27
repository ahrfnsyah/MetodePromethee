<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';

    protected $fillable = [
        'kriteria_id',
        'a1',
        'a2',
        'a3',
        'a4',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
