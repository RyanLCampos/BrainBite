<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disciplina;

class Tarefa extends Model
{
    
    protected $fillable = ['titulo', 'descricao', 'status', 'data_entrega', 'disciplina_id'];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


