<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionInicio extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $primaryKey = 'id_publicacion';

    public $timestamps = false;

    protected $fillable = [
        'id_usuarios',
        'contenido_publicacion',
        'fecha_publicacion'
    ];

    protected $casts = [
        'fecha_publicacion' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuarios', 'id');
    }

    public function comentarios()
    {
        return $this->hasMany(\App\Models\Comentario::class, 'id_publicacion', 'id_publicacion');
    }
}
