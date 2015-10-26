<?php

namespace MehrAlsNix\ZebraSymfonyBundle\Controller;

use Exception;
use FOS\RestBundle\Controller\FOSRestController;
use MehrAlsNix\ZebraSymfonyBundle\Entity\Entry;
use MehrAlsNix\ZebraSymfonyBundle\TimeLineService;

class EntriesController extends FOSRestController
{
    public function getEntriesAction()
    {
        $entries = $this->getTimeLineService()->getEntries();
        $view = $this->view($entries, 200)
            ->setTemplate("ZebraBundle:Entries:list.html.twig")
            ->setTemplateVar('entries')
            ->setFormat('json')
        ;

        return $this->handleView($view);
    }

    public function getEntryAction($id)
    {
        $entry = $this->getTimeLineService()->getEntryById($id);

        $view = $this->view($entry, 200)
            ->setTemplate("ZebraBundle:Entries:entry.html.twig")
            ->setTemplateVar('entries')
            ->setFormat('json')
            ->setData($entry)
        ;

        return $this->handleView($view);
    }

    /**
     * 
     * @return type
     * @throws Exception
     */
    public function postEntryAction()
    {

        $request = $this->getRequest();
        $name = $request->get('name');
        $description = $request->get('description');

        if (empty($name) || empty($description)) {
            throw new Exception('insufficant data !');
        }
        
        $entry = $this->getTimeLineService()->createNewEntry($name, $description);

        return $this->redirectToRoute('get_entry', ['id' => $entry->getId()]);
    }
    
    /**
     * 
     * @return TimeLineService
     */
    private function getTimeLineService()
    {
        return $this->get('zebra.timelineService');
    }
}
