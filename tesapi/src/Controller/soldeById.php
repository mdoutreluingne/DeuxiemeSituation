<?php

namespace App\Controller;


use App\Operation\SoldeByIdHandler;

class soldeById
{
    private $soldeHandler;
    /**
     * SoldeByIdHandler constructor.
     * @param $recupHandler
     */
    public function __construct(SoldeByIdHandler $soldeHandler)
    {
        $this->recupHandler = $soldeHandler;
    }
    public function __invoke($id){
        $entitie = $this->soldeHandler->handle($id);
        return $entitie;
    }
}