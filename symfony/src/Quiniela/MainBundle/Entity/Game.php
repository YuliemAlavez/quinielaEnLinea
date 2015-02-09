<?php

namespace Quiniela\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game", indexes={@ORM\Index(name="fk_Game_Team_idx", columns={"localTeam"}), @ORM\Index(name="fk_Game_Team1_idx", columns={"visitingTeam"}), @ORM\Index(name="fk_Game_Season1_idx", columns={"season"})})
 * @ORM\Entity
 */
class Game
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idGame", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgame;

    /**
     * @var integer
     *
     * @ORM\Column(name="scoreLocalTeam", type="integer", nullable=false)
     */
    private $scorelocalteam = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="scoreVisitingTeam", type="integer", nullable=false)
     */
    private $scorevisitingteam = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gameAt", type="datetime", nullable=false)
     */
    private $gameat;

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
     * @var \Season
     *
     * @ORM\ManyToOne(targetEntity="Season")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="season", referencedColumnName="idSeason")
     * })
     */
    private $season;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="localTeam", referencedColumnName="idTeam")
     * })
     */
    private $localteam;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitingTeam", referencedColumnName="idTeam")
     * })
     */
    private $visitingteam;



    /**
     * Get idgame
     *
     * @return integer 
     */
    public function getIdgame()
    {
        return $this->idgame;
    }

    /**
     * Set scorelocalteam
     *
     * @param integer $scorelocalteam
     * @return Game
     */
    public function setScorelocalteam($scorelocalteam)
    {
        $this->scorelocalteam = $scorelocalteam;

        return $this;
    }

    /**
     * Get scorelocalteam
     *
     * @return integer 
     */
    public function getScorelocalteam()
    {
        return $this->scorelocalteam;
    }

    /**
     * Set scorevisitingteam
     *
     * @param integer $scorevisitingteam
     * @return Game
     */
    public function setScorevisitingteam($scorevisitingteam)
    {
        $this->scorevisitingteam = $scorevisitingteam;

        return $this;
    }

    /**
     * Get scorevisitingteam
     *
     * @return integer 
     */
    public function getScorevisitingteam()
    {
        return $this->scorevisitingteam;
    }

    /**
     * Set gameat
     *
     * @param \DateTime $gameat
     * @return Game
     */
    public function setGameat($gameat)
    {
        $this->gameat = $gameat;

        return $this;
    }

    /**
     * Get gameat
     *
     * @return \DateTime 
     */
    public function getGameat()
    {
        return $this->gameat;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Game
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
     * @return Game
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

    /**
     * Set season
     *
     * @param \Quiniela\MainBundle\Entity\Season $season
     * @return Game
     */
    public function setSeason(\Quiniela\MainBundle\Entity\Season $season = null)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return \Quiniela\MainBundle\Entity\Season 
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set localteam
     *
     * @param \Quiniela\MainBundle\Entity\Team $localteam
     * @return Game
     */
    public function setLocalteam(\Quiniela\MainBundle\Entity\Team $localteam = null)
    {
        $this->localteam = $localteam;

        return $this;
    }

    /**
     * Get localteam
     *
     * @return \Quiniela\MainBundle\Entity\Team 
     */
    public function getLocalteam()
    {
        return $this->localteam;
    }

    /**
     * Set visitingteam
     *
     * @param \Quiniela\MainBundle\Entity\Team $visitingteam
     * @return Game
     */
    public function setVisitingteam(\Quiniela\MainBundle\Entity\Team $visitingteam = null)
    {
        $this->visitingteam = $visitingteam;

        return $this;
    }

    /**
     * Get visitingteam
     *
     * @return \Quiniela\MainBundle\Entity\Team 
     */
    public function getVisitingteam()
    {
        return $this->visitingteam;
    }

    public function __toString(){
        return $this->localteam->getName().' vs '.$this->visitingteam->getName();
        
    }

    public function __construct(){
        $this->createdat=$this->updatedat=$this->gameat= new \DateTime();        
    }


}
