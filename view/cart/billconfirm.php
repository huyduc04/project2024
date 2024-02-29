<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_error', 1);
?>
<div class="row">

    <div class="row mb">
        <div class="boxtrai mr">
            <div class="row mb">

                <div class="boxtitle">CẢM ƠN</div>
                <div class="row boxcontent" style="text-align:center">
                    <h2>Cảm ơn quý khách</h2>

                </div>
                <?php
                if (isset($bill) && (is_array($bill))) {
                    extract($bill);
                } else {
                    echo "123";
                }
                ?>
                <div class="row mb ">
                    <div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
                    <div class="row boxcontent" style="text-align:center">
                        <li>Mã đơn hàng:DAM- <?= $bill['id']; ?></li>
                        <li> -Ngày đặt hàng: <?= $bill['ngaydathang']; ?></li>
                        <li> -Tổng đơn hàng: <?= $bill['total']; ?></li>
                        <li> -Phương thức thanh toán: <?= $bill['bill_pttt']; ?></li>
                    </div>
                </div>

                <div class="row mb ">
                    <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                    <div class="row boxcontent billform" style="text-align:center">

                        <table>


                            <tr>
                                <td>Người đặt hàng</td>
                                <td><?= $bill['bill_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><?= $bill['bill_address']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $bill['bill_email']; ?></td>
                            </tr>
                            <tr>
                                <td>Điện thoại</td>
                                <td><?= $bill['bill_tel']; ?></td>
                            </tr>


                        </table>


                        <div class="row mb">
                            <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
                            <div class="row boxcontent cart">
                                <table>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình</th>
                                        <th>Sản Phẩm</th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Thành Tiền</th>

                                    </tr>
                                    <?php
                                    bill_chi_tiet($billct);
                                    ?>
                                </table>
                            </div>
                        </div>




                    </div>
                </div>


            </div>

        </div>
        <div class="boxphai">
            <?php include "view/boxright.php" ?>
        </div>
    </div>


</div>