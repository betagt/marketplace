<?php

namespace BetaGT\Marketplace\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use BetaGT\Marketplace\Models\Filtro;
use BetaGT\Marketplace\Validators\FiltroValidator;

/**
 * Class FiltroRepositoryEloquent
 * @package namespace Teachei\Repositories;
 */
class FiltroRepositoryEloquent extends BaseRepository implements FiltroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Filtro::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
