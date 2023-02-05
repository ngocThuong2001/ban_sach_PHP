<?php
class sach 
{
    private $id_sach;
    private $id_the_loai;
    private $ten_sach;  
    private $id_tac_gia;
    private $gia;
    private $link_anh;
    private $noi_dung;

    public function __construct($id_the_loai, $ten_sach, $id_tac_gia, $gia, $link_anh, $noi_dung )
    {
        $this->id_the_loai=$id_the_loai;
        $this->ten_sach=$ten_sach;
        $this->id_tac_gia=$id_tac_gia;
        $this->gia=$gia;
        $this->link_anh=$link_anh;
        $this->noi_dung=$noi_dung;
    }

    public function getID_sach()
    {
        return $this->id_sach;
    }
    public function setID_sach($id_sach)
    {
        $this->id_sach = $id_sach;
    }

    public function getID_the_loai()
    {
        return $this->id_the_loai;
    }
    public function setID_the_loai($id)
    {
        $this->id_the_loai = $id;
    }

    public function getTen_sach()
    {
        return $this->ten_sach;
    }
    public function setTen_sach($ten)
    {
        $this->ten_sach = $ten;
    }

    public function getID_tac_gia()
    {
        return $this->id_tac_gia;
    }
    public function setID_tac_gia($id_tac_gia)
    {
        $this->id_tac_gia = $id_tac_gia;
    }

    public function getGia()
    {
        return $this->gia;
    }
    public function setGia($gia)
    {
        $this->gia = $gia;
    }

    public function getLink_anh()
    {
        return $this->link_anh;
    }
    public function setLink_anh($link_anh)
    {
        $this->link_anh = $link_anh;
    }

    public function getNoi_dung()
    {
        return $this->noi_dung;
    }
    public function setNoi_dung($noi_dung)
    {
        $this->noi_dung = $noi_dung;
    }

}


?>