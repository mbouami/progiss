<?php

namespace Acme\ProsalesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Acme\ProsalesBundle\Entity\Lignescommandes;

/**
 * Commandes
 */
class Commandes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $numcommande;

    /**
     * @var string
     */
    private $dossier;

    /**
     * @var string
     */
    private $referenceclient;

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
     * @var boolean
     */
    private $livrermemeadresse;

    /**
     * @var boolean
     */
    private $facturermemeadresse;

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
    private $lignescommandes;

    /**
     * @var \Acme\ProsalesBundle\Entity\Modesreglement
     */
    private $modereglement;

    /**
     * @var \Acme\ProsalesBundle\Entity\Adresseslivraisonsfacturations
     */
    private $livraison;

    /**
     * @var \Acme\ProsalesBundle\Entity\Adresseslivraisonsfacturations
     */
    private $facturation;

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
        $this->lignescommandes = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();         
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
     * Set numcommande
     *
     * @param string $numcommande
     * @return Commandes
     */
    public function setNumcommande($numcommande)
    {
        $this->numcommande = $numcommande;

        return $this;
    }

    /**
     * Get numcommande
     *
     * @return string 
     */
    public function getNumcommande()
    {
        return $this->numcommande;
    }

    /**
     * Set dossier
     *
     * @param string $dossier
     * @return Commandes
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
     * Set referenceclient
     *
     * @param string $referenceclient
     * @return Commandes
     */
    public function setReferenceclient($referenceclient)
    {
        $this->referenceclient = $referenceclient;

        return $this;
    }

    /**
     * Get referenceclient
     *
     * @return string 
     */
    public function getReferenceclient()
    {
        return $this->referenceclient;
    }

    /**
     * Set totalht
     *
     * @param float $totalht
     * @return Commandes
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
     * @return Commandes
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
     * @return Commandes
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
     * @return Commandes
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
     * @return Commandes
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
     * Set livrermemeadresse
     *
     * @param boolean $livrermemeadresse
     * @return Commandes
     */
    public function setLivrermemeadresse($livrermemeadresse)
    {
        $this->livrermemeadresse = $livrermemeadresse;

        return $this;
    }

    /**
     * Get livrermemeadresse
     *
     * @return boolean 
     */
    public function getLivrermemeadresse()
    {
        return $this->livrermemeadresse;
    }

    /**
     * Set facturermemeadresse
     *
     * @param boolean $facturermemeadresse
     * @return Commandes
     */
    public function setFacturermemeadresse($facturermemeadresse)
    {
        $this->facturermemeadresse = $facturermemeadresse;

        return $this;
    }

    /**
     * Get facturermemeadresse
     *
     * @return boolean 
     */
    public function getFacturermemeadresse()
    {
        return $this->facturermemeadresse;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Commandes
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
     * @return Commandes
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
     * Add lignescommandes
     *
     * @param \Acme\ProsalesBundle\Entity\Lignescommandes $lignescommandes
     * @return Commandes
     */
    public function addLignescommande(\Acme\ProsalesBundle\Entity\Lignescommandes $lignescommandes)
    {
        $this->lignescommandes[] = $lignescommandes;

        return $this;
    }

    /**
     * Remove lignescommandes
     *
     * @param \Acme\ProsalesBundle\Entity\Lignescommandes $lignescommandes
     */
    public function removeLignescommande(\Acme\ProsalesBundle\Entity\Lignescommandes $lignescommandes)
    {
        $this->lignescommandes->removeElement($lignescommandes);
    }

    /**
     * Get lignescommandes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLignescommandes()
    {
        return $this->lignescommandes;
    }

    /**
     * Set modereglement
     *
     * @param \Acme\ProsalesBundle\Entity\Modesreglement $modereglement
     * @return Commandes
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
     * Set livraison
     *
     * @param \Acme\ProsalesBundle\Entity\Adresseslivraisonsfacturations $livraison
     * @return Commandes
     */
    public function setLivraison(\Acme\ProsalesBundle\Entity\Adresseslivraisonsfacturations $livraison = null)
    {
        $this->livraison = $livraison;

        return $this;
    }

    /**
     * Get livraison
     *
     * @return \Acme\ProsalesBundle\Entity\Adresseslivraisonsfacturations 
     */
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * Set facturation
     *
     * @param \Acme\ProsalesBundle\Entity\Adresseslivraisonsfacturations $facturation
     * @return Commandes
     */
    public function setFacturation(\Acme\ProsalesBundle\Entity\Adresseslivraisonsfacturations $facturation = null)
    {
        $this->facturation = $facturation;

        return $this;
    }

    /**
     * Get facturation
     *
     * @return \Acme\ProsalesBundle\Entity\Adresseslivraisonsfacturations 
     */
    public function getFacturation()
    {
        return $this->facturation;
    }

    /**
     * Set referent
     *
     * @param \Acme\ProsalesBundle\Entity\Referents $referent
     * @return Commandes
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
     * @return Commandes
     */
    public function setTauxtva($tauxtva = null)
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
     * @return Commandes
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
     * @return Commandes
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
 
    public function getListeproduits(){
    	$listeproduits = array();   
        	foreach ($this->lignescommandes as $key => $produit) {
                    $listeproduits[] = array(
                                            'id'=>$key,
//                                            'idcommande'=>  $produit->getId(),                        
                                            'ordre'=> $produit->getOrdre(),
                                            'prixht'=> $produit->getPrixht(),
                                            'totalht'=> $produit->getTotalht(),
                                            'quantite'=> $produit->getQuantite(),
                                            'reference'=>  $produit->getReference(),
                                            'remise'=>  $produit->getRemise(),
                                            'description'=>  $produit->getDescription(),
                                            'cat'=>'produit'
                                            );
        	}    	    
    	return $listeproduits;
    } 
    
    public function getArrayCommandes(){
    	$sortie = array('id'=>$this->getId(),
    				'numcommande'=>$this->getNumcommande(),
                                'referenceclient' => $this->getReferenceclient(),
    				'dossier'=>$this->getDossier(),
                                'totalht' => $this->getTotalht(), 
                                'totaltva' => $this->getTotaltva(),   
                                'tauxtva' => $this->getTauxtva(),             
                                'fraisport' => $this->getFraisport(),             
                                'totalttc' => $this->getTotalttc(),             
    				'createdAt' =>  date_format($this->getCreatedAt(), "d-m-Y"),
    				'contact'=>$this->getContact()?$this->getContact()->__toString():null,
                                'referent'=>$this->getReferent()->__toString(),             
    				'listeproduits'=> $this->getListeproduits(),
    				'cat'=>'commande'    				
				);
    	return $sortie;
    }          
}
