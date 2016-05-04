<?php

namespace Starter\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StarterCategoryBundle:Default:index.html.twig');
    }
}
