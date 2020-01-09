<?php


namespace App\Controller;
use App\Entity\Avis;
use App\Operation\RecupVilleHandler;

class RecupVilleBySalle
{
    private $recupHandler;
    /**
     * RecupTauxSatisfactionByTheme constructor.
     * @param $recupHandler
     */
    public function __construct(RecupVilleHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($salle){
        $entitie = $this->recupHandler->handle($salle);
        return $entitie;
    }
}