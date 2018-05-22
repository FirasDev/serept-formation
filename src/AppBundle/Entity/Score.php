<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Score
 *
 * @ORM\Table(name="score", indexes={@ORM\Index(name="formid_score", columns={"formid_score"}),@ORM\Index(name="user_id_score", columns={"user_id_score"})})
 * @ORM\Entity
 */
class Score
{
    /**
     * @var integer
     *
     * @ORM\Column(name="score_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $scoreId;

    /**
     * @var integer
     * @ORM\Column(name="pts", type="integer", nullable=true)
     */
    private $pts;

    /**
     * @var \AppBundle\Entity\Formation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formid_score", referencedColumnName="Form_id", onDelete="cascade")
     * })
     */
    private $formidScore;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id_score", referencedColumnName="id", onDelete="cascade")
     * })
     */
    private $userScore;

    /**
     * @return int
     */
    public function getScoreId()
    {
        return $this->scoreId;
    }

    /**
     * @param int $scoreId
     */
    public function setScoreId($scoreId)
    {
        $this->scoreId = $scoreId;
    }



    /**
     * Set pts
     *
     * @param integer $pts
     *
     * @return Score
     */
    public function setPts($pts)
    {
        $this->pts = $pts;

        return $this;
    }

    /**
     * Get pts
     *
     * @return integer
     */
    public function getPts()
    {
        return $this->pts;
    }

    /**
     * @param User $formidScore
     */
    public function setFormidScore($formidScore)
    {
        $this->formidScore = $formidScore;

    }

    /**
     * @return Formation
     */
    public function getFormidScore()
    {
        return $this->formidScore;
    }

    /**
     * @param User $userScore
     */
    public function setUserScore($userScore)
    {
        $this->userScore = $userScore;

    }

    /**
     * @return User
     */
    public function getUserScore()
    {
        return $this->userScore;
    }
}

