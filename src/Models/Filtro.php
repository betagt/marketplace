<?php

namespace BetaGT\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Filtro extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'categoria_id', 'titulo', 'prioridade'
    ];

    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function setPrioridadeAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['prioridade'] = $value;
            return;
        }
        $this->attributes['prioridade'] = $this->getLastPrioridade();
    }

    public function getLastPrioridade()
    {
        $last = $this->all()->sortByDesc('prioridade')->first();

        return empty($last->prioridade) ? 1 : $last->prioridade + 1;
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
