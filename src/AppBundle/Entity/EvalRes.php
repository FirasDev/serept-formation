<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvalRes
 *
 * @ORM\Table(name="eval_res", indexes={@ORM\Index(name="id_eval_user", columns={"id_eval_user"}), @ORM\Index(name="eval_id_eval", columns={"eval_id_eval"})})
 * @ORM\Entity
 */
class EvalRes
{
    /**
     * @var string
     *
     * @ORM\Column(name="rep1", type="string")
     */
    private $rep1;

    /**
     * @var string
     *
     * @ORM\Column(name="rep2", type="string")
     */
    private $rep2;

    /**
     * @var string
     *
     * @ORM\Column(name="rep3", type="string")
     */
    private $rep3;

    /**
     * @var string
     *
     * @ORM\Column(name="rep4", type="string")
     */
    private $rep4;

    /**
     * @var string
     *
     * @ORM\Column(name="rep5", type="string")
     */
    private $rep5;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_eval_res", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvalRes;

    /**
     * @var \AppBundle\Entity\Evaluation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evaluation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="eval_id_eval", referencedColumnName="Eval_id", onDelete="cascade")
     * })
     */
    private $evalEval;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_eval_user", referencedColumnName="id", onDelete="cascade")
     * })
     */
    private $idEvalUser;

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
    public function getRep4()
    {
        return $this->rep4;
    }

    /**
     * @param string $rep4
     */
    public function setRep4($rep4)
    {
        $this->rep4 = $rep4;
    }

    /**
     * @return string
     */
    public function getRep5()
    {
        return $this->rep5;
    }

    /**
     * @param string $rep5
     */
    public function setRep5($rep5)
    {
        $this->rep5 = $rep5;
    }



    /**
     * @return int
     */
    public function getIdEvalRes()
    {
        return $this->idEvalRes;
    }

    /**
     * @param int $idEvalRes
     */
    public function setIdEvalRes($idEvalRes)
    {
        $this->idEvalRes = $idEvalRes;
    }

    /**
     * @return Evaluation
     */
    public function getEvalEval()
    {
        return $this->evalEval;
    }

    /**
     * @param Evaluation $evalEval
     */
    public function setEvalEval($evalEval)
    {
        $this->evalEval = $evalEval;
    }

    /**
     * @return User
     */
    public function getIdEvalUser()
    {
        return $this->idEvalUser;
    }

    /**
     * @param User $idEvalUser
     */
    public function setIdEvalUser($idEvalUser)
    {
        $this->idEvalUser = $idEvalUser;
    }


}

