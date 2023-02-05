<?php
class sach_db
{
    public function sach_theo_the_loai($id_the_loai)
    {
        $db=database::getDB();
        $query="SELECT * FROM sach WHERE id_the_loai = :idtl";
        $statement = $db->prepare($query);
        $statement->bindValue(':idtl',$id_the_loai);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        $objs_sach = array();
        foreach($result as $value)
            {
                $obj_sach = new sach($value['id_the_loai'],
                $value['ten_sach'],
                $value['id_tac_gia'],
                $value['gia'],
                $value['link_anh'],
                $value['noi_dung']);
                $obj_sach -> setID_sach($value['id_sach']);

                $objs_sach[]=$obj_sach;
            }

        return $objs_sach;

        
    }

    public function getTen_sach($id_sach)
    {
        $db=database::getDB();
        $query="SELECT ten_sach FROM sach WHERE id_sach = :id_sach";
        $statement = $db->prepare($query);
        $statement->bindValue(':id_sach',$id_sach);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();

        return $result;
    }

    public function gia_sach($id_sach)
    {
        $db=database::getDB();
        $query="SELECT gia FROM sach WHERE id_sach = :id_sach";
        $statement = $db->prepare($query);
        $statement->bindValue(':id_sach',$id_sach);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();

        return $result;
    }

    public function danh_sach_sach()
    {
        $db=database::getDB();
        $query="SELECT * FROM sach WHERE 1";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        $objs_sach = array();
        foreach($result as $value)
            {
                $obj_sach = new sach($value['id_the_loai'],
                $value['ten_sach'],
                $value['id_tac_gia'],
                $value['gia'],
                $value['link_anh'],
                $value['noi_dung']);
                $obj_sach -> setID_sach($value['id_sach']);

                $objs_sach[]=$obj_sach;
            }

        return $objs_sach;

        
    }

    public function tong_so_sach_theo_the_loai($id_the_loai)
    {
        $db=database::getDB();
        $query="SELECT * FROM sach WHERE id_the_loai = :idtl";
        $statement = $db->prepare($query);
        $statement->bindValue(':idtl',$id_the_loai);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $statement->rowCount();

        
    }

    public function xem_chi_tiet_sach($id_sach)
    {
        $db=database::getDB();
        $query="SELECT * FROM sach WHERE id_sach = :idsach";
        $statement = $db->prepare($query);
        $statement->bindValue(':idsach',$id_sach);
        $statement->execute();
        $result = $statement->fetch();    
        $obj_sach = new sach($result['id_the_loai'],
        $result['ten_sach'],
        $result['id_tac_gia'],
        $result['gia'],
        $result['link_anh'],
        $result['noi_dung']);
        $obj_sach->setID_sach($result['id_sach']);
        $statement->closeCursor();
        return $obj_sach;

    }    

    public function them_sach($obj_sach)
    {
        $db=database::getDB();
        $query = "INSERT INTO sach(id_the_loai,id_tac_gia,ten_sach,gia,link_anh,noi_dung)
        VALUES (:idtl,:id_tac_gia,:ten,:gia,:link,:nd)";
        $statement=$db->prepare($query);
        $statement->bindValue(':idtl',$obj_sach->getID_the_loai());
        $statement->bindValue(':ten',$obj_sach->getTen_sach());
        $statement->bindValue(':id_tac_gia',$obj_sach->getID_tac_gia());
        $statement->bindValue(':gia',$obj_sach->getGia());
        $statement->bindValue(':link',$obj_sach->getLink_anh());
        $statement->bindValue(':nd',$obj_sach->getNoi_dung());

        $statement->execute();
        $statement->closeCursor();
    
    }

    public function max_id_sach()
    {
        $db=database::getDB();

        $query ="SELECT MAX(id_sach) FROM sach";
        $statement=$db->prepare($query);
        $statement->execute();
        $result=$statement->fetch();
        $statement->closeCursor();
        $max=0;
        if(!empty($result))
        {
            $max=$result['MAX(id_sach)'];
        }
        return $max;

    }

    public function check_trung_ten_sach($ten_sach)
    {
        
        $db=database::getDB();
        $query="SELECT * FROM sach WHERE ten_sach = :ten_sach";
        $statement=$db->prepare($query);
        $statement->bindValue(':ten_sach',$ten_sach);
        $statement->execute();
        $result=$statement->fetchAll();
        $objs_sach = array();
        foreach($result as $value)
        {
            $obj_sach = new sach($value['id_the_loai'],
                                 $value['ten_sach'],
                                 $value['id_tac_gia'],
                                 $value['gia'],
                                 $value['link_anh'],
                                 $value['noi_dung'] );
            $objs_sach[]=$obj_sach;
        }
        return $objs_sach;
    }

