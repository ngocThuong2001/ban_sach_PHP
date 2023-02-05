<?php
class url
{
    public static function get_root()
    {
        //Lấy chuỗi URI
        $url= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "/";
        //Xóa bỏ /frame_work/public/ của URI
        $url = str_replace("/sach_hay/" ,'',$url);
        $need = explode("/",$url);
        return $need[0];
    }

    public function get_link($action)
    {
        $link=[self::get_root(),$action];
        return $link;
    }

}
?>