<?php
class don_hang
{
    public function dat_hang()
    {   
        $email ="";
        $sdt ="";
        $ten ="";
        $dia_chi ="";
        $ngay= date("d/m/Y");
        $id_thanh_vien=0;
        $tong_tien= gio_hang::thanh_tien();
        $ma_don_hang= rand(0,99999999);
        if(isset($_SESSION['gio_hang']))
        {

            if(isset($_SESSION['login']))
            {
                $ten=$_SESSION['user'];
                $email=$_SESSION['email'];
                $sdt=$_SESSION['sdt'];
                $dia_chi=$_SESSION['dia_chi'];
                $id_thanh_vien=$_SESSION['id_thanh_vien'];
            }
            else
            {
                $ten=filter_input(INPUT_POST,'ten');
                $sdt=filter_input(INPUT_POST,'sdt');
                $email=filter_input(INPUT_POST,'email');
                $dia_chi=filter_input(INPUT_POST,'dia_chi');
            }
        }
        else
        {
            return;
        }

        self::them_don_hang($ma_don_hang,$id_thanh_vien,$tong_tien,$email,$sdt,$ten,$dia_chi);

        foreach($_SESSION['gio_hang'] as $value)
        {
            self::them_chi_tiet_don_hang((int)$ma_don_hang,(int)$value['id_sach'],(int)$value['so_luong']);
        }
               
    }

    public function kiem_tra_sach_da_mua($id_sach, int $id_thanh_vien)
    {   
        $db=database::getDB();
        $query="SELECT * FROM chi_tiet_don_hang INNER JOIN don_hang ON chi_tiet_don_hang.ma_don_hang = don_hang.ma_don_hang WHERE id_sach= $id_sach AND id_thanh_vien= $id_thanh_vien";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetch();
        if(empty($result))
        {
            return false;
        }
        else
        {
            return true;
        }
    }



    public static function them_don_hang($ma_don_hang,$id_thanh_vien,$tong_tien,$email,$sdt,$nguoi_nhan,$dia_chi)
    {
        $db=database::getDB();
        $query = "INSERT INTO don_hang(ma_don_hang,id_thanh_vien,tong_tien,nguoi_nhan,sdt,dia_chi,email)  
        VALUES (:ma_don_hang,:id_thanh_vien,:tong_tien, :nguoi_nhan, :sdt, :dia_chi, :email)";
        $statement=$db->prepare($query);
        $statement->bindValue(':ma_don_hang',$ma_don_hang);
        $statement->bindValue(':id_thanh_vien',$id_thanh_vien);
        $statement->bindValue(':tong_tien',$tong_tien);
        $statement->bindValue(':nguoi_nhan',$nguoi_nhan);
        $statement->bindValue(':sdt',$sdt);
        $statement->bindValue(':dia_chi',$dia_chi);
        $statement->bindValue(':email',$email);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function them_chi_tiet_don_hang($ma_don_hang,$id_sach,$so_luong)
    {
        sach_db::tang_luot_mua($id_sach,$so_luong);
        $db=database::getDB();
        $query = "INSERT INTO chi_tiet_don_hang(ma_don_hang,id_sach,so_luong)  VALUES (:ma_don_hang, :id_sach, :so_luong)";
        $statement=$db->prepare($query);
        
        $statement->bindValue(':ma_don_hang',$ma_don_hang);
        $statement->bindValue(':id_sach',$id_sach);
        $statement->bindValue(':so_luong',$so_luong);

        $statement->execute();
        $statement->closeCursor();
    
    }

    public function xu_ly_don_hang($trang_thai,$id_don_hang)
    {
        $db=database::getDB();

        $query="UPDATE don_hang SET trang_thai = :trang_thai WHERE id_don_hang= :id_don_hang";
  
        $statement = $db->prepare($query);
        $statement->bindValue(':trang_thai',$trang_thai);
        $statement->bindValue(':id_don_hang',$id_don_hang);
        $statement->execute();
        $statement->closeCursor();
    }

    public function danh_sach_don_hang()
    {   
        $db=database::getDB();
        $query="SELECT * FROM don_hang";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetchAll();
        return $result;
    }

    public function chi_tiet_don_hang($ma_don_hang)
    {   
        $db=database::getDB();
        $query="SELECT * FROM chi_tiet_don_hang WHERE ma_don_hang = :ma_don_hang";
        $statement= $db-> prepare($query);
        $statement->bindValue(':ma_don_hang',$ma_don_hang);
        $statement->execute();
        $result = $statement-> fetchAll();
        return $result;
    }

    public function tong_so_don_hang()
    {   
        $db=database::getDB();
        $param="tong";
        $query="SELECT COUNT(id_don_hang) AS $param FROM don_hang WHERE 1";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetch();
        return $result;
    }

    public function tong_so_don_hang_moi()
    {   
        $param="tong";
        $db=database::getDB();
        $query="SELECT COUNT(id_don_hang) AS $param FROM don_hang WHERE trang_thai=0";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetch();
        return $result;
    }

    public function doanh_thu()
    {   
        $param="tong";
        $db=database::getDB();
        $query="SELECT SUM(tong_tien) AS $param FROM don_hang WHERE trang_thai=1";
        $statement= $db-> prepare($query);
        $statement->execute();
        $result = $statement-> fetch();
        return $result;
    }
   



}

?>