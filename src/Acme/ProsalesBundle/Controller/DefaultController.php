<?php

namespace Acme\ProsalesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
//    public function indexAction($name)
//    {
//        return $this->render('AcmeProsalesBundle:Default:index.html.twig', array('name' => $name));
//    }
    public function indexAction()
    {
        return $this->render('AcmeProsalesBundle:Default:index.html.twig');
    }    
}
