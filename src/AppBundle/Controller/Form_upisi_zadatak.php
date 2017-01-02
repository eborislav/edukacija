<?php
/**
 * Created by PhpStorm.
 * User: dot
 * Date: 2.1.2017.
 * Time: 13.31
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Form_upisi_zad;
use AppBundle\Entity\Zadaci;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class Form_upisi_zadatak extends Controller
{
    /**
     * @Route("/upisi_zadatak")
     */
    public function newAction(Request $request)
    {
        // just setup a fresh $task object (remove the dummy data)
        $task = new Form_upisi_zad();

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
       //     ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            $zadatak = $form["task"]->getData();
            $em = $this->getDoctrine()->getManager();

            $post = new Zadaci();
            $post->setTitle($zadatak);
            $em->persist($post);
            $em->flush();
            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('send@example.com')
                ->setTo('eborislav@gmail.com')
                ->setBody('body')


                /*
                 * If you also want to include a plaintext version of the message
                ->addPart(
                    $this->renderView(
                        'Emails/registration.txt.twig',
                        array('name' => $name)
                    ),
                    'text/plain'
                )
                */
            ;
            $this->get('mailer')->send($message);
            return $this->redirectToRoute('postojeci');
        }

        return $this->render('default/new.html.twig', [
            'movieForm' => $form->createView()
        ]);
    }
}