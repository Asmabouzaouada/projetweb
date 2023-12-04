<?php
class rendez_vous
{
    private ?int $id = null;
    private ?string $sujet = null;
    private ?string $daternd= null;
    private ?string $demande_rdv= null;
    private ?string $etat = null;

    public function __construct($id = null, $s,$dd, $d, $e)
    {
        $this->id= $id;
        $this->sujet = $s;
        $this->daternd= $dd;
        $this->demande_rdv= $d;
        $this->etat = $e;
    }


    public function getid_rdv()
    {
        return $this->id;
    }



    public function getsujet()
    {
        return $this->sujet;
    }


    public function setsujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }


    public function getdaternd()
    {
        return $this->daternd;
    }


    public function setdaternd($daternd)
    {
        $this->$daternd = $daternd;

        return $this;
    }

    
    public function getdemande_rdv()
    {
        return $this->demande_rdv;
    }


    public function setdemande_rdv($ddemande_rdv)
    {
        $this->$demande_rdv = $demande_rdv;

        return $this;
    }


    public function getetat()
    {
        return $this->etat;
    }


    public function setetat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
}
