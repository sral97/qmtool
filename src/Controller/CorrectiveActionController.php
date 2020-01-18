<?php

namespace App\Controller;

use App\Entity\CorrectiveAction;
use App\Entity\Incident;
use App\Form\Type\CorrectiveActionType;
use App\Repository\CorrectiveActionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/correctiveAction")
 */
class CorrectiveActionController extends AbstractController
{
    /**
     * @Route("/", name="corrective_action_index", methods={"GET"})
     */
    public function index(CorrectiveActionRepository $correctiveActionRepository): Response
    {
        return $this->render('corrective_action/index.html.twig', [
            'corrective_actions' => $correctiveActionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{incident}", name="corrective_action_new", methods={"GET","POST"})
     */
    public function new(Incident $incident, Request $request): Response
    {
        $correctiveAction = new CorrectiveAction();
        $correctiveAction->setIncident($incident);
        $form = $this->createForm(CorrectiveActionType::class, $correctiveAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($correctiveAction);
            $entityManager->flush();

            return $this->redirectToRoute('incident_show', ['id' => $incident->getId()]);
        }

        return $this->render('corrective_action/new.html.twig', [
            'corrective_action' => $correctiveAction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="corrective_action_show", methods={"GET"})
     */
    public function show(CorrectiveAction $correctiveAction): Response
    {
        return $this->render('corrective_action/show.html.twig', [
            'corrective_action' => $correctiveAction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="corrective_action_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CorrectiveAction $correctiveAction): Response
    {
        $form = $this->createForm(CorrectiveActionType::class, $correctiveAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('incident_show', ['id' => $correctiveAction->getIncident()->getId()]);
        }

        return $this->render('corrective_action/edit.html.twig', [
            'corrective_action' => $correctiveAction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="corrective_action_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CorrectiveAction $correctiveAction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$correctiveAction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($correctiveAction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('corrective_action_index');
    }
}
