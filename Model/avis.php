<?php
class avis
{
    private ?int $idavis = null;
    private ?string $messagee= null;
    
    public function __construct($idavis = null, $m)
    {
        $this->idavis = $idavis;
        $this->messagee = $m;
       
    }


    public function getidavis()
    {
        return $this->idavis;
    }


    public function getmessagee()
    {
        return $this->messagee;
    }


    public function setmessage($messagee)
    {
        $this->messagee = $messagee;

        return $this;
    }

}