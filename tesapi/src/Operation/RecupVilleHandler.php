<?php


namespace App\Operation;

use Doctrine\Persistence\ManagerRegistry;

class RecupVilleHandler
{
    protected $em;
    /**
     * RecupAvisHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($salle){
        $thesalle = $this->em->getRepository('App:Salle')->findOneByNom($salle);
        $thesalle = $this->em->getRepository('App:Salle')->findOneBytheme($thetheme);
        return $this->em->getRepository('App:Avis')->findTauxSatisfactionByTheme($thesalle);
    }
}