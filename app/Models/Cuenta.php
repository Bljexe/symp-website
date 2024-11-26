<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $connection = 'mysql2'; // Conexão para o banco secundário
    protected $table = 'cuentas';

    public $timestamps = false;

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'cuenta',
        'contraseña',
        'rango',
        'nombre',
        'apellido',
        'pais',
        'idioma',
        'ipRegistro',
        'cumpleaños',
        'email',
        'ultimaIP',
        'pregunta',
        'respuesta',
        'apodo',
        'baneado',
        'logeado',
        'creditos',
        'ogrinas',
        'votos',
        'actualizar',
        'ultimoVoto',
        'abono',
        'donaciones',
    ];

    // Campos que não devem ser exibidos ao serializar a model
    protected $hidden = [
        'contraseña',
    ];

    // Tipos de dados para cada coluna
    protected $casts = [
        'rango' => 'integer',
        'baneado' => 'integer',
        'logeado' => 'boolean',
        'creditos' => 'integer',
        'ogrinas' => 'integer',
        'votos' => 'integer',
        'actualizar' => 'boolean',
        'ultimoVoto' => 'datetime',
        'abono' => 'integer',
        'donaciones' => 'integer',
    ];

    /**
     * Acessor para o campo "contraseña".
     */
    public function getPasswordAttribute()
    {
        return $this->attributes['contraseña'];
    }

    /**
     * Mutator para o campo "contraseña".
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['contraseña'] = $value;
    }
}
