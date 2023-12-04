<?php
class reclamation{

    private $cin;
    private $email;
    private  $sujet;
    private $date ;

    public function __construct($cin,$email,$sujet,$date)
    {
        $this->cin = $cin;
        $this->email = $email;
        $this->sujet = $sujet;
        $this->date = $date;

    }


    public function getcin()
    {
        return $this->cin;
    }
    public function setcin($cin)
    {
        $this->cin = $cin;//

        return $this;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;

        return $this;//
    }
    public function getsujet()
    {
        return $this->sujet;
    }
    public function setsujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;//
    }

    public function getdate()
    {
        return $this->date;
    }
    public function setdate($date)
    {
        $this->date= $date;

        return $this;
    }

}