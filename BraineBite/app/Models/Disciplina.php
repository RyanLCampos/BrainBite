<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarefa;


class Disciplina extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}