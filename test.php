<?php 
include ('dashboard-header.php');
include ('../function/hotel_invoice_authentication.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hotelInvoiceCopyData = hotelInvoiceCopyView($id);
} else {
    die('Reservation ID not provided.');
}
$bookingComHotelCollects = 0;
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
                            ?>
                            <div>
                                <p>Total Booking.com Amount: </p>
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
                                                            echo '<tr>';
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
                            <!-- summary  -->
                            <div class="flex flex-col mt-2">
                                <div class="-m-1.5">
                                    <div class="p-1.5 w-full inline-block align-middle">
                                        <div class="border border-cyan-950 rounded-lg overflow-hidden">
                                            <table class="w-full">
                                                <thead>
                                                    <tr>
                                                        <th colspan="9" class="px-1 py-1.5 text-center text-black text-lg font-lg capitalize">Summary </th>
                                                    </tr>
                                                    <tr class="bg-cyan-950">
                                                        <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Sl</th>
                                                        <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Payment Method</th>
                                                        <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Amount(BDT)</th>
                                                        <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Commission</th>
                                                        <th scope="col" class="px-1 py-1.5 text-start text-xs font-medium text-white uppercase max-w-[100px]">Commissionable Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-cyan-950">
                                                </tbody>
                                            </table>
                                        </div>
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
