<?php

namespace BetaGT\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'parent_id', 'titulo', 'prioridade'
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
        $this->attributes['prioridade'] = $this->getLastPrioridade($this->attributes['parent_id']);
    }

    public function parent()
    {
        return $this->belongsTo(Categoria::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Categoria::class, 'parent_id', 'id')->orderBy('prioridade');
    }

    public function filtros()
    {
        return $this->hasMany(Filtro::class, 'categoria_id', 'id');
    }

    public function getLastPrioridade($value)
    {
        $last = $this->all()->sortByDesc('prioridade')->where('parent_id', $value)->first();

        return empty($last->prioridade) ? 1 : $last->prioridade + 1;
    }
}
