<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Kategori extends Model
{
    use HasFactory;

    // Nama kolom yang boleh diisi otomatis (mass assignment)
    protected $fillable = ['nama'];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

}