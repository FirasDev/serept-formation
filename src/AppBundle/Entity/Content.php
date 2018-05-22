<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table(name="content", indexes={@ORM\Index(name="form_id", columns={"form_id"})})
 * @ORM\Entity
 */
class Content
{
    /**
     * @var integer
     *
     * @ORM\Column(name="content_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="page_nb", type="integer", nullable=false)
     */
    private $pageNb = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="img_t", type="string", length=255, nullable=true)
     */
    private $imgT;

    /**
     * @var string
     *
     * @ORM\Column(name="text_t", type="text", nullable=true)
     */
    private $textT;

    /**
     * @var \AppBundle\Entity\Formation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="form_id", referencedColumnName="Form_id", onDelete="cascade")
     * })
     */
    private $form;

    /**
     * @return int
     */
    public function getContentId()
    {
        return $this->contentId;
    }

    /**
     * @param int $contentId
     */
    public function setContentId($contentId)
    {
        $this->contentId = $contentId;
    }

    /**
     * @return int
     */
    public function getPageNb()
    {
        return $this->pageNb;
    }

    /**
     * @param int $pageNb
     */
    public function setPageNb($pageNb)
    {
        $this->pageNb = $pageNb;
    }

    /**
     * @return string
     */
    public function getImgT()
    {
        return $this->imgT;
    }

    /**
     * @param string $imgT
     */
    public function setImgT($imgT)
    {
        $this->imgT = $imgT;
    }

    /**
     * @return string
     */
    public function getTextT()
    {
        return $this->textT;
    }

    /**
     * @param string $textT
     */
    public function setTextT($textT)
    {
        $this->textT = $textT;
    }

    /**
     * @return Formation
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param Formation $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }


}
