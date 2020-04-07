<?php

class Chapters
{

    private $_id;
    private $_idChapitre;
    private $_titre;
    private $_histoire;
    private $_dateAjout;


    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {

        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Liste des getters

    public function id()
    {
        return $this->_id;
    }

    public function idChapitre()
    {
        return $this->_idChapitre;
    }

    public function titre()
    {
        return $this->_titre;
    }

    public function histoire()
    {
        return $this->_histoire;
    }

    public function dateAjout()
    {
        return $this->_dateAjout;
    }


    // Liste des setters

    public function setId($id)
    {

        $id = (int) $id;

        if ($id > 0) {
            $this->_id = $id;
        }
    }
    public function setIdChapitre($idChapitre)
    {
        $idChapitre = (int) $idChapitre;


        if ($idChapitre > 0) {
            $this->_idChapitre = $idChapitre;
        }
    }

    public function setTitre($titre)
    {
        if (is_string($titre)) {
            $this->_titre = $titre;
        }
    }

    public function setHistoire($histoire)
    {
        if (is_string($histoire)) {
            $this->_histoire = $histoire;
        }
    }

    public function setDateAjout($dateAjout)
    {
        if (is_string($dateAjout)) {
            $this->_dateAjout = $dateAjout;
        }
    }
}
