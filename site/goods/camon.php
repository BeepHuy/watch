<?php
if (isset($_GET['partnerCode'])) {
    $code_order = rand(0, 9999);
    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];

    //insert db tbl_momo
    $insert_momo = "INSERT INTO tbl_momo(
    partner_code, order_id, amount, order_info, oder_type, trans_id, pay_type, code_cart)
    VALUES('" . $partnerCode . "', '" . $orderId . "', '" . $amount . "', '" . $orderInfo . "', '" . $orderType . "', '" . $transId . "', '" . $payType . "', '" . $code_order . "')";
    $cart_query = mysqli_query($mysql, $insert_momo);

    if ($cart_query) {
        echo '<h3>Giao dịch MOMO thành công!</h3>';
    } else {
        echo '<h3>Giao dịch thất bại</h3>';
    }
}
