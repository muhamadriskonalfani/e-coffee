<?php
    // This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
    // Please refer to this docs for snap popup:
    // https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

    namespace Midtrans;

    require_once dirname(__FILE__) . '/../../Midtrans.php';
    // Set Your server key
    // can find in Merchant Portal -> Settings -> Access keys
    Config::$serverKey = 'SB-Mid-server-fMISnEeoSiLV24ioMd_GbD9R';
    Config::$clientKey = 'SB-Mid-client-ru9bT_3BmIwQiFt5';

    // non-relevant function only used for demo/example purpose
    printExampleWarningMessage();

    // Uncomment for production environment
    // Config::$isProduction = true;
    Config::$isSanitized = Config::$is3ds = true;

    // Menampilkan data tabel tb_pesanan
    include('../../../koneksi.php');
    $orderID = $_GET['order_id'];
    $sqlSelectOrder = mysqli_query($koneksi, "SELECT * FROM tb_pesanan WHERE id_pesanan = '$orderID'");
    $orderData = mysqli_fetch_array($sqlSelectOrder);

    $firstName = $orderData['nama_depan'];
    $lastName = $orderData['nama_belakang'];
    $email = $orderData['alamat_email'];
    $price = $orderData['jumlah_total'];
    $phone = $orderData['nomor_telepon'];
    
    // Required
    $transaction_details = array(
        'order_id' => $orderID,
        'gross_amount' => $price, // no decimal allowed for creditcard
    );
    // Optional
    $item_details = array (
        array(
            'id' => $orderID,
            'price' => $price,
            'quantity' => 1,
            'name' => "Monoline Coffee"
        ),
    );
    // Optional
    $customer_details = array(
        'first_name'    => "$firstName",
        'last_name'     => "$lastName",
        'email'         => "$email",
        'phone'         => "$phone"
    );
    // Fill transaction details
    $transaction = array(
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
    );

    $snap_token = '';
    try {
        $snap_token = Snap::getSnapToken($transaction);
    }
    catch (\Exception $e) {
        echo $e->getMessage();
    }
    // echo "snapToken = ".$snap_token;

    function printExampleWarningMessage() {
        if (strpos(Config::$serverKey, 'your ') != false ) {
            echo "<code>";
            echo "<h4>Please set your server key from sandbox</h4>";
            echo "In file: " . __FILE__;
            echo "<br>";
            echo "<br>";
            echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-fMISnEeoSiLV24ioMd_GbD9R\';');
            die();
        } 
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="pay-button">Pay!</button>
    
    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('<?php echo $snap_token?>');
        };
    </script>
</body>
</html>



