<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="questions", indexes={@ORM\Index(name="question_form_id", columns={"formid"})})
 * @ORM\Entity
 */
class Questions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="quest_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $questId;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text", length=65535, nullable=false)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="rep1", type="text", length=65535, nullable=false)
     */
    private $rep1;

    /**
     * @var string
     *
     * @ORM\Column(name="rep2", type="text", length=65535, nullable=false)
     */
    private $rep2;

    /**
     * @var string
     *
     * @ORM\Column(name="rep3", type="text", length=65535, nullable=false)
     */
    private $rep3;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", length=16777215, nullable=false)
     */
    private $answer;

    /**
     * @var integer
     * @ORM\Column(name="pagenumber", type="integer", nullable=false)
     */
    private $pagenumber;

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
     * @return int
     */
    public function getQuestId()
    {
        return $this->questId;
    }

    /**
     * @param int $questId
     */
    public function setQuestId($questId)
    {
        $this->questId = $questId;
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getRep1()
    {
        return $this->rep1;
    }

    /**
     * @param string $rep1
     */
    public function setRep1($rep1)
    {
        $this->rep1 = $rep1;
    }

    /**
     * @return string
     */
    public function getRep2()
    {
        return $this->rep2;
    }

    /**
     * @param string $rep2
     */
    public function setRep2($rep2)
    {
        $this->rep2 = $rep2;
    }

    /**
     * @return string
     */
    public function getRep3()
    {
        return $this->rep3;
    }

    /**
     * @param string $rep3
     */
    public function setRep3($rep3)
    {
        $this->rep3 = $rep3;
    }

    /**
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }



    /**
     * @param Formation $formid
     */
    public function setformid($formid)
    {
        $this->formid = $formid;
    }

    /**
     * @return Formation $Form_Id
     */
    public function getformid()
    {
        return $this->formid;
    }

    /**
     * @param int $pagenumber
     */
    public function setPagenumber($pagenumber)
    {
        $this->pagenumber = $pagenumber;

    }

    /**
     * Get pagenumber
     *
     * @return integer
     */
    public function getPagenumber()
    {
        return $this->pagenumber;
    }


}
