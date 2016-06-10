<?php

namespace BetaGT\Marketplace\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BetaGT\Marketplace\Models\Categoria;
use BetaGT\Marketplace\Validators\CategoriaValidator;

/**
 * Class CategoriaRepositoryEloquent
 * @package namespace Teachei\Repositories;
 */
class CategoriaRepositoryEloquent extends BaseRepository implements CategoriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categoria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
