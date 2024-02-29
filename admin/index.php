<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
//
include "../model/tintuc.php";
//
include "header.php";

//controller

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            //Kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }

            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }

            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

            /* controller sản phẩm */
        case 'addsp':
            //Kiểm tra xem người dùng có click vào nút add hay không 
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file". htmlspecialchars( basename($_FILES["fileToUpload"]["name"]))." has been uploaded.";
                } else {
                    //     echo "Sorry, there was an error uploading your file.";
                }

                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                echo '<script>alert("Thêm sản phẩm thành công")</script>';
            }
            $listdanhmuc = loadall_danhmuc();

            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                echo '<script>alert("Sửa thành công")</script>';
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'dsbl':
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;


//thêm tin tức
        case 'addtintuc':
            $errTieuDe = '';
            $errNoiDung = '';
            $errHinhAnh = '';

            $tieude = '';
            $noidung = '';
            $filename = '';
            $iddm = '';

            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tieude = $_POST['tieude'];
                $noidung = $_POST['noidung'];
                $filename = $_FILES['hinh']['name'];
                $iddm = $_POST['iddm'];
                $isCheck = true;

                if (!$tieude) {
                    $isCheck = false;
                    $errTieuDe = 'Bạn k đc để trống';
                }

                if (!$noidung) {
                    $isCheck = false;
                    $errNoiDung = 'Bạn k đc để trống';
                }

                if (!$filename) {
                    $isCheck = false;
                    $errHinhAnh = 'Bạn k đc để trống';
                }

                if ($isCheck) {
                    $filename = time() . $filename;
                    $target_dir = '../upload/';
                    $target_file = $target_dir . basename($filename);

                    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                        insert_tintuc($tieude, $noidung, $filename, $iddm);
                        $thongbao = "Thêm dữ liệu thành công";
                    } else {
                        $thongbao = "upload ảnh bị lỗi";
                    }
                }
            }
            $listdanhmuc = loadall_DanhMucTinTuc();
            include('tintuc/add.php');
            break;
            //list tin tức
        case 'listtintuc':
            $listTinTuc = loadall_TinTuc();
            include('tintuc/listtintuc.php');
            break;
            //sửa tin tức
        case 'suatt':
            $errTieuDe = '';
            $errNoiDung = '';
            $errHinhAnh = '';

            $tieu_de = '';
            $noi_dung = '';
            $filename = '';
            $id_danh_muc = '';
            if (isset($_GET['id']) && $_GET["id"] > 0) {
                $id = $_GET['id'];
                //lấy ds danh mục tin tức 
                $listdanhmuc = loadall_DanhMucTinTuc();
                //lấy thông tin tin tức theo id
                $tintuc = loadTinTucById($id);
                include 'tintuc/update.php';
            } else {
                echo "Không tìm thấy tin tức";
            }
            break;
        case 'updatett':
            //khởi tạo giá trị rỗng
            $errTieuDe = '';
            $errNoiDung = '';
            $tintuc = [
                'id' => '',
                'id_danh_muc' => '',
                'tieu_de' => '',
                'noi_dung' => ''
            ];
            if (isset($_POST["capnhat"]) && $_POST["capnhat"]) {
                //gán giá trị
                $tintuc['id'] = $_POST['id'];
                $tintuc['id_danh_muc'] = $_POST['id_danh_muc'];
                $tintuc['tieu_de'] = $_POST['tieu_de'];
                $tintuc['noi_dung'] = $_POST['noi_dung'];
                $filename = $_FILES['hinh']['name'];

                //validate

                $isCheck = true;
                if (!$tintuc['tieu_de']) {
                    $isCheck = false;
                    $errTieuDe = 'Bạn k đc để trống';
                }

                if (!$tintuc['noi_dung']) {
                    $isCheck = false;
                    $errNoiDung = 'Bạn k đc để trống';
                }

                if (!$isCheck) {
                    // nếu lỗi quay trở lại form chỉnh sửa

                    //lấy ds danh mục tin tức 
                    $listdanhmuc = loadall_DanhMucTinTuc();

                    include('tintuc/update.php');
                } else {
                    //Nếu không lỗi
                    //cập nhật thông tin tin tức
                    if ($filename) {
                        //TH1 có hình ảnh
                        $filename = time() . $filename;
                        $target_dir = '../upload/';
                        $target_file = $target_dir . basename($filename);
                        // echo $target_file;

                        if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                            //update dữ liệu
                            update_tintucTh1($tintuc['id'], $tintuc['tieu_de'], $tintuc['noi_dung'], $filename, $tintuc['id_danh_muc']);
                            $thongbao = "cập nhật dữ liệu thành công";
                        }
                    } else {
                        //TH2 không có hình ảnh
                        update_tintucTh2($tintuc['id'], $tintuc['tieu_de'], $tintuc['noi_dung'], $tintuc['id_danh_muc']);
                        $thongbao = "cập nhật dữ liệu thành công";

                        $listTinTuc = loadall_TinTuc();
                        include 'tintuc/listtintuc.php';
                    }
                }
            }
            break;

        case 'xoatt':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_TinTuc($id);
            }
            $listTinTuc = loadall_TinTuc();
            include('tintuc/listtintuc.php');
            break;



        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}


include "footer.php";
