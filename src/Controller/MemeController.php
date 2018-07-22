<?php
namespace App\Controller;

use App\Entity\Mem;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MemeController extends AbstractController
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $mems = $em->getRepository(Mem::class)->findAll();

        return $this->render('meme/index.html.twig', array(
            'mems' => $mems
        ));
    }
}