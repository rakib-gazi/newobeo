<?php 
include ('dashboard-header.php');
include ('../function/hotel_invoice_authentication.php');
include ('../function/settings_authentication.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hotelInvoiceCopyData = hotelInvoiceCopyView($id);
    $hotelInvoiceCopyDataHotel = hotelInvoiceCopyViewHotel($id);
    $hotelInvoiceCopyDataCommission = hotelInvoiceCopyViewCommission($id);
} else {
    die('Reservation ID not provided.');
}

$ICCommission = null; // Ensure variable is defined
if (mysqli_num_rows($hotelInvoiceCopyDataCommission) > 0) {
    while ($ICCrow = mysqli_fetch_assoc($hotelInvoiceCopyDataCommission)) {
        $ICCommission = $ICCrow['hotel'];
    }
}
if ($ICCommission !== null) { // Ensure $ICHotel is set
    $hotelCommissionData = hotelCommissionInvoiceView($ICCommission);
} 
if ($hotelCommissionData && mysqli_num_rows($hotelCommissionData) > 0) {
    while ($currentCommission = mysqli_fetch_assoc($hotelCommissionData)) {
        $hotelCollectsCommission = $currentCommission['hotelCollects']; // This will show the actual data in the row
        $expediaCollectsCommission = $currentCommission['expediaCollects']; // This will show the actual data in the row
    }
} else {
    $hotelCollectsCommission = 'Not Found';
    $expediaCollectsCommission = 'Not Found';
}
$ICHotel = null; // Ensure variable is defined
if (mysqli_num_rows($hotelInvoiceCopyDataHotel) > 0) {
    while ($ICrow = mysqli_fetch_assoc($hotelInvoiceCopyDataHotel)) {
        $ICHotel = $ICrow['hotel'];
    }
}

