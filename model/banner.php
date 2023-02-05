<?php
class banner
{


    public function danh_sach_banner()
    {
        $db=database::getDB();
        $query="SELECT * FROM banner WHERE 1";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    }


    public function them_banner($link_anh)
    {
        $db=database::getDB();
        $query = "INSERT INTO banner(link_anh)
        VALUES (:link)";
        $statement=$db->prepare($query);
        $statement->bindValue(':link',$link_anh);
        $statement->execute();
        $statement->closeCursor();
    
    }
   
    public function xoa_banner($id_banner)
    {
        $db=database::getDB();
        $query= " DELETE FROM banner WHERE id_banner= :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$id_banner);
        $statement->execute();
        $statement->closeCursor();
    }

    public function max_id_banner()
    {
        $db=database::getDB();
        $query ="SELECT MAX(id_banner) FROM banner";
        $statement=$db->prepare($query);
        $statement->execute();
        $result=$statement->fetch();
        $statement->closeCursor();
        $max=0;
        if(!empty($result))
        {
            $max=$result['MAX(id_banner)'];
        }
        return $max;

    }

    public function chi_tiet_banner($id_banner)
    {
        $db=database::getDB();
        $query ="SELECT * FROM banner WHERE id_banner= :id";
        $statement=$db->prepare($query);
        $statement->bindValue(':id',$id_banner);
        $statement->execute();
        $result=$statement->fetch();
        $statement->closeCursor();

        return $result;

    }

}


?>