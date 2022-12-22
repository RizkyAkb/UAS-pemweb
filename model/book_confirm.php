<?php

if(isset($_POST['check'])){
    $status = '';
    $result = '';
    
    $checkInDate = new DateTime($_POST['checkIn']);
    $checkOutDate = new DateTime($_POST['checkOut']);

    if ($checkInDate == $checkOutDate) {
        $status = 'check_in_out_equal';
        $result = json_encode(['status' => $status]);
    } elseif ($checkInDate > $checkOutDate) {
        $status = 'check_in_earlier';
        $result = json_encode(['status' => $status]);
    }

    if ($status != '') {
        echo $result;
    } else {
        session_start();
        $countDay = date_diff($checkInDate, $checkOutDate)->days;
        $subTotal = $_SESSION['room']['price'] * $countDay;

        $_SESSION['room']['subtotal'] = $subTotal;

        $result = json_encode(["status" => 'available', "days" => $countDay, "subTotal" => $subTotal]);
        echo $result;
    }

}


?>