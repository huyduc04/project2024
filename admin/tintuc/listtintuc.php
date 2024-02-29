<div class="row">
    <div class="row frmtitle mb">
        <h1>DANH SÁCH TIN TỨC</h1>
    </div>
    <!-- <form action="index.php?act=listtintuc" method="post">
        <input type="text" name="kyw">
        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>

        </select>
        <input type="submit" name="listok" value="GO">
    </form> -->
    <div class="row frmcontent">

        <div class="row mb10 frmdsloai">
            <table>
                <!-- Tiêu đề cho các cột -->
                <tr>
                    <th></th>
                    <th>MÃ TIN TỨC</th>
                    <th>TIÊU ĐỀ</th>
                    <th>NỘI DUNG</th>
                    <th>HÌNH ẢNH</th>
                    <th>DANH MỤC TIN TỨC</th>
                    <th>CHỨC NĂNG</th>

                </tr>
                <?php
                foreach ($listTinTuc as $tintuc) {
                    extract($tintuc);
                    $suasp = "index.php?act=suatt&id=" . $id;
                    $xoasp = "index.php?act=xoatt&id=" . $id;
                    $hinhpath = "../upload/" . $hinh_anh;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "no photo";
                    }

                    echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $tieu_de . '</td>
                                <td>' . $noi_dung . '</td>
                                <td>' . $hinh . '</td>
                                <td>' . $ten_danhmuc . '</td>
                                <td><a href="' . $suasp . '"><input type="button" value="Sửa"></a> 
                                    <a onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"href="' . $xoasp . '"><input type="button" value="Xóa"></a>
                                </td>
                            </tr>';
                }

                ?>

            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã Chọn">
            <a href="index.php?act=addtintuc ">
                <input type="button" value="Nhập Thêm">
            </a>
        </div>
    </div>

</div>