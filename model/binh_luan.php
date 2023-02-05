<?php 
class binh_luan
{
    public function them_binh_luan($id_sach,int $id_thanh_vien, $noi_dung, $star)
    {
        $db=database::getDB();
        $query = "INSERT INTO binh_luan(id_sach,id_thanh_vien,noi_dung,star)
        VALUES (:id_sach,:id_thanh_vien,:noi_dung,:star)";       
        $statement=$db->prepare($query);
        $statement->bindValue(':id_sach',$id_sach);
        $statement->bindValue(':id_thanh_vien',$id_thanh_vien);
        $statement->bindValue(':noi_dung',$noi_dung);
        $statement->bindValue(':star',$star);
        $statement->execute();
        $statement->closeCursor();
    }

    public function xem_binh_luan(int $id_thanh_vien)
    {
        $db=database::getDB();
        $query="SELECT * FROM binh_luan WHERE id_thanh_vien = :id_thanh_vien";
        $statement = $db->prepare($query);
        $statement->bindValue(':id_thanh_vien',$id_thanh_vien);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    }

    public function da_binh_luan(int $id_thanh_vien)
    {
        $db=database::getDB();
        $query="SELECT * FROM binh_luan WHERE id_thanh_vien = :id_thanh_vien";
        $statement = $db->prepare($query);
        $statement->bindValue(':id_thanh_vien',$id_thanh_vien);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        if(empty($result))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function danh_sach_binh_luan($id_sach)
    {
        $db=database::getDB();
        $query="SELECT * FROM binh_luan INNER JOIN thanh_vien ON binh_luan.id_thanh_vien = thanh_vien.id_thanh_vien WHERE id_sach = :id_sach";
        $statement = $db->prepare($query);
        $statement->bindValue(':id_sach',$id_sach);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;  
    }

    public function sua_binh_luan($id_binh_luan,$noi_dung,$star)
    {
        $db=database::getDB();

        $query="UPDATE sach SET noi_dung= :noi_dung,star= :star WHERE id_binh_luan= :id_binh_luan";
        $statement = $db->prepare($query);
        $statement->bindValue(':noi_dung',$noi_dung);
        $statement->bindValue(':star',$star);
        $statement->bindValue(':id_binh_luan',$id_binh_luan);
        $statement->execute();
        $statement->closeCursor();    
    }

    public function trung_binh_star($id_sach)
    {

    }



}
?>