<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['titulo', 'descricao', 'local', 'data', 'hora'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
