<?php
class the_loai
{
    private $id_the_loai;
    private $ten_the_loai;
    private $hien;

    public function __construct($ten)
    {
        
        $this->ten_the_loai=$ten;

    }

    public function getID_the_loai()
    {
        return $this->id_the_loai;
    }
    public function setID_the_loai($id)
    {
        $this->id_the_loai=$id;
    }

    public function setHien($hien)
    {
        $this->hien=$hien;
    }

    public function getHien()
    {
        return $this->hien;
    }


    public function setTen_the_loai($ten)
    {
        $this->ten_the_loai=$ten;
    }
    public function getTen_the_loai()
    {
        return $this->ten_the_loai;
    }


}



?>