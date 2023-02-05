<?php
class tac_gia
{
    private $id_tac_gia;
    private $ten_tac_gia;
    private $but_danh;
    private $ngay_sinh;
    private $que_quan;
    private $link_anh;

    public function __construct($ten_tac_gia, $but_danh, $ngay_sinh, $que_quan, $link_anh)
    {
        $this->ten_tac_gia = $ten_tac_gia;
        $this->but_danh = $but_danh;
        $this->ngay_sinh = $ngay_sinh;
        $this->que_quan = $que_quan;
        $this->link_anh = $link_anh;
    }

    public function setID_tac_gia($id)
    {
        $this->id = $id;
    }
    public function getID_tac_gia()
    {
        return $this->id;
    }

    public function setTen_tac_gia($ten_tac_gia)
    {
        $this->ten_tac_gia = $ten_tac_gia;
    }
    public function getTen_tac_gia()
    {
        return $this->ten_tac_gia;
    }

    public function setBut_danh($but_danh)
    {
        $this->but_danh = $but_danh;
    }
    public function getBut_danh()
    {
        return $this->but_danh;
    }

    public function setNgay_sinh($ngay_sinh)
    {
        $this->ngay_sinh = $ngay_sinh;
    }
    public function getNgay_sinh()
    {
        return $this->ngay_sinh;
    }

    public function setQue_quan($que_quan)
    {
        $this->que_quan = $que_quan;
    }
    public function getQue_quan()
    {
        return $this->que_quan;
    }

    public function setLink_anh($link_anh)
    {
        $this->link_anh = $link_anh;
    }
    public function getLink_anh()
    {
        return $this->link_anh;
    }
}

?>