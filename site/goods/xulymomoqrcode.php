<?php
header('Content-type: text/html; charset=utf-8');


include('./helper-momo.php');


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

$orderInfo = "Thanh toán qua QR MoMo";
$amount = $_POST['tong'];
$orderId = time() . "";
$redirectUrl = "http://localhost:81/watch/site/goods/cart.php?camon";
$ipnUrl = "http://localhost:81/watch/site/goods/cart.php?camon";
$extraData = "";

$requestId = time() . "";
$requestType = "captureWallet";
// $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
//before sign HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $secretKey);
$data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature
);
$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);  // decode json

//Just a example, please check more in there
if ($jsonResult === null || json_last_error() !== JSON_ERROR_NONE) {
    // Có lỗi khi giải mã JSON
    echo "Lỗi giải mã JSON: " . json_last_error_msg();
    // Tùy chọn: bạn có thể in toàn bộ phản hồi để gỡ lỗi:
    // echo "Phản hồi gốc: " . $result;
    exit;
}

if (isset($jsonResult['payUrl'])) {
    header('Location: ' . $jsonResult['payUrl']);
    exit;
} else {
    // Có vấn đề với phản hồi
    echo "Lỗi trong phản hồi: " . print_r($jsonResult, true);
    // Tùy chọn: bạn có thể in toàn bộ phản hồi để gỡ lỗi:
    // echo "Phản hồi gốc: " . $result;
    exit;
}

header('Location: ' . $jsonResult['payUrl']);
