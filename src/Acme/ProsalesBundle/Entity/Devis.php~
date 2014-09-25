<?php

namespace Acme\ProsalesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Devis
 */
class Devis
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $dossier;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var float
     */
    private $totalht;

    /**
     * @var float
     */
    private $totaltva;

    /**
     * @var float
     */
    private $totalttc;

    /**
     * @var float
     */
    private $fraisport;

    /**
     * @var string
     */
    private $observation;

    /**
     * @var string
     */
    private $raisonclassement;

    /**
     * @var boolean
     */
    private $classement;

    /**
     * @var boolean
     */
    private $envoimail;

    /**
     * @var boolean
     */
    private $priorite;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $lignesdevis;

    /**
     * @var \Acme\ProsalesBundle\Entity\Devis
     */
    private $parent;

    /**
     * @var \Acme\ProsalesBundle\Entity\Modesreglement
     */
    private $modereglement;

    /**
     * @var \Acme\ProsalesBundle\Entity\Typesdevis
     */
    private $typedevis;

    /**
     * @var \Acme\ProsalesBundle\Entity\Referents
     */
    private $referent;

    /**
     * @var float
     */
    private $tauxtva;

    /**
     * @var \Acme\ProsalesBundle\Entity\Organisations
     */
    private $organisation;

    /**
     * @var \Acme\ProsalesBundle\Entity\Contacts
     */
    private $contact;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->lignesdevis = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->classement = false;
        $this->priorite = false;
        $this->envoimail = false; 
        $this->raisonclassement = null;
        $this->reference = ' ';             
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
     * Set dossier
     *
     * @param string $dossier
     * @return Devis
     */
    public function setDossier($dossier)
    {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * Get dossier
     *
     * @return string 
     */
    public function getDossier()
    {
        return $this->dossier;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Devis
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set totalht
     *
     * @param float $totalht
     * @return Devis
     */
    public function setTotalht($totalht)
    {
        $this->totalht = $totalht;

        return $this;
    }

    /**
     * Get totalht
     *
     * @return float 
     */
    public function getTotalht()
    {
        return $this->totalht;
    }

    /**
     * Set totaltva
     *
     * @param float $totaltva
     * @return Devis
     */
    public function setTotaltva($totaltva)
    {
        $this->totaltva = $totaltva;

        return $this;
    }

    /**
     * Get totaltva
     *
     * @return float 
     */
    public function getTotaltva()
    {
        return $this->totaltva;
    }

    /**
     * Set totalttc
     *
     * @param float $totalttc
     * @return Devis
     */
    public function setTotalttc($totalttc)
    {
        $this->totalttc = $totalttc;

        return $this;
    }

    /**
     * Get totalttc
     *
     * @return float 
     */
    public function getTotalttc()
    {
        return $this->totalttc;
    }

    /**
     * Set fraisport
     *
     * @param float $fraisport
     * @return Devis
     */
    public function setFraisport($fraisport)
    {
        $this->fraisport = $fraisport;

        return $this;
    }

    /**
     * Get fraisport
     *
     * @return float 
     */
    public function getFraisport()
    {
        return $this->fraisport;
    }

    /**
     * Set observation
     *
     * @param string $observation
     * @return Devis
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string 
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set raisonclassement
     *
     * @param string $raisonclassement
     * @return Devis
     */
    public function setRaisonclassement($raisonclassement)
    {
        $this->raisonclassement = $raisonclassement;

        return $this;
    }

    /**
     * Get raisonclassement
     *
     * @return string 
     */
    public function getRaisonclassement()
    {
        return $this->raisonclassement;
    }

    /**
     * Set classement
     *
     * @param boolean $classement
     * @return Devis
     */
    public function setClassement($classement)
    {
        $this->classement = $classement;

        return $this;
    }

    /**
     * Get classement
     *
     * @return boolean 
     */
    public function getClassement()
    {
        return $this->classement;
    }

    /**
     * Set envoimail
     *
     * @param boolean $envoimail
     * @return Devis
     */
    public function setEnvoimail($envoimail)
    {
        $this->envoimail = $envoimail;

        return $this;
    }

    /**
     * Get envoimail
     *
     * @return boolean 
     */
    public function getEnvoimail()
    {
        return $this->envoimail;
    }

    /**
     * Set priorite
     *
     * @param boolean $priorite
     * @return Devis
     */
    public function setPriorite($priorite)
    {
        $this->priorite = $priorite;

        return $this;
    }

    /**
     * Get priorite
     *
     * @return boolean 
     */
    public function getPriorite()
    {
        return $this->priorite;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Devis
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
     * @return Devis
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
     * Add children
     *
     * @param \Acme\ProsalesBundle\Entity\Devis $children
     * @return Devis
     */
    public function addChild(\Acme\ProsalesBundle\Entity\Devis $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Acme\ProsalesBundle\Entity\Devis $children
     */
    public function removeChild(\Acme\ProsalesBundle\Entity\Devis $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add lignesdevis
     *
     * @param \Acme\ProsalesBundle\Entity\Lignesdevis $lignesdevis
     * @return Devis
     */
    public function addLignesdevi(\Acme\ProsalesBundle\Entity\Lignesdevis $lignesdevis)
    {
        $this->lignesdevis[] = $lignesdevis;

        return $this;
    }

    /**
     * Remove lignesdevis
     *
     * @param \Acme\ProsalesBundle\Entity\Lignesdevis $lignesdevis
     */
    public function removeLignesdevi(\Acme\ProsalesBundle\Entity\Lignesdevis $lignesdevis)
    {
        $this->lignesdevis->removeElement($lignesdevis);
    }

    /**
     * Get lignesdevis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLignesdevis()
    {
        return $this->lignesdevis;
    }

    /**
     * Set parent
     *
     * @param \Acme\ProsalesBundle\Entity\Devis $parent
     * @return Devis
     */
    public function setParent(\Acme\ProsalesBundle\Entity\Devis $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Acme\ProsalesBundle\Entity\Devis 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set modereglement
     *
     * @param \Acme\ProsalesBundle\Entity\Modesreglement $modereglement
     * @return Devis
     */
    public function setModereglement(\Acme\ProsalesBundle\Entity\Modesreglement $modereglement = null)
    {
        $this->modereglement = $modereglement;

        return $this;
    }

    /**
     * Get modereglement
     *
     * @return \Acme\ProsalesBundle\Entity\Modesreglement 
     */
    public function getModereglement()
    {
        return $this->modereglement;
    }

    /**
     * Set typedevis
     *
     * @param \Acme\ProsalesBundle\Entity\Typesdevis $typedevis
     * @return Devis
     */
    public function setTypedevis(\Acme\ProsalesBundle\Entity\Typesdevis $typedevis = null)
    {
        $this->typedevis = $typedevis;

        return $this;
    }

    /**
     * Get typedevis
     *
     * @return \Acme\ProsalesBundle\Entity\Typesdevis 
     */
    public function getTypedevis()
    {
        return $this->typedevis;
    }

    /**
     * Set referent
     *
     * @param \Acme\ProsalesBundle\Entity\Referents $referent
     * @return Devis
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
     * Set tauxtva
     *
     * @param float $tauxtva
     * @return Devis
     */

    public function setTauxtva($tauxtva)
    {
        $this->tauxtva = $tauxtva;

        return $this;
    }
    
    /**
     * Get tauxtva
     *
     * @return float
     */
    public function getTauxtva()
    {
        return $this->tauxtva;
    }

    /**
     * Set organisation
     *
     * @param \Acme\ProsalesBundle\Entity\Organisations $organisation
     * @return Devis
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
     * @return Devis
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
    
    public function __toString()
    {
        return sprintf('%s (%s)',$this->getDossier(),$this->getReference());
    }    
    
    public function getArrayDevis(){
    	$sortie = array(
                        'id'=>$this->getId(),
                        'reference'=>$this->getReference(),
                        'dossier'=>$this->getDossier(),
                        'createdAt' =>  date_format($this->getCreatedAt(), "d-m-Y"),
                        'organisation' => $this->getOrganisation()->__toString(),            
                        'contact'=>$this->getContact()?$this->getContact()->__toString():null,
                        'referent'=>$this->getReferent()->__toString(),  
                        'totalht' => $this->getTotalht(), 
                        'totaltva' => $this->getTotaltva(),   
//                        'tauxtva' => $this->getTauxtva()->getTaux(), 
                        'tauxtva' => $this->getTauxtva(),             
                        'fraisport' => $this->getFraisport(),             
                        'totalttc' => $this->getTotalttc(), 
                        'iddevisparent' => $this->getParent()!=null?$this->getParent()->getId():null, 
                        'devisparent'=> $this->getParent()==null?null:$this->getParent()->getReference(),            
                        'listeproduits'=> $this->getListeproduits(),
                        'cat'=>'devis'    				
                        );
    	return $sortie;
    }  
    
    public function getListeproduits(){
    	$listeproduits = array();
//    	if (count($this->getLignesdevis())>0) {
//        	$produits = $this->getLignesdevis()->getValues();      
        	foreach ($this->lignesdevis as $key => $produit) {
        		$listeproduits[] = $produit->getArrayLigneDevis();
        	}    	    
//    	}

    	return $listeproduits;
    }    
    
    private $produitsdevis;
    
    public function getProduitsdevis()
    {
        return $this->produitsdevis;
    }
    
    public function getParentOriginedevis()
    {
        $devisparent = $this;
        while (null !== $devisparent->getParent()) {
            $devisparent = $devisparent->getParent();
        }
        return $devisparent;
    }    
}
