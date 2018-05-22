<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * About
 *
 * @ORM\Table(name="about", indexes={@ORM\Index(name="aboutuserid", columns={"aboutuserid"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class About
{
    /**
     * @var string
     *
     * @ORM\Column(name="dept", type="string", length=100, nullable=false)
     */
    private $dept;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datebirth", type="date", nullable=true)
     */
    private $datebirth;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=100, nullable=true)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="maritalstatus", type="string", length=100, nullable=true)
     */
    private $maritalstatus;

    /**
     * @var string
     *
     * @ORM\Column(name="skills", type="text", length=65535, nullable=true)
     */
    private $skills;

    /**
     * @var string
     *
     * @ORM\Column(name="acquiredskills", type="text", length=65535, nullable=true)
     */
    private $acquiredskills;

    /**
     * @var string
     *
     * @ORM\Column(name="profileimage", type="string", length=255, nullable=true)
     */
    private $profileimage;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="imageFile")
     * @var File
     */
    private $imageFile;

    /**
     * @var integer
     *
     * @ORM\Column(name="about_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aboutId;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aboutuserid", referencedColumnName="id", onDelete="cascade")
     * })
     */
    private $aboutuserid;

    /**
     * @return string
     */
    public function getDept()
    {
        return $this->dept;
    }

    /**
     * @param string $dept
     */
    public function setDept($dept)
    {
        $this->dept = $dept;
    }

    /**
     * @return \DateTime
     */
    public function getDatebirth()
    {
        return $this->datebirth;
    }

    /**
     * @param \DateTime $datebirth
     */
    public function setDatebirth($datebirth)
    {
        $this->datebirth = $datebirth;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string
     */
    public function getMaritalstatus()
    {
        return $this->maritalstatus;
    }

    /**
     * @param string $maritalstatus
     */
    public function setMaritalstatus($maritalstatus)
    {
        $this->maritalstatus = $maritalstatus;
    }

    /**
     * @return string
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param string $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    public function setImageFile(File $Profileimage = null)
    {
        $this->imageFile = $Profileimage;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $profileimage
     */
    public function setProfileimage($profileimage)
    {
        $this->profileimage = $profileimage;
    }

    /**
     * @return string
     */
    public function getProfileimage()
    {
        return $this->profileimage;
    }

     /**
     * @return int
     */
    public function getAboutId()
    {
        return $this->aboutId;
    }

    /**
     * @param int $aboutId
     */
    public function setAboutId($aboutId)
    {
        $this->aboutId = $aboutId;
    }

    /**
     * @return User
     */
    public function getAboutuserid()
    {
        return $this->aboutuserid;
    }

    /**
     * @param User $aboutuserid
     */
    public function setAboutuserid($aboutuserid)
    {
        $this->aboutuserid = $aboutuserid;
    }

    /**
     * @return string
     */
    public function getAcquiredskills()
    {
        return $this->acquiredskills;
    }

    /**
     * @param string $acquiredskills
     */
    public function setAcquiredskills($acquiredskills)
    {
        $this->acquiredskills = $acquiredskills;
    }


}

