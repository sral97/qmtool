<?php

namespace App\Controller;

use App\Entity\ApplicationSettings;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function getBranding()
    {
        $em = $this->getDoctrine()->getManager();
        $templateOptions = [];
        /** @var ApplicationSettings $branding */
        $branding = $em->getRepository('App:ApplicationSettings')->findOneBy(['settingsKey' => 'branding']);
        if ($branding) {
            $templateOptions['branding'] = $branding->getSettingsValue();
        }

        return $this->render('default/branding.html.twig', $templateOptions);
    }
}
