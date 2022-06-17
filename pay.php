<?php
try {
    $apiKey = "rzp_test_TZZFBpHc7KQlbn";
    $apiSecret = "M478j0AD2csTJLDJhy9reebF";
    $ch = curl_init("https://api.razorpay.com/v1/orders");
    # Setup request to send json via POST.
    $payload = json_encode(array("amount" => (int)$_GET["amt"] * 100, "currency" => "INR"));
    $headers = array(
        "Content-Type: application/json",
        "Authorization: Basic cnpwX3Rlc3RfVFpaRkJwSGM3S1FsYm46TTQ3OGowQUQyY3NUSkxESmh5OXJlZWJG",
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    # Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be
    # Send request.
    $result = curl_exec($ch);
    if ($result === false) {
        throw new Exception(curl_error($ch), curl_errno($ch));
    } else {
        // header('Content-Type: application/json; charset=utf-8');
        // echo json_encode(array("id" => $result["id"]));
        echo $result;
    }
} catch (Exception $e) {
    var_dump($e);
} finally {
    // Close curl handle unless it failed to initialize
    if (is_resource($ch)) {
        curl_close($ch);
    }
}
