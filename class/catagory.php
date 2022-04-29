<?php

class category {

    private $idcat;
    private $name;

    
    public function __construct(int $idcat, string $name)
    {
        $this -> idcat = $idcat;
        $this -> name = $name;

    }



    /**
     * Get the value of idcat
     */ 
    public function getIdcat()
    {
        return $this->idcat;
    }

    /**
     * Set the value of idcat
     *
     * @return  self
     */ 
    public function setIdcat($idcat)
    {
        $this->idcat = $idcat;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    
}