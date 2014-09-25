<?php

namespace Acme\ProsalesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignesdevis
 */
class Lignesdevis
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $ordre;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var float
     */
    private $prixht;

    /**
     * @var integer
     */
    private $quantite;

    /**
     * @var float
     */
    private $remise;

    /**
     * @var float
     */
    private $totalht;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Acme\ProsalesBundle\Entity\Devis
     */
    private $devis;


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
     * Set ordre
     *
     * @param integer $ordre
     * @return Lignesdevis
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Lignesdevis
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
     * Set prixht
     *
     * @param float $prixht
     * @return Lignesdevis
     */
    public function setPrixht($prixht)
    {
        $this->prixht = $prixht;

        return $this;
    }

    /**
     * Get prixht
     *
     * @return float 
     */
    public function getPrixht()
    {
        return $this->prixht;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Lignesdevis
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set remise
     *
     * @param float $remise
     * @return Lignesdevis
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;

        return $this;
    }

    /**
     * Get remise
     *
     * @return float 
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set totalht
     *
     * @param float $totalht
     * @return Lignesdevis
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
     * Set description
     *
     * @param string $description
     * @return Lignesdevis
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
     * Set devis
     *
     * @param \Acme\ProsalesBundle\Entity\Devis $devis
     * @return Lignesdevis
     */
    public function setDevis(\Acme\ProsalesBundle\Entity\Devis $devis = null)
    {
        $this->devis = $devis;

        return $this;
    }

    /**
     * Get devis
     *
     * @return \Acme\ProsalesBundle\Entity\Devis 
     */
    public function getDevis()
    {
        return $this->devis;
    }
    
    public function __toString()
    {
        return sprintf('%s',$this->getReference());
    }
    
    public function getArrayLigneDevis(){
        $sortie = array(
                        'id'=>$this->id,
                        'iddevis'=>  $this->getDevis()->getId(),
                        'ordre'=>$this->ordre,
                        'prixht'=>$this->prixht,
                        'totalht'=>$this->totalht,
                        'quantite'=>$this->quantite,
                        'reference'=>  $this->reference,
                        'remise'=>  $this->remise,
                        'description'=>  $this->description,
                        'cat'=>'produit'
                        );      
        return $sortie;
    }   
        
}
