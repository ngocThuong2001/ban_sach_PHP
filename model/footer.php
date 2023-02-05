<?php
class footer
{


    public function noi_dung_footer()
    {
        $db=database::getDB();
        $query="SELECT * FROM footer WHERE 1";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    }
 
    public function sua_footer($noi_dung)
    {
        $db=database::getDB();
        $query= "UPDATE footer SET  noi_dung = :nd WHERE id_footer= 1 ";
        $statement = $db->prepare($query);
        $statement->bindValue(':nd',$noi_dung);
        $statement->execute();
        $statement->closeCursor();
    }

}


?>