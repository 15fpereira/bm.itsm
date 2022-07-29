<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        // chave estrageira padrão: _id
        // O Eloquent tentará encontrar uma classe "Chamado", modelo que tenha um id que corresponda à chamado_id coluna do Commentmodelo.
        // status terá três valores agendado, em andamento e concluido.
        'observacao',
        'descricao',
        'status',
        'chamado_id',
        'user_id'

    ];
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
