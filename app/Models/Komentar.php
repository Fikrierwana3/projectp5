<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $fillable = ['id_berita','id_user', 'isi_komentar'];
    protected $visible = ['id_berita','id_user', 'isi_komentar'];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'id_berita');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }
}
