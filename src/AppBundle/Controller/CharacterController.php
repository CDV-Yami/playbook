<?php

namespace Yami\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CharacterController extends Controller
{
    /**
     * @Route("/characters", name="characters")
     */
    public function indexAction()
    {
        $characters = $this->getDoctrine()
            ->getManager()
            ->getRepository('Yami\AppBundle\Entity\Character')
            ->findAll()
        ;

        return $this->render('AppBundle:character:index.html.twig', ['characters' => $characters]);
    }

    /**
     * @Route("/characters/{name}", name="characters_show")
     */
    public function showAction($name)
    {
        $character = $this->getDoctrine()
            ->getManager()
            ->getRepository('Yami\AppBundle\Entity\Character')
            ->findOneWithMoves($name)
        ;

        return $this->render('AppBundle:character:show.html.twig', ['character' => $character]);
    }
}
