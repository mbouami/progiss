<?php

namespace Acme\ProsalesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */

class Message
{
    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;   
    
    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    public $path;    
    
    protected $a; 
    protected $bcc;       
    protected $objet;
    protected $description;  
    /**
     * @var \Doctrine\Common\Collections\Collection
    */
    private $fichiersjoints;
    
    public function addFichierjoints(UploadedFile $fichier)
    {
        $this->fichiersjoints[] = $fichier;

        return $this;
    }  
    
    public function removeFichierjoints(UploadedFile $fichier)
    {
        $this->fichiersjoints->removeElement($fichier);
    }    
    
    public function getFichierjoints()
    {
        return $this->fichiersjoints;
    }    
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;    
    }
    

    public function getFile()
    {
        return $this->file;
    } 
    
    public function getA()
    {
        return $this->a;
    }

    public function setA($a)
    {
        $this->a = $a;
    }        
    
    public function getBcc()
    {
        return $this->bcc;
    }

    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
    } 
    
    
    public function getObjet()
    {
        return $this->objet;
    }

    public function setObjet($objet)
    {
        $this->objet = $objet;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }    
    
    
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/documents';
    }
    
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->path = $this->file->getClientOriginalName();

        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
//        $this->file = null;
        unset($this->file);         
    }    
    
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }    
}

