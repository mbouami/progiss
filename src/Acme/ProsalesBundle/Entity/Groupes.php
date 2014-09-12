<?php

namespace Acme\ProsalesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupes
 */
class Groupes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $role;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $referents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->referents = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nom
     *
     * @param string $nom
     * @return Groupes
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Groupes
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add referents
     *
     * @param \Acme\ProsalesBundle\Entity\Referents $referents
     * @return Groupes
     */
    public function addReferent(\Acme\ProsalesBundle\Entity\Referents $referents)
    {
        $this->referents[] = $referents;

        return $this;
    }

    /**
     * Remove referents
     *
     * @param \Acme\ProsalesBundle\Entity\Referents $referents
     */
    public function removeReferent(\Acme\ProsalesBundle\Entity\Referents $referents)
    {
        $this->referents->removeElement($referents);
    }

    /**
     * Get referents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReferents()
    {
        return $this->referents;
    }
}
