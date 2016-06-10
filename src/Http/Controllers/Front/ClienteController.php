<?php

namespace BetaGT\Marketplace\Http\Controllers\Front;

use BetaGT\Master\Http\Controllers\Controller;
use BetaGT\Master\Repositories\UsuarioRepository;

class ClienteController extends Controller
{
    /**
     * @var UsuarioRepository
     */
    private $repository;

    /**
     * ClienteController constructor.
     */
    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->repository->scopeQuery(function($query){
            return $query->orderBy('nome', 'ASC');
        })->paginate();

        return view('cliente.index', compact('list'));
    }

    public function visualizar($id, $slug)
    {
        $entity = $this->repository->find($id);

        return view('cliente.visualizar', compact('entity'));
    }
}
