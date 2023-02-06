<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// fornecedors

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Sobrescreve a tabela
    protected $table = 'Fornecedores';

    // Permite que a classe receba os atributos especificados 
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
