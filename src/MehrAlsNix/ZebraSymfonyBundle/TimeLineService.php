<?php

namespace MehrAlsNix\ZebraSymfonyBundle;

use MehrAlsNix\ZebraSymfonyBundle\Entity\Entry;

/**
 * Description of TimeLineService
 *
 * @author mattias <mattiasmeiner@gmail.com>
 */
class TimeLineService 
{

    private $doctrine;

    /**
     * 
     * @param Doctrine $doctrine
     */
    public function __construct($doctrine) {
        $this->doctrine = $doctrine;
    }
    
    /**
     * 
     * @return Entry[]
     */
    public function getEntries()
    {
        return $this->doctrine->getRepository('MehrAlsNix\ZebraSymfonyBundle\Entity\Entry')->findAll();
    }
    
    /**
     * 
     * @param integer $id
     * @return Entry
     */
    public function getEntryById($id)
    {
        return $this->doctrine->getRepository('MehrAlsNix\ZebraSymfonyBundle\Entity\Entry')->find($id);
    }

    /**
     * @param string $name
     * @param string $description
     * @return Entry
     */
    public function createNewEntry($name, $description)
    {
        
        $entry = new Entry();
        $entry->setName($name);
        $entry->setDescription($description);
        $entry->setDatetime(new \DateTime());
        $this->doctrine->getManager()->persist($entry);
        $this->doctrine->getManager()->flush();
        
        return $entry;
    }
}
