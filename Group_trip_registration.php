<?php
$organizer = $_POST['organizer'];
$contact = $_POST['contact'];
$vehicle = $_POST['vehicle'];
$passenger_number = $_POST['passengerCount'];
$passenger_names = array();
$passenger_types = array();
$reason = $_POST['reason'];
$schedule = $_POST['departure'];
$duration = $_POST['duration'];

$vehicle_prices = [
    "BICYCLE" => 338,
    "MOTORCYCLE" => 1352,
    "PRIVATE CAR" => 3380,
    "6W" => 6084,
    "10W" => 8112,
    "20F" => 14872,
    "40F" => 25688,
    "NONE" => 0
];

$total = $vehicle_prices[$vehicle];

for ($i = 1; $i <= $passenger_number; $i++) {
    $passenger_names[] = $_POST['passenger'][$i - 1];
    $passenger_types[] = $_POST['passengerType'][$i - 1];
}

$passenger_prices = [
    "REGULAR PASSENGER" => 470,
    "STUDENT PASSENGER" => 400,
    "S.CITIZEN PASSENGER" => 335,
    "HALF-FARE PASSENGER" => 235
];

foreach ($passenger_types as $passenger_type) {
    $total += $passenger_prices[$passenger_type];
}

$first_letter = chr(mt_rand(65, 90));
$second_letter = chr(mt_rand(65, 90));
$generate_number = mt_rand(1, 9999);
$final_number = sprintf("%08d", $generate_number);
$prioritization_number = $first_letter . $second_letter . $final_number;

$passengers_list = "<ul>";
for ($i = 0; $i < $passenger_number; $i++) {
    $passengers_list .= "<li>{$passenger_types[$i]} - {$passenger_names[$i]}</li>";
}
$passengers_list .= "</ul>";

$Invoice_html = "
<!DOCTYPE html>
<head>
<title>RESERVATION FORM ( GROUP )</title>
<style>
    h2 {
        font-weight: 900;
        padding-bottom: 10px;
        text-align: center;
        color: #9C2327;
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
        color: #9C2327;
        padding: 20px;
    }

    p {
        color: #232222;
        padding-bottom: 10px;
        margin: 5px 0;
        padding-left: 40px;
    }

    ul {
        padding-left: 60px;
    }
</style>
</head>
<body>
<div class='container'>
    <div class='ticket'>
        <h2>INVOICE TICKET</h2>
        <p><strong>ORGANIZER/REPRESENTATIVE: </strong>$organizer</p>
        <p><strong>VEHICLE: </strong>$vehicle</p>
        <p><strong>REASON FOR VISITING: </strong>$reason</p>
        <p><strong>DEPARTURE SCHEDULE: </strong>$schedule</p>
        <p><strong>STAY DURATION: </strong>$duration</p>
        <p><strong>PASSENGERS:</strong></p>
        $passengers_list
        <p><strong>TOTAL: </strong>PHP $total</p>
        <p><strong>PRIORITIZATION CODE: </strong>$prioritization_number</p>
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