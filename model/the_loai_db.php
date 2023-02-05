<?php
class the_loai_db
{
    public function danh_sach_the_loai()
    {
        $db= database::getDB();
        $query="SELECT * FROM the_loai ";
        $statement= $db->prepare($query);
        $statement->execute();
        $result = $statement-> fetchAll();
        $statement->closeCursor();
        $objs_the_loai = array(); //khởi tạo mảng các đối tượng thể loại
        foreach($result as $value)
        {
            // khởi tạo đối tượng thể loại mới
            $tl=  new the_loai($value['ten_the_loai']); 
            $tl -> setID_the_loai($value['id_the_loai']);
            $tl ->setHien($value['hien']);
            $objs_the_loai[]=$tl; 
        }

    return $objs_the_loai;

    }
    public function danh_sach_the_loai_hien()
    {
        $db= database::getDB();
        $query="SELECT * FROM the_loai WHERE hien = 1 ";
        $statement= $db->prepare($query);
        $statement->execute();
        $result = $statement-> fetchAll();
        $statement->closeCursor();
        $objs_the_loai = array(); //khởi tạo mảng các đối tượng thể loại
        foreach($result as $value)
        {
            // khởi tạo đối tượng thể loại mới
            $tl=  new the_loai($value['ten_the_loai']); 
            $tl -> setID_the_loai($value['id_the_loai']);
            $tl ->setHien($value['hien']);
            $objs_the_loai[]=$tl; 
        }

    return $objs_the_loai;

    }

    public function the_loai_duoc_chon($id_the_loai)
    {
        $db=database::getDB();
        $query = "SELECT * FROM the_loai WHERE id_the_loai = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id_the_loai);
        $statement->execute();
        $result= $statement->fetch();
        $statement->closeCursor();
        $obj_the_loai= new the_loai($result['ten_the_loai']);
        $obj_the_loai->setID_the_loai($result['id_the_loai']);
        return $obj_the_loai;
    }
    public function them_the_loai($obj_the_loai)
    {
        $db=database::getDB();
        $query="INSERT INTO the_loai(ten_the_loai) VALUES (:ten)";
        $statement=$db->prepare($query);
        $statement->bindValue(':ten',$obj_the_loai->getTen_the_loai());
        $statement->execute();
        $statement->closeCursor();
    }

    public function getTen_the_loai($id_the_loai)
    {
        $db=database::getDB();
        $query="SELECT ten_the_loai FROM the_loai WHERE id_the_loai = :id_the_loai";
        $statement = $db->prepare($query);
        $statement->bindValue(':id_the_loai',$id_the_loai);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();

        return $result;
    }


    public function sua_the_loai($obj_the_loai)
    {
        $db=database::getDB();
        $id=$obj_the_loai->getID_the_loai();
        $ten=$obj_the_loai->getTen_the_loai();

        $query="UPDATE the_loai SET ten_the_loai = :ten WHERE id_the_loai= :id ";

        $statement = $db->prepare($query);
        $statement->bindValue(':ten',$ten);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->closeCursor();

    }


    public function an_the_loai($id)
    {
        $db=database::getDB();

        $query="UPDATE the_loai SET hien = 0 WHERE id_the_loai= :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->closeCursor();
    }

    public function hien_the_loai($id)
    {
        $db=database::getDB();

        $query="UPDATE the_loai SET hien = 1 WHERE id_the_loai= :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->closeCursor();
    }



}

?>