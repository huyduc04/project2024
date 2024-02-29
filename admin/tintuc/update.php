<?php 
    if(is_array($tintuc)){
        extract($tintuc);
    }
?>
<div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI TIN TỨC</h1>
    </div>
    <div class="row frmcontent">
        <!-- Thông báo -->
        <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
        <!-- form chỉnh sửa -->
        <form action="index.php?act=updatett" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                <!-- Danh mục tin tức -->
                <strong>Danh mục tin tức</strong><br>
                <select name="id_danh_muc">
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option '.($id_danhmuc == $id_danh_muc ?'selected':'').'value="' . $id_danhmuc . '">' . $ten_danhmuc . '</option>';
                    }
                    ?>
                </select>
            </div>
            <!-- Tiêu đề -->
            <div class="row mb10">
                <strong>Tiêu đề</strong><br>
                <input type="text" name="tieu_de" value="<?= $tieu_de ?>">
                <span style="color: red"><?= $errTieuDe ?></span>
            </div>

            <!-- Hình ảnh -->
            <div class="row mb10">
                <strong>Hình ảnh</strong><br>
                <input type="file" name="hinh">
                <img src="../upload/<?= $hinh_anh ?>" alt="" width="150px">
            </div>

            <!-- Nội dung -->
            <div class="row mb10">
                <strong>Nội dung</strong><br>
                <textarea name="noi_dung" cols="30" rows="10"><?= $noi_dung ?></textarea>
                <span style="color:red"><?= $errNoiDung ?></span>
            </div>

            <div class="row mb10">
                <!--  -->
                <input type="hidden" name="id" value="<?=$tintuc['id'] ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listtintuc"><input type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>
</div>