<?php
class tac_gia_db
{
    public function danh_sach_tac_gia()
    {   
        $db=database::getDB();
        $query="SELECT * FROM tac_gia";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetchAll();
        $statement-> closeCursor();
        $objs_tac_gia = array();
        foreach($result as $value)
            {
                $obj_tac_gia = new tac_gia($value['ten_tac_gia'],
                                           $value['but_danh'],
                                           $value['ngay_sinh'],
                                           $value['que_quan'],
                                           $value['link_anh'] );
                                           $obj_tac_gia ->setID_tac_gia($value['id_tac_gia']);
                $objs_tac_gia[]=$obj_tac_gia;
            }
            return $objs_tac_gia;
    }

    public function getTen_tac_gia($id_tac_gia)
    {
        $db=database::getDB();
        $query="SELECT ten_tac_gia FROM tac_gia WHERE id_tac_gia = :id_tac_gia";
        $statement = $db->prepare($query);
        $statement->bindValue(':id_tac_gia',$id_tac_gia);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();

        return $result;
    }

    public function tac_gia_duoc_chon($id_tac_gia)
    {

        $db=database::getDB();
        $query="SELECT * FROM tac_gia WHERE id_tac_gia =:id";
        $statement= $db-> prepare($query);
        $statement->bindValue(':id',$id_tac_gia);
        $statement->execute();
        $result = $statement-> fetch();
       
        $obj_tac_gia = new tac_gia($result['ten_tac_gia'],
                                $result['but_danh'],
                                $result['ngay_sinh'],
                                $result['que_quan'],
                                $result['link_anh']);
                                $obj_tac_gia->setID_tac_gia($result['id_tac_gia']);
        $statement-> closeCursor();
            return $obj_tac_gia;
    }
    
    public function max_id_tac_gia()
    {
        $db=database::getDB();
        $query="SELECT MAX(id_tac_gia) AS max_id_tac_gia FROM tac_gia WHERE 1";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetch();
        $statement-> closeCursor();
        $max=0;
        if(!empty($result))
        {
            $max=$result['max_id_tac_gia'];
        }        
        return $max;

    }
    public function check_trung_ten_tac_gia($ten_tac_gia)
    {
        $db=database::getDB();
        $query="SELECT * FROM tac_gia WHERE ten_tac_gia = :ten_tac_gia";
        $statement=$db->prepare($query);
        $statement->bindValue(':ten_tac_gia',$ten_tac_gia);
        $statement->execute();
        $result=$statement->fetchAll();
        $objs_tac_gia = array();
        foreach($result as $value)
        {
            $obj_tac_gia = new tac_gia($value['ten_tac_gia'],
                                 $value['but_danh'],
                                 $value['ngay_sinh'],
                                 $value['que_quan'],
                                 $value['link_anh'] );
            $objs_tac_gia[]=$obj_tac_gia;
        }
        return $objs_tac_gia;
    }
    public function them_tac_gia($obj_tac_gia)
    {
        $db=database::getDB();
        $query = "INSERT INTO tac_gia(ten_tac_gia,but_danh,ngay_sinh,que_quan,link_anh)
        VALUES (:ten,:but_danh,:ngay_sinh,:que_quan,:link)";
        $statement=$db->prepare($query);
        $statement->bindValue(':ten',$obj_tac_gia->getTen_tac_gia());
        $statement->bindValue(':but_danh',$obj_tac_gia->getBut_danh());
        $statement->bindValue(':ngay_sinh',$obj_tac_gia->getNgay_sinh());
        $statement->bindValue(':que_quan',$obj_tac_gia->getQue_quan());
        $statement->bindValue(':link',$obj_tac_gia->getLink_anh());

        $statement->execute();
        $statement->closeCursor();
    }

    public function sua_tac_gia($obj_tac_gia)
    {
        $db=database::getDB();
        $id=$obj_tac_gia->getID_tac_gia();
        $ten=$obj_tac_gia->getTen_tac_gia();
        $but=$obj_tac_gia->getBut_danh();
        $ngay=$obj_tac_gia->getNgay_sinh();
        $que=$obj_tac_gia->getQue_quan();
        $link=$obj_tac_gia->getLink_anh();

        $query="UPDATE tac_gia SET ten_tac_gia = :ten,
                                    but_danh = :but,
                                    ngay_sinh = :ngay,
                                    que_quan = :que,
                                    link_anh = :link,
         WHERE id_the_loai= :id ";

        $statement = $db->prepare($query);
        $statement->bindValue(':ten',$ten);
        $statement->bindValue(':but',$but);
        $statement->bindValue(':ngay',$ngay);
        $statement->bindValue(':que',$que);
        $statement->bindValue(':link',$link);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->closeCursor();
    }

    
    public function xoa_tac_gia($obj_tac_gia)
    {
        $db=database::getDB();
        $id=$obj_tac_gia->getID_tac_gia();
        $query=" DELETE FROM tac_gia WHERE id_tac_gia= :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->closeCursor();
    }

    public function tong_so_tac_gia()
    {   
        $db=database::getDB();
        $param="tong";
        $query="SELECT COUNT(id_tac_gia) AS $param FROM tac_gia WHERE 1";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetch();
        return $result;
    }

}

?>