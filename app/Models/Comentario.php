<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $primaryKey = 'id_comentario';
    public $timestamps = false;

    protected $fillable = [
        'id_usuarios',
        'id_publicacion',
        'contenido_comentario',
        'fecha_publicacion_comentario'
    ];

    protected $casts = [
        'fecha_publicacion_comentario' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuarios', 'id');
    }

    public function publicacion()
    {
        return $this->belongsTo(PublicacionInicio::class, 'id_publicacion', 'id_publicacion');
    }
}
