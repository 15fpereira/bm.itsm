<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $fillable = [
        // chave estrageira padrão: _id
        // O Eloquent tentará encontrar um "Departamento" modelo que tenha um idque corresponda à post_idcoluna do Commentmodelo.
        // cargo_at é o cargo atual do colaborador
        'descricao', 'status'
    ];
    use HasFactory;
          /**
     *
     * Neste caso, o metodos precisa estar no plural. Mostra todos os colaboradores do departamento.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
        //return $this->belongsTo(Agenda::class);

    }

    public function users()
    {
        //return $this->hasMany(User::class);
        return $this->belongsTo(User::class);

    }
}
