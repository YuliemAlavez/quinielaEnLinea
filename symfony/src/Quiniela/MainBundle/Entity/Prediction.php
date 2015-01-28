<?php

namespace Quiniela\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prediction
 *
 * @ORM\Table(name="prediction", indexes={@ORM\Index(name="fk_Prediction_Game1_idx", columns={"game"}), @ORM\Index(name="fk_Prediction_User1_idx", columns={"user"})})
 * @ORM\Entity
 */
class Prediction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPrediction", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprediction;

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
     * @var \DateTime
     *
     * @ORM\Column(name="predictionAt", type="datetime", nullable=false)
     */
    private $predictionat;

    /**
     * @var \Game
     *
     * @ORM\ManyToOne(targetEntity="Game")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="game", referencedColumnName="idGame")
     * })
     */
    private $game;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="idUser")
     * })
     */
    private $user;



    /**
     * Get idprediction
     *
     * @return integer 
     */
    public function getIdprediction()
    {
        return $this->idprediction;
    }

    /**
     * Set scorelocalteam
     *
     * @param integer $scorelocalteam
     * @return Prediction
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
     * @return Prediction
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
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Prediction
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
     * @return Prediction
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
     * Set predictionat
     *
     * @param \DateTime $predictionat
     * @return Prediction
     */
    public function setPredictionat($predictionat)
    {
        $this->predictionat = $predictionat;

        return $this;
    }

    /**
     * Get predictionat
     *
     * @return \DateTime 
     */
    public function getPredictionat()
    {
        return $this->predictionat;
    }

    /**
     * Set game
     *
     * @param \Quiniela\MainBundle\Entity\Game $game
     * @return Prediction
     */
    public function setGame(\Quiniela\MainBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \Quiniela\MainBundle\Entity\Game 
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set user
     *
     * @param \Quiniela\MainBundle\Entity\User $user
     * @return Prediction
     */
    public function setUser(\Quiniela\MainBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Quiniela\MainBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
