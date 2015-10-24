<?php

namespace MehrAlsNix\SymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MehrAlsNix\SymfonyBundle\Entity\MediaRepository")
 */
class Media
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetimetz")
     */
    private $datetime;

    /**
     * @var Entry
     *
     * @ORM\ManyToOne(targetEntity="MehrAlsNix\SymfonyBundle\Entity\Entry", inversedBy="media")
     * @ORM\JoinColumn(name="entry_id", referencedColumnName="id")
     */
    private $entry;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Media
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Media
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
}

