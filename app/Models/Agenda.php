<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    /**
     * Get the colaborador that owns the Colaborador
     * Importante que o nome da chave estrageira seja o mesmo nome do metodo seguido de _id.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function chamados()
    {
        return $this->belongsTo(Chamado::class);
    }
}
