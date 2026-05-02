<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriErfanImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'galeri_erfan_id',
        'image_path',
        'file_type',
        'caption',
    ];

    public function galeriErfan()
    {
        return $this->belongsTo(GaleriErfan::class);
    }
}
