<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <form action="index.php?act=billconfirm" method="post">
                <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                <div class="row boxcontent cart">

                    <table>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['name'];
                            $address = $_SESSION['user']['address'];
                            $email = $_SESSION['user']['email'];
                            $tel = $_SESSION['user']['tel'];
                        } else {
                            $name = "";
                            $address = "";
                            $email = "";
                            $tel = "";
                        }

                        ?>

                        <tr>
                            <td>Người đặt hàng</td>
                            <td><input type="text" name="name" value="<?= $name ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="address" value="<?= $address ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?= $email ?>"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="tel" value="<?= $tel ?>"></td>
                        </tr>


                    </table>

                    <div class="row mb">
                        <div class="boxtitle">Phương Thức Thanh Toán</div>
                        <div class="row boxcontent">
                            <table>
                                <tr>
                                    <td><input type="radio" value="1" name="pttt" id="" checked>Trả tiền khi nhận hàng</td>
                                    <td><input type="radio" value="2" name="pttt" id="">Chuyển khoản ngân hàng</td>
                                    <td><input type="radio" value="3" name="pttt" id="">Thanh toán online</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mb">
                        <div class="boxtitle">GIỎ HÀNG</div>
                        <div class="row boxcontent cart">
                            <table>


                                <?php
                                viewcart(0);
                                ?>


                                <!--<tr>
                        <th>Hình</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        <th>Thao Tác</th>
                    </tr> -->
                            </table>
                        </div>
                    </div>



                    <div class="row mb bill">
                        <a href="index.php?act=billconfirm"> <input type="submit" name="dongydathang" value="ĐỒNG Ý ĐẶT HÀNG"></a>
                    </div>

            </form>
        </div>
    </div>

</div>
    <div class="boxphai">
        <?php include "view/boxright.php" ?>
    </div>
</div>