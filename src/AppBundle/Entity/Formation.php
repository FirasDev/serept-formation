<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation", indexes={@ORM\Index(name="sess_id", columns={"sess_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormRepository");
 */
class Formation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Form_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $formId;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="given_skills", type="string", nullable=true)
     */
    private $givenskills;

    /**
     * @var string
     *
     * @ORM\Column(name="Theme", type="string", length=50, nullable=false)
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="Mainimage", type="string", length=255, nullable=true)
     */
    private $mainimage;

    /**
     * @var \AppBundle\Entity\Session
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Session")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sess_id", referencedColumnName="Session_id", onDelete="cascade")
     * })
     */
    private $sess;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formmanager", referencedColumnName="id", onDelete="cascade")
     * })
     */
    private $formmanager;

    /**
     * @return int
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @param int $formId
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getGivenskills()
    {
        return $this->givenskills;
    }

    /**
     * @param string $givenskills
     */
    public function setGivenskills($givenskills)
    {
        $this->givenskills = $givenskills;
    }



    /**
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param string $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * @return string
     */
    public function getMainimage()
    {
        return $this->mainimage;
    }

    /**
     * @param string $mainimage
     */
    public function setMainimage($mainimage)
    {
        $this->mainimage = $mainimage;

    }

    /**
     * @return Session
     */
    public function getSess()
    {
        return $this->sess;
    }

    /**
     * @param Session $sess
     */
    public function setSess($sess)
    {
        $this->sess = $sess;
    }

    /**
     * @return User
     */
    public function getFormmanager()
    {
        return $this->formmanager;
    }

    /**
     * @param User $formmanager
     */
    public function setFormmanager($formmanager)
    {
        $this->formmanager = $formmanager;
    }


}
