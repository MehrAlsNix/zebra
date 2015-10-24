<?php

namespace MehrAlsNix\SymfonyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZebraBundle:Default:index.html.twig', array('name' => "Peter"));
    }
}
