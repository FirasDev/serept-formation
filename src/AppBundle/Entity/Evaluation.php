<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation", indexes={@ORM\Index(name="formid", columns={"formid"})})
 * @ORM\Entity
 */
class Evaluation
{
    /**
     * @var string
     *
     * @ORM\Column(name="question1", type="string", length=255, nullable=false)
     */
    private $question1;

    /**
     * @var string
     *
     * @ORM\Column(name="question2", type="string", length=255, nullable=false)
     */
    private $question2;

    /**
     * @var string
     *
     * @ORM\Column(name="question3", type="string", length=255, nullable=false)
     */
    private $question3;

    /**
     * @var string
     *
     * @ORM\Column(name="question4", type="string", length=255, nullable=false)
     */
    private $question4;

    /**
     * @var string
     *
     * @ORM\Column(name="question5", type="string", length=255, nullable=false)
     */
    private $question5;

    /**
     * @var integer
     *
     * @ORM\Column(name="Eval_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $evalId;

    /**
     * @var \AppBundle\Entity\Formation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formid", referencedColumnName="Form_id", onDelete="cascade")
     * })
     */
    private $formid;

    /**
     * @return string
     */
    public function getQuestion1()
    {
        return $this->question1;
    }

    /**
     * @param string $question1
     */
    public function setQuestion1($question1)
    {
        $this->question1 = $question1;
    }

    /**
     * @return string
     */
    public function getQuestion2()
    {
        return $this->question2;
    }

    /**
     * @param string $question2
     */
    public function setQuestion2($question2)
    {
        $this->question2 = $question2;
    }

    /**
     * @return string
     */
    public function getQuestion3()
    {
        return $this->question3;
    }

    /**
     * @param string $question3
     */
    public function setQuestion3($question3)
    {
        $this->question3 = $question3;
    }

    /**
     * @return string
     */
    public function getQuestion4()
    {
        return $this->question4;
    }

    /**
     * @param string $question4
     */
    public function setQuestion4($question4)
    {
        $this->question4 = $question4;
    }

    /**
     * @return string
     */
    public function getQuestion5()
    {
        return $this->question5;
    }

    /**
     * @param string $question5
     */
    public function setQuestion5($question5)
    {
        $this->question5 = $question5;
    }

    /**
     * @return int
     */
    public function getEvalId()
    {
        return $this->evalId;
    }

    /**
     * @param int $evalId
     */
    public function setEvalId($evalId)
    {
        $this->evalId = $evalId;
    }

    /**
     * @return Formation
     */
    public function getFormid()
    {
        return $this->formid;
    }

    /**
     * @param Formation $formid
     */
    public function setFormid($formid)
    {
        $this->formid = $formid;
    }


}

