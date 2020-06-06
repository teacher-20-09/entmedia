<?php

namespace App\Controller;

use App\Entity\Directions;
use App\Entity\Leaders;
use App\Entity\Process;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/api/leaders", name="get_leders")
     */
    public function getLeaders()
    {
        $leaderCard = $this->getDoctrine()->getRepository(Leaders::class)->findAll();

        return $this->json($leaderCard);
    }

    /**
     * @Route("/api/directions", name="get_direct")
     */
    public function getDirections()
    {
        $directCard = $this->getDoctrine()->getRepository(Directions::class)->findAll();

        return $this->json($directCard);
    }

    /**
     * @Route("/api/processes", name="get_processes")
     */
    public function getProcess()
    {
        $processCard = $this->getDoctrine()->getRepository(Process::class)->findAll();

        return $this->json($processCard);
    }
}