    public function tim_kiem_theo_ten($ten_sach)
    {
        $db=database::getDB();
        $query="SELECT * FROM sach WHERE ten_sach LIKE '%".$ten_sach."%'";
        $statement=$db->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        $statement->closeCursor();
        $objs_sach = array();
        foreach($result as $value)
        {
            $obj_sach = new sach($value['id_the_loai'],
                                 $value['ten_sach'],
                                 $value['id_tac_gia'],
                                 $value['gia'],
                                 $value['link_anh'],
                                 $value['noi_dung'] );
            $objs_sach[]=$obj_sach;
        }
        return $objs_sach;
    }

    public function sua_sach($obj_sach)
    {
        $db=database::getDB();
        $id_sach=$obj_sach->getID_sach();
        $id_the_loai=$obj_sach->getID_the_loai();
        $id_tac_gia=$obj_sach->getID_tac_gia();
        $ten_sach=$obj_sach->getTen_sach();
        $gia=$obj_sach->getGia();
        $link_anh=$obj_sach->getLink_anh();
        $noi_dung=$obj_sach->getNoi_dung();
        $query="UPDATE sach SET id_the_loai= :id_the_loai, id_tac_gia= :id_tac_gia, ten_sach= :ten_sach, gia= :gia,link_anh= :link_anh,noi_dung= :noi_dung WHERE id_sach= :id_sach";
  
        $statement = $db->prepare($query);
        $statement->bindValue(':id_the_loai',$id_the_loai);
        $statement->bindValue(':id_tac_gia',$id_tac_gia);
        $statement->bindValue(':ten_sach',$ten_sach);
        $statement->bindValue(':gia',$gia);
        $statement->bindValue(':link_anh',$link_anh);
        $statement->bindValue(':noi_dung',$noi_dung);
        $statement->bindValue(':id_sach',$id_sach);
        $statement->execute();
        $statement->closeCursor();    
    }

    
    public function xoa_sach($id_sach)
    {
        $db=database::getDB();

        $query= " DELETE FROM sach WHERE id_sach= :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$id_sach);
        $statement->execute();
        $statement->closeCursor();
    }

    public function tong_so_sach()
    {   
        $db=database::getDB();
        $param="tong";
        $query="SELECT COUNT(id_sach) AS $param FROM sach WHERE 1";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetch();
        return $result;
    }

    public function so_sach_theo_the_loai($id_the_loai)
    {   
        $db=database::getDB();
        $param="tong";
        $query="SELECT COUNT(id_sach) AS $param FROM sach WHERE id_the_loai = :id_the_loai";
        
        $statement= $db-> prepare($query);
        $statement->bindValue(':id_the_loai',$id_the_loai);
        $statement->execute();
        $result = $statement-> fetch();
        return $result;
    }


    public static function luot_mua_hien_tai($id_sach)
    {
        $db=database::getDB();
        $query="SELECT da_ban FROM sach WHERE id_sach = :id_sach";
        $statement = $db->prepare($query);
        $statement->bindValue(':id_sach',$id_sach);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();

        return $result;
    }

    public function tang_luot_mua($id_sach,$so_luong)
    {
            $luot_mua_moi = self::luot_mua_hien_tai($id_sach)['da_ban'] + $so_luong;
            $db=database::getDB();
            $query="UPDATE sach SET da_ban= :da_ban WHERE id_sach= :id_sach";
            $statement = $db->prepare($query);
            $statement->bindValue(':da_ban',$luot_mua_moi);
            $statement->bindValue(':id_sach',$id_sach);
            $statement->execute();
            $statement->closeCursor();    
        
    }

    public function top_ban_chay()
    {
        $db=database::getDB();
        $query="SELECT * FROM sach ORDER BY da_ban DESC LIMIT 9";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();

        return $result;
    }

    public function chon_limit($start , $limit, $id_the_loai)
    {
        $db=database::getDB();
        $query="SELECT * FROM sach  WHERE id_the_loai= ".$id_the_loai." LIMIT ".$start.",".$limit;
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;

    }

    public function chon_limit_full($start , $limit)
    {
        $db=database::getDB();
        $query="SELECT * FROM sach LIMIT ".$start.",".$limit;
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;

    }


}


?>