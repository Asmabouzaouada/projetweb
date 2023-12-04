<?php
class reponse{

    private $id_rep;
    private $contenu;
    private  $date_rep;
    private $id_rec;

    public function __construct($id_rep,$contenu,$date_rep,$id_rec)
    {
        $this->id_rep = $id_rep;
        $this->contenu = $contenu;
        $this->date_rep = $date_rep;
        $this->id_rec = $id_rec;

    }


    public function getid_rep()
    {
        return $this->id_rep;
    }
    public function setid_rep($id_rep)
    {
        $this->id_rep = $id_rep;//

        return $this;
    }
    public function getcontenu()
    {
        return $this->contenu;
    }
    public function setcontenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;//
    }
    public function getdate_rep()
    {
        return $this->date_rep;
    }
    public function setdate_rep($date_rep)
    {
        $this->date_rep = $date_rep;

        return $this;//
    }

    public function getid_rec()
    {
        return $this->id_rec;
    }
    public function setid_rec($id_rec)
    {
        $this->id_rec= $id_rec;

        return $this;
    }

}