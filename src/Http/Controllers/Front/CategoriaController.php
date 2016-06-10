<?php

namespace BetaGT\Marketplace\Http\Controllers\Front;

use BetaGT\Marketplace\Repositories\CategoriaRepository;
use BetaGT\Master\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    /**
     * @var CategoriaRepository
     */
    private $repository;

    /**
     * CategoriaController constructor.
     */
    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $list = $this->repository->scopeQuery(function($query){
            return $query->where('parent_id', 0);
        })->paginate();

        return view('categoria.index', compact('list'));
    }

    public function visualizar($id, $slug)
    {
        $entity = $this->repository->find($id);

        return view('categoria.visualizar', compact('entity'));
    }
}
