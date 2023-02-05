<?php
    class thanh_vien
    {
        private $id_thanh_vien;
        private $email;
        private $ten;
        private $sdt;
        private $password;
        private $dia_chi;
        private $level;
        private $link_anh;

        public function __construct($email="", $ten="", $sdt="", $password="", $dia_chi="", $level = 3, $link_anh="")
        {
            $this->email = $email;
            $this->ten = $ten;
            $this->sdt = $sdt;
            $this->password = $password;
            $this->dia_chi = $dia_chi;
            $this->level = $level;
            $this->link_anh= $link_anh;
        }

        public function getID_thanh_vien()
        {
            return $this->id_thanh_vien;
        }

        public function setID_thanh_vien($id)
        {
            $this->id_thanh_vien=$id;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email=$email;
        }

        public function getSdt()
        {
            return $this->sdt;
        }

        public function setSdt($sdt)
        {
            $this->sdt=$sdt;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password=$password;
        }
        
        public function getTen()
        {
            return $this->ten;
        }

        public function setTen($ten)
        {
            $this->ten=$ten;
        }
        public function getLevel()
        {
            return $this->level;
        }
        public function setLevel($level)
        {
            $this->level=$level;
        }

        public function getDia_chi()
        {
            return $this->dia_chi;
        }
        public function setDia_chi($dia_chi)
        {
            $this->dia_chi=$dia_chi;
        }

        public function getLink_anh()
        {
            return $this->link_anh;
        }
        public function setLink_anh($link_anh)
        {
            $this->link_anh=$link_anh;
        }

    }
?>