if ($ICHotel !== null) { // Ensure $ICHotel is set
    $hotelAddressData = hotelAddressInvoiceView($ICHotel);
} 
if ($hotelAddressData && mysqli_num_rows($hotelAddressData) > 0) {
    while ($currentHotel = mysqli_fetch_assoc($hotelAddressData)) {
        $hotelAddress = $currentHotel['address'] ; // This will show the actual data in the row
    }
} else {
    $hotelAddress = 'Please Add Hotel Address';
}
$bookingComHotelCollects = 0;
$expediaHotelCollects = 0;
$expediaExpedaCollects = 0;
function finalBalance($amount){
    $topNewbalance = $amount;
    return $topNewbalance;
}
var_dump($topNewbalance);
?>
<!-- Sidebar and Content -->
<div class="flex">
    <?php include('dashboard-sidebar.php');?>

    <!-- Main Content -->
    <div class="w-4/5 p-4 font-nunito">
        <div class="container mx-auto mt-12">
            <div class="flex justify-between items-center mb-4 pt-12">
                <h1 class="text-3xl font-bold font-serif capitalize">Hotel Invoice Preview</h1>
                <div class="flex justify-center items-center gap-x-2">
                    <button class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black" onclick="downloadPDF()">
                        <i class="fa-solid fa-download me-4"></i> PDF
                    </button>
                    <a href="all_reservation.php" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black">
                        <i class="fa-solid fa-long-arrow-alt-left me-4"></i>All Invoices
                    </a>
                    <a href="add_bank_invoice.php" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black">
                        <i class="fa-solid fa-long-arrow-alt-left me-4"></i>Go Back
                    </a>
                </div>
            </div>
            <hr class="border border-black">

            <!-- Bank Invoice Preview -->
            <div class="container mx-auto" id="booking_print">
                <div class="max-w-4xl mx-auto bg-white px-4 py-4 shadow-md rounded-lg">
                    <?php 
                    if (mysqli_num_rows($hotelInvoiceCopyData) > 0) {

                        while ($row = mysqli_fetch_assoc($hotelInvoiceCopyData)) {
                            $reservationData = json_decode($row['reservation_data'], true);
                            $invoiceNo = date('d') . date('m') . date('y');
                            // Reset the bookingComHotelCollects for each invoice
                            $bookingComHotelCollects = 0;

                            // Calculate the bookingComHotelCollects
                            foreach ($reservationData as $reservation) {
                                if (is_array($reservation) && 
                                    $reservation['source'] === 'Booking.com' && 
                                    trim($reservation['payment_method']) === 'Hotel  Collects') {
                                    if (isset($reservation['Total'])) {
                                        $bookingComHotelCollects += floatval(str_replace(',', '', $reservation['Total']));
                                    }
                                }
                            }
                            foreach ($reservationData as $reservation) {
                                if (is_array($reservation) && 
                                    $reservation['source'] === 'Expedia' && 
                                    trim($reservation['payment_method']) === 'Hotel  Collects') {
                                    if (isset($reservation['Total'])) {
                                        $expediaHotelCollects += floatval(str_replace(',', '', $reservation['Total']));
                                    }
                                }
                            }
                            foreach ($reservationData as $reservation) {
                                if (is_array($reservation) && 
                                    $reservation['source'] === 'Expedia' && 
                                    trim($reservation['payment_method']) === 'Expedia Collects') {
                                    if (isset($reservation['Total'])) {
                                        $expediaExpedaCollects += floatval(str_replace(',', '', $reservation['Total']));
                                    }
                                }
                            }
                            ?>
                            
                            <!-- Header -->
                            <div class="bg-cyan-950 p-4 rounded-t-lg mb-4 flex justify-between items-center">
                                <img src="../images/logo.png" alt="Logo" class="h-16">
                                <h1 class="text-3xl font-semibold text-white font-obeo">INVOICE</h1>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-12">
                                <!-- Bill to Info -->
                                <div class="p-4 rounded-lg border-2 border-cyan-950">
                                    <h3 class="font-semibold text-medium font-obeo mb-2">Bill to</h3>
                                    <h3 class="font-semibold text-medium font-obeo">General Manager</h3>
                                    <h3 class="font-semibold text-medium font-obeo"><?php echo htmlspecialchars($row['hotel']); ?></h3>
                                    <p class="w-1/2"><?php echo htmlspecialchars($hotelAddress) ; ?></p>
                                </div>
                                <div class="p-4 rounded-lg border-2 border-cyan-950">
                                    <table class="w-full ">
                                        <tr class="text-left">
                                            <th class="w-1/2 font-serif text-sm">Invoice No</th>
                                            <td class="w-1/2 text-black font-rflex text-sm"><?php echo $invoiceNo; ?></td>
                                        </tr>
                                        <tr class="text-left">
                                            <th class="w-1/2 font-serif text-sm">Invoice Date</th>
                                            <td class="w-1/2 text-black font-rflex text-sm"><?php echo date('d-m-Y'); ?></td>
                                        </tr>
                                        <tr class="text-left">
                                            <th class="w-1/2 font-serif text-sm">Amount Due (USD)</th>
                                            <td class="w-1/2 text-black font-rflex text-sm">$<?php echo $topNewbalance[0]; ?></td>
                                        </tr>
                                        <tr class="text-left">
                                            <th class="w-1/2 font-serif text-sm">Printing Time</th>
                                            <td class="w-1/2 text-black font-rflex text-sm"><?php date_default_timezone_set('Asia/Dhaka'); echo date('d-m-Y h:i:s A'); ?></td>
                                        </tr>
                                        <tr class="text-left">
                                            <th class="w-1/2 font-serif text-sm">commsission</th>
                                            <td class="w-1/2 text-black font-rflex text-sm"><?php echo $hotelCollectsCommission , $expediaCollectsCommission; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- Booking.com Hotel collects -->
                            <?php
                                $hasData = false; // Initialize outside to track if any matching reservation is found

                                // First, loop through the data to see if there are any matching reservations
                                foreach ($reservationData as $reservation) {
                                    if (is_array($reservation) && 
                                        $reservation['source'] === 'Booking.com' && 
                                        trim($reservation['payment_method']) === 'Hotel  Collects') {
                                        $hasData = true; // Set to true if a match is found
                                        break; // No need to check further; one match is enough
                                    }
                                }

                                if ($hasData) { // Only display the table if there is at least one matching reservation
                                ?>
                                    <div class="flex flex-col mt-2">
                                        <div class="-m-1.5">
                                            <div class="p-1.5 w-full inline-block align-middle">
                                                <div class="border border-cyan-950 rounded-lg overflow-hidden">
                                                    <table class="w-full">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="9" class="px-1 py-1.5 text-center text-black text-lg font-lg capitalize">Booking.com (Hotel Collects)</th>
                                                            </tr>
                                                            <tr class="bg-cyan-950">
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Sl</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">C/in</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">C/out</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Guest</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Room</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Status</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Price(USD)</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">E/rate(TK)</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Total(TK)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-cyan-950">
                                                            <?php
                                                            $serialNumber = 1;
                                                            $totalSum = 0; // Initialize total sum variable

                                                            foreach ($reservationData as $reservation) {
                                                                if (is_array($reservation) && 
                                                                    $reservation['source'] === 'Booking.com' && 
                                                                    trim($reservation['payment_method']) === 'Hotel  Collects') {
                                                                    
                                                                    echo '<tr class="border border-cyan-950">';
                                                                    echo '<td class="px-1 py-1.5 text-xs font-medium text-black max-w-[100px]">' . htmlspecialchars($serialNumber++) . '</td>';
                                                                    
                                                                    foreach ($reservation as $key => $value) {
                                                                        if ($key === 'reservation_no' || $key === 'source' || $key === 'payment_method') {
                                                                            continue;
                                                                        }
                                                                        echo '<td class="px-1 py-1.5 text-xs font-medium text-black max-w-[100px]">' . htmlspecialchars($value) . '</td>';
                                                                    }
                                                                    echo '</tr>';

                                                                    if (isset($reservation['Total'])) {
                                                                        $totalSum += floatval(str_replace(',', '', $reservation['Total']));
                                                                    }
                                                                }
                                                            }
                                                            // $bookingComHotelCollects = $totalSum;
                                                            

                                                            // Show the total row
                                                            echo '<tr class="border border-cyan-950">';
                                                            echo '<td colspan="7" class="px-1 py-1.5 text-xs font-medium text-black"> </td>';
                                                            echo '<td colspan="1" class="px-1 py-1.5 text-sm font-medium text-black max-w-[100px]">Total: </td>';
                                                            echo '<td colspan="1" class="px-1 py-1.5 text-sm font-medium text-black max-w-[100px]">' . number_format($bookingComHotelCollects, 2) . '</td>';
                                                            echo '</tr>';
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } 
                            ?>
                            <!-- Expedia Hotel collects -->
                            <?php
                                $hasData = false; // Initialize outside to track if any matching reservation is found

                                // First, loop through the data to see if there are any matching reservations
                                foreach ($reservationData as $reservation) {
                                    if (is_array($reservation) && 
                                        $reservation['source'] === 'Expedia' && 
                                        trim($reservation['payment_method']) === 'Hotel  Collects') {
                                        $hasData = true; // Set to true if a match is found
                                        break; // No need to check further; one match is enough
                                    }
                                }

                                if ($hasData) { // Only display the table if there is at least one matching reservation
                                ?>
                                    <div class="flex flex-col mt-2">
                                        <div class="-m-1.5">
                                            <div class="p-1.5 w-full inline-block align-middle">
                                                <div class="border border-cyan-950 rounded-lg overflow-hidden">
                                                    <table class="w-full">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="9" class="px-1 py-1.5 text-center text-black text-lg font-lg capitalize">Expedia (Hotel Collects)</th>
                                                            </tr>
                                                            <tr class="bg-cyan-950">
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Sl</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">C/in</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">C/out</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Guest</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Room</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Status</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Price(USD)</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">E/rate(TK)</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Total(TK)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-cyan-950">
                                                            <?php
                                                            $serialNumber = 1;
                                                            $totalSum = 0; // Initialize total sum variable

                                                            foreach ($reservationData as $reservation) {
                                                                if (is_array($reservation) && 
                                                                    $reservation['source'] === 'Expedia' && 
                                                                    trim($reservation['payment_method']) === 'Hotel  Collects') {
                                                                    
                                                                    echo '<tr class="border border-cyan-950">';
                                                                    echo '<td class="px-1 py-1.5 text-xs font-medium text-black max-w-[100px]">' . htmlspecialchars($serialNumber++) . '</td>';
                                                                    
                                                                    foreach ($reservation as $key => $value) {
                                                                        if ($key === 'reservation_no' || $key === 'source' || $key === 'payment_method') {
                                                                            continue;
                                                                        }
                                                                        echo '<td class="px-1 py-1.5 text-xs font-medium text-black max-w-[100px]">' . htmlspecialchars($value) . '</td>';
                                                                    }
                                                                    echo '</tr>';

                                                                    if (isset($reservation['Total'])) {
                                                                        $totalSum += floatval(str_replace(',', '', $reservation['Total']));
                                                                    }
                                                                }
                                                            }
                                                            $expediaHotelCollects = $totalSum;

                                                            // Show the total row
                                                            echo '<tr class="border border-cyan-950">';
                                                            echo '<td colspan="7" class="px-1 py-1.5 text-xs font-medium text-black"> </td>';
                                                            echo '<td colspan="1" class="px-1 py-1.5 text-sm font-medium text-black max-w-[100px]">Total: </td>';
                                                            echo '<td colspan="1" class="px-1 py-1.5 text-sm font-medium text-black max-w-[100px]">' . number_format($totalSum, 2) . '</td>';
                                                            echo '</tr>';
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } 
                            ?>
                            <!-- Expedia expedia collects -->
                            <?php
                                $hasData = false; // Initialize outside to track if any matching reservation is found

                                // First, loop through the data to see if there are any matching reservations
                                foreach ($reservationData as $reservation) {
                                    if (is_array($reservation) && 
                                        $reservation['source'] === 'Expedia' && 
                                        trim($reservation['payment_method']) === 'Expedia Collects') {
                                        $hasData = true; // Set to true if a match is found
                                        break; // No need to check further; one match is enough
                                    }
                                }

                                if ($hasData) { // Only display the table if there is at least one matching reservation
                                ?>
                                    <div class="flex flex-col mt-2">
                                        <div class="-m-1.5">
                                            <div class="p-1.5 w-full inline-block align-middle">
                                                <div class="border border-cyan-950 rounded-lg overflow-hidden">
                                                    <table class="w-full">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="9" class="px-1 py-1.5 text-center text-black text-lg font-lg capitalize">Expedia (Expedia Collects)</th>
                                                            </tr>
                                                            <tr class="bg-cyan-950">
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Sl</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">C/in</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">C/out</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Guest</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Room</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Status</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Price(USD)</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">E/rate(TK)</th>
                                                                <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Total(TK)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-cyan-950">
                                                            <?php
                                                            $serialNumber = 1;
                                                            $totalSum = 0; // Initialize total sum variable

                                                            foreach ($reservationData as $reservation) {
                                                                if (is_array($reservation) && 
                                                                    $reservation['source'] === 'Expedia' && 
                                                                    trim($reservation['payment_method']) === 'Expedia Collects') {
                                                                    
                                                                    echo '<tr class="border border-cyan-950">';
                                                                    echo '<td class="px-1 py-1.5 text-xs font-medium text-black max-w-[100px]">' . htmlspecialchars($serialNumber++) . '</td>';
                                                                    
                                                                    foreach ($reservation as $key => $value) {
                                                                        if ($key === 'reservation_no' || $key === 'source' || $key === 'payment_method') {
                                                                            continue;
                                                                        }
                                                                        echo '<td class="px-1 py-1.5 text-xs font-medium text-black max-w-[100px]">' . htmlspecialchars($value) . '</td>';
                                                                    }
                                                                    echo '</tr>';

                                                                    if (isset($reservation['Total'])) {
                                                                        $totalSum += floatval(str_replace(',', '', $reservation['Total']));
                                                                    }
                                                                }
                                                            }
                                                            $expediaExpedaCollects = $totalSum ;

                                                            // Show the total row
                                                            echo '<tr class="border border-cyan-950">';
                                                            echo '<td colspan="7" class="px-1 py-1.5 text-xs font-medium text-black"> </td>';
                                                            echo '<td colspan="1" class="px-1 py-1.5 text-sm font-medium text-black max-w-[100px]">Total: </td>';
                                                            echo '<td colspan="1" class="px-1 py-1.5 text-sm font-medium text-black max-w-[100px]">' . number_format($totalSum, 2) . '</td>';
                                                            echo '</tr>';
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } 
                            ?>
                            <!-- summary  -->
                            <?php if ($bookingComHotelCollects > 0 || $expediaHotelCollects > 0 || $expediaExpedaCollects > 0) {
                                $i = 1; ?>
                                <div class="flex flex-col mt-2">
                                    <div class="-m-1.5">
                                        <div class="p-1.5 w-full inline-block align-middle">
                                            <div class="border border-cyan-950 rounded-lg overflow-hidden">
                                                <table class="w-full">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="9" class="px-1 py-1.5 text-center text-black text-lg font-lg capitalize">Accounts Summary </th>
                                                        </tr>
                                                        <tr class="bg-cyan-950">
                                                            <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Sl</th>
                                                            <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Payment Method</th>
                                                            <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Amount(BDT)</th>
                                                            <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Commission</th>
                                                            <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[150px]">Comm. Amount</th>
                                                            <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Total</th>
                                                            <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[200px]">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-cyan-950">
                                                        <?php if ($bookingComHotelCollects > 0) {
                                                            $commissionableAmountBooking = $bookingComHotelCollects * ((int)$hotelCollectsCommission / 100); 
                                                        ?>
                                                            <tr class="border border-cyan-950">
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo $i++ ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black">Booking.com (Hotel Collects)</td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($bookingComHotelCollects, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo $hotelCollectsCommission;?>%</td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($commissionableAmountBooking, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($commissionableAmountBooking, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black">Receiveable From Hotel</td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php if ($expediaHotelCollects > 0) {
                                                            $commissionableAmountHotel = $expediaHotelCollects *((int)$hotelCollectsCommission / 100); // 20% commission expediaCollectsCommission
                                                        ?>
                                                            <tr class="border border-cyan-950">
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo $i++ ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black">Expedia (Hotel Collects)</td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($expediaHotelCollects, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo $hotelCollectsCommission;?>%</td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($commissionableAmountHotel, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($commissionableAmountHotel, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black">Receiveable From Hotel</td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php if ($expediaExpedaCollects > 0) {
                                                            $commissionableAmountExpedia = $expediaExpedaCollects * ((int)$expediaCollectsCommission / 100); // 20% commission
                                                            $afterCommissionableAmountExpedia = $expediaExpedaCollects -$commissionableAmountExpedia;
                                                            

                                                        ?>
                                                            <tr class="border border-cyan-950">
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo $i++ ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black">Expedia (Expedia Collects)</td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($expediaExpedaCollects, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo $expediaCollectsCommission;?>%</td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($commissionableAmountExpedia, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black"><?php echo number_format($afterCommissionableAmountExpedia, 2) ?></td>
                                                                <td class="px-1 py-1.5 text-xs font-medium text-black">Payable To Hotel</td>
                                                            </tr>
                                                            
                                                        <?php } ?>
                                                        <?php 
                                                        $newTotal = (($commissionableAmountBooking ?? 0) + ($commissionableAmountHotel ?? 0)) - ($afterCommissionableAmountExpedia ?? 0);


                                                        // Check if the result is positive or negative and set the status
                                                        $status = $newTotal > 0 ? true : false;

                                                        // Remove the minus sign if the result is negative
                                                      
                                                        $formattedAmount = abs($newTotal);
                                                        $roundedAmount = round($formattedAmount);
                                                        $topNewbalance = finalBalance($roundedAmount);

                                                        $totalComission = round(
                                                            ($commissionableAmountBooking ?? 0) +
                                                            ($commissionableAmountHotel ?? 0) +
                                                            ($commissionableAmountExpedia ?? 0)
                                                        );
                                                        ?>

                                                            <tr class="border border-cyan-950">
                                                                <td colspan="3" class="px-1 py-1.5 text-xs font-medium text-black"> </td>
                                                                <td colspan="1" class="px-1 py-1.5 text-sm font-medium text-black max-w-[100px]">Total: </td>
                                                                <td colspan="1" class="px-1 py-1.5 text-sm font-medium text-black max-w-[100px]"><?php echo number_format($totalComission, 2)?></td>
                                                                <td colspan="1" class="px-1 py-1.5 text-sm font-medium <?php echo $status? 'text-black' : 'text-red-600' ?> max-w-[100px]"><?php echo number_format($roundedAmount, 2)?> </td>
                                                                <td colspan="1" class="px-1 py-1.5 text-sm font-medium <?php echo $status? 'text-black' : 'text-red-600' ?>"><?php echo $status? 'Receiveable From Hotel' : 'Payable To Hotel' ?></td>
                                                            </tr>
                                                       <?php  ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            
                            <!-- Footer -->
                            <div class="bg-cyan-950 px-8 py-4 rounded-b-lg my-4 shadow shadow-black grid grid-cols-2">
                                <div>
                                    <div class="flex justify-start items-center gap-x-4">
                                        <p class=""><i class="fa-solid fa-phone-flip text-white text-medium"></i></p>
                                        <p class="text-white font-semibold text-sm">+880-181 000 4180</p>
                                    </div>
                                    <div class="flex justify-start items-center gap-x-4">
                                        <p class=""><i class="fa-solid fa-globe text-white text-medium"></i></p>
                                        <p class="text-white font-semibold text-sm">obeorooms.com</p>
                                    </div>
                                    <div class="flex justify-start items-center gap-x-4">
                                        <p class=""><i class="fa-solid fa-envelope text-white text-medium"></i></p>
                                        <p class="text-white font-semibold text-sm">contact@obeorooms.com</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col justify-center items-start">
                                        <p class="text-white font-semibold text-sm">Office Address</p>
                                        <p class="text-white text-sm">123 Main Street,</p>
                                        <p class="text-white text-sm">Springfield, IL 62701</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p>No hotel invoice data found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include ('dashboard-footer.php'); ?>