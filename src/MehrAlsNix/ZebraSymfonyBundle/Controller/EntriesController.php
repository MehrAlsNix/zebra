<?php

namespace MehrAlsNix\ZebraSymfonyBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use MehrAlsNix\ZebraSymfonyBundle\Entity\Entry;

class EntriesController extends FOSRestController
{
    public function getEntriesAction()
    {
        $doctrine = $this->getDoctrine();
        $entries = $doctrine->getRepository('MehrAlsNix\ZebraSymfonyBundle\Entity\Entry')->findAll();

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
        $entry = $doctrine->getRepository('MehrAlsNix\ZebraSymfonyBundle\Entity\Entry')->find($id);

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
        $entry = new Entry();
        $entry->setName($name);
        $entry->setDescription($description);
        $doctrine->getManager()->persist($entry);
        $doctrine->getManager()->flush();

        return $this->redirectToRoute('get_entries');
    }
}
