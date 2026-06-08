<?php
$name = $_POST['name'];
$contact = $_POST['contact'];
$reason = $_POST['reason'];
$vehicle = $_POST['vehicle'];
$departure = $_POST['schedule'];
$stay = $_POST['duration'];
$passenger_type = $_POST['passenger_type'];

$total = 0;
$vehicle_prices = [
    "BICYCLE" => 338,
    "MOTORCYCLE" => 1352,
    "PRIVATE CAR" => 3380,
    "6W" => 6084,
    "10W" => 8112,
    "20F" => 14872,
    "40F" => 25688,
    "NONCE" => 0
];

$passenger_prices = [
    "REGULAR PASSENGER" => 470,
    "STUDENT PASSENGER" => 400,
    "S.CITIZEN PASSENGER" => 335,
    "HALF-FARE PASSENGER" => 235
];

$total += $passenger_prices[$passenger_type];

$total += $vehicle_prices[$vehicle];


$Firstletter = chr(mt_rand(65, 90));
$Secondletter = chr(mt_rand(65, 90));

$generate_number = mt_rand(1, 9999);

$final_number = sprintf("%08d", $generate_number);

$prioritization_number = $Firstletter . $Secondletter . $final_number;


$Invoice_html = "
<!DOCTYPE html>
<html lang='en'>
<head>
<title>RESERVATION FORM ( SOLO )</title>
<style>

    h2 {
        font-weight: 900;
        padding-bottom: 10px;
        text-align: center;
        color : #9C2327;
    }
    body {
        background-image: url('Images/Registration_Background.jpg');
        background-size: 100% 100%;
        font-family: Arial, sans-serif;
        background-color: white;
        height: 98vh;
    }
    .container {
        width: 75%;
        margin: 0 auto;
        text-align: left;
        border-radius: 3px;
    }
    .ticket {
        background-color: #F2F1EF;
        color: #232222;
        padding: 20px;
    }
    p {
        padding-bottom: 10px;
        margin: 5px 0;
        padding-left: 40px;
    }
</style>
</head>
<body>
<div class='container'>
    <div class='ticket'>
        <h2>INVOICE TICKET</h2>
        <p><strong>PASSENGER NAME : </strong> $name</p>
        <p><strong>PASSENGER TYPE : </strong> $passenger_type</p>
        <p><strong>REASON FOR VISITING : </strong> $reason</p>
        <p><strong>VEHICLE : </strong> $vehicle</p>
        <p><strong>DEPARTURE SCHEDULE : </strong> $departure</p>
        <p><strong>STAY DURATION : </strong> $stay</p>
        <p><strong><br/>TOTAL : </strong>$total</p>
        <p><strong><br/>PRIORITIZATION CODE : </strong> $prioritization_number</p>
        <p><br/></p>
        <p>P.S. SAVE A PRINT OR TAKE A SCREENSHOT OF YOUR INVOICE TICKET TO PRESENT TO THE COUNTER...</p>
        <p><br/></p>
    </div>
</div>
</body>
</html>
";

echo $Invoice_html;
?>