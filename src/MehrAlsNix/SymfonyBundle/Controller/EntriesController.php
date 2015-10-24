<?php

namespace MehrAlsNix\SymfonyBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EntriesController extends FOSRestController
{
    public function getEntriesAction()
    {
        $doctrine = $this->getDoctrine();
        $entries = $doctrine->getRepository('MehrAlsNix\SymfonyBundle\Entity\Entry')->findAll();

        $view = $this->view($entries, 200)
            ->setTemplate("ZebraBundle:Entries:list.html.twig")
            ->setTemplateVar('entries')
            ->setFormat('json')
        ;

        return $this->handleView($view);
    }

    public function getEntryAction($id)
    {
        $doctrine = $this->getDoctrine();
        $entry = $doctrine->getRepository('MehrAlsNix\SymfonyBundle\Entity\Entry')->find($id);

        $view = $this->view($entry, 200)
            ->setTemplate("ZebraBundle:Entries:entry.html.twig")
            ->setTemplateVar('entries')
            ->setFormat('json')
            ->setData($entry)
        ;

        return $this->handleView($view);
    }

    public function postEntryAction()
    {

        $request = $this->getRequest();
        $name = $request->get('name');
        $description = $request->get('description');

        $doctrine = $this->getDoctrine();
        $entry = new \MehrAlsNix\SymfonyBundle\Entity\Entry();
        $entry->setName($name);
        $entry->setDescription($description);
        $doctrine->getManager()->persist($entry);
        $doctrine->getManager()->flush();

        return $this->redirectToRoute('get_entries');
    }
}
