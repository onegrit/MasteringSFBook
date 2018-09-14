<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/about/{name}",name="aboutPage")
     */
    public function aboutAction($name)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(['name'=>$name]);
        if (false === $user instanceof User){
            throw $this->createNotFoundException(sprintf('No user named '.$name.' found'));
        }


        return $this->render('about/index.html.twig',[
            'user'  =>  $user
        ]);
    }
}
