<?php

namespace Acme\ProsalesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actions
 */
class Actions
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sujet;

    /**
     * @var string
     */
    private $a;

    /**
     * @var string
     */
    private $cc;

    /**
     * @var string
     */
    private $cci;

    /**
     * @var boolean
     */
    private $pj;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Acme\ProsalesBundle\Entity\Typesaction
     */
    private $typeaction;

    /**
     * @var \Acme\ProsalesBundle\Entity\Referents
     */
    private $referent;

    /**
     * @var \Acme\ProsalesBundle\Entity\Organisations
     */
    private $organisation;

    /**
     * @var \Acme\ProsalesBundle\Entity\Contacts
     */
    private $contact;

    /**
     * @var \Acme\ProsalesBundle\Entity\Piecesjointes
     */
    private $piecejointe;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     * @return Actions
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set a
     *
     * @param string $a
     * @return Actions
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return string 
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Set cc
     *
     * @param string $cc
     * @return Actions
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Get cc
     *
     * @return string 
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Set cci
     *
     * @param string $cci
     * @return Actions
     */
    public function setCci($cci)
    {
        $this->cci = $cci;

        return $this;
    }

    /**
     * Get cci
     *
     * @return string 
     */
    public function getCci()
    {
        return $this->cci;
    }

    /**
     * Set pj
     *
     * @param boolean $pj
     * @return Actions
     */
    public function setPj($pj)
    {
        $this->pj = $pj;

        return $this;
    }

    /**
     * Get pj
     *
     * @return boolean 
     */
    public function getPj()
    {
        return $this->pj;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Actions
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Actions
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Actions
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set typeaction
     *
     * @param \Acme\ProsalesBundle\Entity\Typesaction $typeaction
     * @return Actions
     */
    public function setTypeaction(\Acme\ProsalesBundle\Entity\Typesaction $typeaction = null)
    {
        $this->typeaction = $typeaction;

        return $this;
    }

    /**
     * Get typeaction
     *
     * @return \Acme\ProsalesBundle\Entity\Typesaction 
     */
    public function getTypeaction()
    {
        return $this->typeaction;
    }

    /**
     * Set referent
     *
     * @param \Acme\ProsalesBundle\Entity\Referents $referent
     * @return Actions
     */
    public function setReferent(\Acme\ProsalesBundle\Entity\Referents $referent = null)
    {
        $this->referent = $referent;

        return $this;
    }

    /**
     * Get referent
     *
     * @return \Acme\ProsalesBundle\Entity\Referents 
     */
    public function getReferent()
    {
        return $this->referent;
    }

    /**
     * Set organisation
     *
     * @param \Acme\ProsalesBundle\Entity\Organisations $organisation
     * @return Actions
     */
    public function setOrganisation(\Acme\ProsalesBundle\Entity\Organisations $organisation = null)
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * Get organisation
     *
     * @return \Acme\ProsalesBundle\Entity\Organisations 
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Set contact
     *
     * @param \Acme\ProsalesBundle\Entity\Contacts $contact
     * @return Actions
     */
    public function setContact(\Acme\ProsalesBundle\Entity\Contacts $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \Acme\ProsalesBundle\Entity\Contacts 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set piecejointe
     *
     * @param \Acme\ProsalesBundle\Entity\Piecesjointes $piecejointe
     * @return Actions
     */
    public function setPiecejointe(\Acme\ProsalesBundle\Entity\Piecesjointes $piecejointe = null)
    {
        $this->piecejointe = $piecejointe;

        return $this;
    }

    /**
     * Get piecejointe
     *
     * @return \Acme\ProsalesBundle\Entity\Piecesjointes 
     */
    public function getPiecejointe()
    {
        return $this->piecejointe;
    }
}
