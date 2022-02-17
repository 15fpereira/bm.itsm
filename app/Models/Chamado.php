<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
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
}
