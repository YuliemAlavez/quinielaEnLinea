<?php

namespace Quiniela\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Season
 *
 * @ORM\Table(name="season")
 * @ORM\Entity
 */
class Season
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSeason", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idseason;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="seasonAtBegin", type="datetime", nullable=false)
     */
    private $seasonatbegin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="seasonAtEnd", type="datetime", nullable=false)
     */
    private $seasonatend;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    private $updatedat;



    /**
     * Get idseason
     *
     * @return integer 
     */
    public function getIdseason()
    {
        return $this->idseason;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Season
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set seasonatbegin
     *
     * @param \DateTime $seasonatbegin
     * @return Season
     */
    public function setSeasonatbegin($seasonatbegin)
    {
        $this->seasonatbegin = $seasonatbegin;

        return $this;
    }

    /**
     * Get seasonatbegin
     *
     * @return \DateTime 
     */
    public function getSeasonatbegin()
    {
        return $this->seasonatbegin;
    }

    /**
     * Set seasonatend
     *
     * @param \DateTime $seasonatend
     * @return Season
     */
    public function setSeasonatend($seasonatend)
    {
        $this->seasonatend = $seasonatend;

        return $this;
    }

    /**
     * Get seasonatend
     *
     * @return \DateTime 
     */
    public function getSeasonatend()
    {
        return $this->seasonatend;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Season
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set updatedat
     *
     * @param \DateTime $updatedat
     * @return Season
     */
    public function setUpdatedat($updatedat)
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    /**
     * Get updatedat
     *
     * @return \DateTime 
     */
    public function getUpdatedat()
    {
        return $this->updatedat;
    }
}
