<?php 
    function  loadall_DanhMucTinTuc(){
        $sql= 'SELECT * FROM danhmuctintuc ORDER BY id_danhmuc DESC';
        $listDM = pdo_query($sql);
        return $listDM;
        
    }

    function insert_tintuc($tieude, $noidung, $filename, $iddm){
        $sql = "INSERT INTO tintuc(tieu_de, noi_dung,hinh_anh,id_danh_muc)
        VALUES ('$tieude','$noidung','$filename','$iddm')";
        
        pdo_execute($sql);

    }

    function loadall_TinTuc(){
        $sql = "SELECT id,tieu_de,noi_dung,hinh_anh, ten_danhmuc, danhmuctintuc.id_danhmuc 
        FROM tintuc INNER JOIN danhmuctintuc ON tintuc.id_danh_muc = danhmuctintuc.id_danhmuc
        ORDER BY id DESC";
        $listTt = pdo_query($sql);
        return $listTt;
    }

    function loadTinTucById($id){
        $sql = "SELECT * FROM tintuc WHERE id = '$id'";
        $tintuc = pdo_query_one($sql);
        return $tintuc;
    }

    //Không thay đổi hình ảnh
    function update_tintucTh2($id,$tieu_de,$noi_dung,$id_danh_muc){
        $sql = "UPDATE tintuc
        SET tieu_de = '$tieu_de',
        noi_dung = '$noi_dung',
        id_danh_muc = '$id_danh_muc'
        WHERE id = '$id'";
        // echo $sql;
        // die();
        pdo_execute($sql);
    }

    // thay đổi cả hình ảnh
    function update_tintucTh1($id,$tieu_de,$noi_dung,$filename,$id_danh_muc){
        $sql = "UPDATE tintuc
        SET tieu_de = '$tieu_de',
        noi_dung = '$noi_dung',
        id_danh_muc = '$id_danh_muc',
        hinh_anh = '$filename'
        WHERE id = '$id'";
        // echo $sql;
        // die();
        pdo_execute($sql);
    }

    function delete_TinTuc($id){
        $sql = "DELETE FROM tintuc WHERE id = '$id'";
        pdo_execute($sql);
    }
?>