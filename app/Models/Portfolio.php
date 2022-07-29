<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        // chave estrageira padrão: _id
        // O Eloquent tentará encontrar uma classe "Chamado", modelo que tenha um id que corresponda à chamado_id coluna do Commentmodelo.
        // status terá três valores agendado, em andamento e concluido.
        'tipo',
        'objetivo',
        'descricao',
        'status'

    ];
    use HasFactory;
    // Dessa forma o registro do serviço depende da existencia do portfólio.
    public function servicos()
    {
        return $this->hasMany(Servico::class);
        //return $this->belongsTo(Agenda::class);

    }

}
