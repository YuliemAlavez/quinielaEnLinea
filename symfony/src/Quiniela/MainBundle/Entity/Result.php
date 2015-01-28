<?php

namespace Quiniela\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Result
 *
 * @ORM\Table(name="result", indexes={@ORM\Index(name="fk_Result_Prediction1_idx", columns={"prediction"})})
 * @ORM\Entity
 */
class Result
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idResult", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idresult;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="extrapoints", type="integer", nullable=false)
     */
    private $extrapoints = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="totalPoints", type="integer", nullable=false)
     */
    private $totalpoints;

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
     * @var \Prediction
     *
     * @ORM\ManyToOne(targetEntity="Prediction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prediction", referencedColumnName="idPrediction")
     * })
     */
    private $prediction;



    /**
     * Get idresult
     *
     * @return integer 
     */
    public function getIdresult()
    {
        return $this->idresult;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Result
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set extrapoints
     *
     * @param integer $extrapoints
     * @return Result
     */
    public function setExtrapoints($extrapoints)
    {
        $this->extrapoints = $extrapoints;

        return $this;
    }

    /**
     * Get extrapoints
     *
     * @return integer 
     */
    public function getExtrapoints()
    {
        return $this->extrapoints;
    }

    /**
     * Set totalpoints
     *
     * @param integer $totalpoints
     * @return Result
     */
    public function setTotalpoints($totalpoints)
    {
        $this->totalpoints = $totalpoints;

        return $this;
    }

    /**
     * Get totalpoints
     *
     * @return integer 
     */
    public function getTotalpoints()
    {
        return $this->totalpoints;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Result
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
     * @return Result
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
     * Set prediction
     *
     * @param \Quiniela\MainBundle\Entity\Prediction $prediction
     * @return Result
     */
    public function setPrediction(\Quiniela\MainBundle\Entity\Prediction $prediction = null)
    {
        $this->prediction = $prediction;

        return $this;
    }

    /**
     * Get prediction
     *
     * @return \Quiniela\MainBundle\Entity\Prediction 
     */
    public function getPrediction()
    {
        return $this->prediction;
    }
}
