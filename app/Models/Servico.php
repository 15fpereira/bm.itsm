<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $fillable = [
        // chave estrageira padrão: _id
        // O Eloquent tentará encontrar uma classe "Chamado", modelo que tenha um id que corresponda à chamado_id coluna do Commentmodelo.
        // status terá três valores agendado, em andamento e concluido.
        'nome', 'descricao', 'status', 'portfolio_id'

    ];
    // Dessa forma o registro do serviço depende da existencia do portfólio.
    public function portfolios()
    {
        return $this->belongsTo(Portfolio::class);
    }
    public function chamados()
    {
        //return $this->belongsTo(Chamado::class);
        return $this->hasMany(Chamado::class);
    }
}
