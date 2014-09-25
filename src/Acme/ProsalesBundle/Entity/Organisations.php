<?php

namespace Acme\ProsalesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Organisations
 */
class Organisations
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
    private $adresse;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $web;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contact;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $devis;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $commande;

    /**
     * @var \Acme\ProsalesBundle\Entity\Villes
     */
    private $ville;

    /**
     * @var \Acme\ProsalesBundle\Entity\Referents
     */
    private $referent;

    /**
     * @var \Acme\ProsalesBundle\Entity\Statuts
     */
    private $statut;    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contact = new ArrayCollection();
        $this->devis = new ArrayCollection();
        $this->commande = new ArrayCollection();
        $this->organisationliee = new ArrayCollection();
        $this->organisationsliees = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Organisations
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
     * Set adresse
     *
     * @param string $adresse
     * @return Organisations
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Organisations
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Organisations
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Organisations
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set web
     *
     * @param string $web
     * @return Organisations
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Organisations
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
     * @return Organisations
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
     * @return Organisations
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
     * Add contact
     *
     * @param \Acme\ProsalesBundle\Entity\Contacts $contact
     * @return Organisations
     */
    public function addContact(\Acme\ProsalesBundle\Entity\Contacts $contact)
    {
        $this->contact[] = $contact;

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \Acme\ProsalesBundle\Entity\Contacts $contact
     */
    public function removeContact(\Acme\ProsalesBundle\Entity\Contacts $contact)
    {
        $this->contact->removeElement($contact);
    }

    /**
     * Get contact
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Add devis
     *
     * @param \Acme\ProsalesBundle\Entity\Devis $devis
     * @return Organisations
     */
    public function addDevi(\Acme\ProsalesBundle\Entity\Devis $devis)
    {
        $this->devis[] = $devis;

        return $this;
    }

    /**
     * Remove devis
     *
     * @param \Acme\ProsalesBundle\Entity\Devis $devis
     */
    public function removeDevi(\Acme\ProsalesBundle\Entity\Devis $devis)
    {
        $this->devis->removeElement($devis);
    }

    /**
     * Get devis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Add commande
     *
     * @param \Acme\ProsalesBundle\Entity\Commandes $commande
     * @return Organisations
     */
    public function addCommande(\Acme\ProsalesBundle\Entity\Commandes $commande)
    {
        $this->commande[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Acme\ProsalesBundle\Entity\Commandes $commande
     */
    public function removeCommande(\Acme\ProsalesBundle\Entity\Commandes $commande)
    {
        $this->commande->removeElement($commande);
    }

    /**
     * Get commande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set ville
     *
     * @param \Acme\ProsalesBundle\Entity\Villes $ville
     * @return Organisations
     */
    public function setVille(\Acme\ProsalesBundle\Entity\Villes $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \Acme\ProsalesBundle\Entity\Villes 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set referent
     *
     * @param \Acme\ProsalesBundle\Entity\Referents $referent
     * @return Organisations
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
     * Set statut
     *
     * @param \Acme\ProsalesBundle\Entity\Statuts $statut
     * @return Organisations
     */
    public function setStatut(\Acme\ProsalesBundle\Entity\Statuts $statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \Acme\ProsalesBundle\Entity\Statuts 
     */
    public function getStatut()
    {
        return $this->statut;
    }
    
    public function __toString()
    {
        return sprintf('%s',$this->getNom());
    }     
    
    public function getListecontacts(){
    	 
    	$listecontacts = array();
    	$contacts = $this->getContact();
    	if (count($contacts)>0){
        	foreach ($contacts as $key => $contact) {
        		$listecontacts[] = $contact->getArrayContacts();
        	}    	    
    	}    	

    	return $listecontacts;
    } 
    public function getListedevis(){
    
    	$listedevis = array();
        $sortie = array();
    	$lesdevis = $this->getDevis();
    	if (count($lesdevis)>0){
        	foreach ($lesdevis as $key => $devis) {
        		$listedevis[$devis->getDossier()][] = $devis->getArrayDevis();
        	}    
                foreach ($listedevis as $key => $value) {
                    $sortie[] = array('id'=>$key,"reference"=>$key,'cat'=>'dossier',"children"=>$value);
                }                
    	}
//    	return array('identifier'=> 'id','items'=>$sortie);
    	return $sortie;        
    }      
    
    public function getListecommandes(){
    
    	$listecommandes = array();
    	$lescommandes = $this->getCommande();
    	if (count($lescommandes)>0){
        	foreach ($lescommandes as $key => $commande) {
        		$listecommandes[] = $commande->getArrayCommandes();
        	}    	    
    	}
    	return $listecommandes;
    }        

    public function getListeactions(){
    
    	$listeactions = array();
    	$lesactions = $this->getAction();
    	if (count($lesactions)>0){
        	foreach ($lesactions as $key => $action) {
        		$listeactions[] = $action->getArrayActions();
        	}    	    
    	}
    	return $listeactions;
    }      
    /**
     * @ORM\PostUpdate
     */
    public function doStuffOnPostUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function doStuffOnPreUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organisationsliees;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organisationliee;


    /**
     * Add organisationsliees
     *
     * @param \Acme\ProsalesBundle\Entity\Organisations $organisationsliees
     * @return Organisations
     */
    public function addOrganisationsliee(\Acme\ProsalesBundle\Entity\Organisations $organisationsliees)
    {
        $this->organisationsliees[] = $organisationsliees;

        return $this;
    }

    /**
     * Remove organisationsliees
     *
     * @param \Acme\ProsalesBundle\Entity\Organisations $organisationsliees
     */
    public function removeOrganisationsliee(\Acme\ProsalesBundle\Entity\Organisations $organisationsliees)
    {
        $this->organisationsliees->removeElement($organisationsliees);
    }

    /**
     * Get organisationsliees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrganisationsliees()
    {
        return $this->organisationsliees;
    }

    /**
     * Add organisationliee
     *
     * @param \Acme\ProsalesBundle\Entity\Organisations $organisationliee
     * @return Organisations
     */
    public function addOrganisationliee(\Acme\ProsalesBundle\Entity\Organisations $organisationliee)
    {
        $this->organisationliee[] = $organisationliee;

        return $this;
    }

    /**
     * Remove organisationliee
     *
     * @param \Acme\ProsalesBundle\Entity\Organisations $organisationliee
     */
    public function removeOrganisationliee(\Acme\ProsalesBundle\Entity\Organisations $organisationliee)
    {
        $this->organisationliee->removeElement($organisationliee);
    }

    /**
     * Get organisationliee
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrganisationliee()
    {
        return $this->organisationliee;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $action;


    /**
     * Add action
     *
     * @param \Acme\ProsalesBundle\Entity\Actions $action
     * @return Organisations
     */
    public function addAction(\Acme\ProsalesBundle\Entity\Actions $action)
    {
        $this->action[] = $action;

        return $this;
    }

    /**
     * Remove action
     *
     * @param \Acme\ProsalesBundle\Entity\Actions $action
     */
    public function removeAction(\Acme\ProsalesBundle\Entity\Actions $action)
    {
        $this->action->removeElement($action);
    }

    /**
     * Get action
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAction()
    {
        return $this->action;
    }
}
