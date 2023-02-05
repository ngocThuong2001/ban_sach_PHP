<?php

    include("session.php");
    class thanh_vien_db
    {
        public function check_trung_email($email)
        {
            $result= false;
            $db=database::getDB();
            $db->$email;
            $query="SELECT * FROM thanh_vien WHERE email = :email";
            $statement=$db->prepare($query);
            $statement->bindValue(':email',$email);
            $statement->execute();
            $result=$statement->fetchAll();
            $objs_thanh_vien = array();
            foreach($result as $value)
            {
                $obj_thanh_vien = new thanh_vien(
                                     $value['email'],
                                     $value['ten'],
                                     $value['sdt'],
                                     $value['password'],
                                     $value['dia_chi']);
                $objs_thanh_vien[]=$obj_thanh_vien;
            }
            
            if(!empty($objs_thanh_vien))
            {
                $result= true;
            }
            else
            {
                $result = false;
            }

            return $result;
        }
        public function them_thanh_vien($obj_thanh_vien)
        {
            $check_trung_email=thanh_vien_db::check_trung_email($obj_thanh_vien->getEmail());
            if($check_trung_email==true)
            {
                return;
            }
            else
            {
            $db=database::getDB();
            $query = "INSERT INTO thanh_vien(password,email,ten,sdt,dia_chi,level)
            VALUES (:pass,:email,:ten,:sdt,:dia_chi,:level)";
            $statement=$db->prepare($query);
            $statement->bindValue(':pass',$obj_thanh_vien->getPassword());
            $statement->bindValue(':email',$obj_thanh_vien->getEmail());
            $statement->bindValue(':ten',$obj_thanh_vien->getTen());
            $statement->bindValue(':sdt',$obj_thanh_vien->getSdt());
            $statement->bindValue(':dia_chi',$obj_thanh_vien->getDia_chi());
            $statement->bindValue(':level',$obj_thanh_vien->getLevel());
            $statement->execute();
            $statement->closeCursor();
            }
        }

        public function dang_nhap($email, $password)
        {
            
            $db=database::getDB();
            $query = "SELECT * FROM  thanh_vien WHERE (email =:email) AND
            (password =:password) ";
            $statement=$db->prepare($query);
            $statement->bindValue(':password',$password);
            $statement->bindValue(':email',$email);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            if(empty($result))
            {
                $thanh_cong= false;
            }
            else
            {
                $thanh_cong = true;
            }
            
            return $thanh_cong;

        }

        public function thong_tin_thanh_vien($email)
        {
            $db=database::getDB();
            $query = "SELECT * FROM  thanh_vien WHERE (email =:email)";
            $statement=$db->prepare($query);
            $statement->bindValue(':email',$email);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();

            return $result;

        }

        
        public function dang_xuat()
        {
            session_unset('user');
        }

        public function sua_thong_tin($obj_thanh_vien)
        {
            $db=database::getDB();
            $id_thanh_vien=$obj_thanh_vien->getId_thanh_vien();
            $password=$obj_thanh_vien->getPassword();
            $email=$obj_thanh_vien->getEmail();
            $ten=$obj_thanh_vien->getTen();
            $sdt=$obj_thanh_vien->getSdt();
            $dia_chi=$obj_thanh_vien->getDia_chi();
            $level=$obj_thanh_vien->getLevel();
            $query="UPDATE thanh_vien SET password= :password, email= :email, ten= :ten, sdt= :sdt,dia_chi= :dia_chi,level= :level WHERE id_thanh_vien= :id_thanh_vien";
      
            $statement = $db->prepare($query);
            $statement->bindValue(':password',$password);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':ten',$ten);
            $statement->bindValue(':sdt',$sdt);
            $statement->bindValue(':dia_chi',$dia_chi);
            $statement->bindValue(':level',$level);
            $statement->bindValue(':id_thanh_vien',$id_thanh_vien);
            $statement->execute();
            $statement->closeCursor();
    
            
           
        }

        public function tong_so_thanh_vien()
        {   
            $db=database::getDB();
            $param="tong";
            $query="SELECT COUNT(id_thanh_vien) AS $param FROM thanh_vien WHERE 1";
            $statement= $db-> prepare($query);
            $statement->execute();
            $result = $statement-> fetch();
            return $result;
        }

    }
?>