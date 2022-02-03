<?php

namespace App\Controller;

use App\Repository\SerieRepository;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/api/v1/serie", name="serie", methods={"GET"})
     */
    public function index(SerieRepository $repo, SerializerInterface $serializer): Response
    {
        $series = $repo->findAll();
        $json = $serializer->serialize($series, 'json');
        $rep = new JsonResponse();
        $rep->setContent($json);
        return $rep;
    }

    /** @Route("/api/v1/serie/{id}", name="serie_detail", methods={"GET"}, requirements={"id":"\d+"}) */
    public function detail($id, SerieRepository $repo, SerializerInterface $serializer) {
        $serie = $repo->find($id);
        $json = $serializer->serialize($serie, 'json');
        $reponse = new JsonResponse();
        $reponse->setContent($json);
        return$reponse;
    }
}
