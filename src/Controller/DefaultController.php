<?php

namespace App\Controller;

use App\Repository\ArticleCarousselRepository;
use App\Repository\HoraireRepository;
use App\Repository\MetRepository;
use App\Repository\PartenaireRepository;
use App\Repository\CoursRepository;
use App\Repository\MenuInspirationRepository;
use App\Repository\EvasionEtTerroirRepository;
use App\Repository\VinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;
use Psr\Log\LoggerInterface;




class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(ArticleCarousselRepository $acr, HoraireRepository $hr, MetRepository $metRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'articles' => $acr->findBy([], ['id' => 'DESC']),
            'horaires' => $hr->findAll(),
            'menuItem' => 'index',
            'mets' => $metRepository->findBy(['enabled' => true])
        ]);
    }

    #[Route('/cave', name: 'app_cave')]
    public function cave(VinRepository $vr): Response
    {
        return $this->render('default/cave.html.twig', [
            'vins'=>$vr->findAll(),
            'menuItem' => ''

        ]);
    }
    #[Route('/cours', name: 'app_cours')]
    public function cours(CoursRepository $cr): Response
    {
        return $this->render('default/cours.html.twig', [
            'menuItem' => '',
            'cours' => $cr->findAll()
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(MailerInterface $mailer, Request $request,ArticleCarousselRepository $acr, HoraireRepository $hr, PartenaireRepository $pr): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        //echo $pr->findAll()[0]->getNom();

        if ($form->isSubmitted() && $form->isValid()) {
            // Obtenir les données soumises via le formulaire à partir de l'objet de formulaire
            $formData = $form->getData();
            $nom = $formData['name'];
            $email = $formData['email'];
            $message = $formData['message'];

            // Envoyer l'e-mail
            $to = 'restaurantdesplantes@gmail.com';

            $emailToSend = (new Email())
                ->from('contact@restaurantdesplantes.com')
                ->to($to)
                ->replyTo($email)
                ->subject('Email de contact sur le site de '.$nom)
                ->text($message)
                ->html($message);

            $mailer->send($emailToSend);

            $emailToSend2 = (new Email())
                ->from('contact@restaurantdesplantes.com')
                ->to('paultallonp318@gmail.com')
                ->replyTo($email)
                ->subject('Email de contact sur le site de '.$nom)
                ->text($message)
                ->html($message);

            $mailer->send($emailToSend2);

            //var_dump($emailToSend2);

            return $this->render('default/contact.html.twig', [
                'form' => $form->createView(),
                'menuItem' => '',
                'partenaires'=>$pr->findAll(),
                'sended'=> true
            ]);
        }

        return $this->render('default/contact.html.twig', [
            'form' => $form->createView(),
            'menuItem' => '',
            'partenaires'=>$pr->findAll(),
            'sended'=> false
        ]);
    }
}
