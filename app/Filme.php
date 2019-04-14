<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    // indica que esta tabela não contém os campos CREATED_AT e UPDATED_AT
    public $timestamps = false;

    // indica os campos que podem ser inseridos na tabela (método create)
    protected $fillable = ['titulo', 'genero', 'duracao'];
    // também pode ser utilizado o $guarded (mas, não ambos), 
    // para indicar os campos que não devem ser inseridos 
    
}
