<?php
/**
 * Created by PhpStorm.
 * User: dot
 * Date: 1.1.2017.
 * Time: 09.42
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Zadaci;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PostojeciZadController extends Controller
{
    /**
     * @Route("/postojeci_zadaci", name ="postojeci")
     */

    public function listAction()
    {

        $posts = $this->getDoctrine()->getRepository('AppBundle:Zadaci')->findAll();
        // $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->find(1);
       // $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')-> findOneBy([ 'id' => 1]);
        // $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')-> findOneBy([ 'id' => [1.2] ]);
        dump ($posts);

        return $this->render('default/index.html.twig', ['posts' => $posts

        ]);

         }

}