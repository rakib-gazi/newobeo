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
$expediaHotelCollects = 0;
$expediaExpedaCollects = 0;
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
                            ?>
                            
                            <!-- Header -->
                            <div class="bg-cyan-950 p-4 rounded-t-lg mb-4 flex justify-between items-center">
                                <img src="../images/logo.png" alt="Logo" class="h-16">
                                <h1 class="text-3xl font-semibold text-white font-obeo">INVOICE</h1>
                            </div>
                            <div>
                                <p class="text-lg font-medium">Total Booking.com Amount: 
                                    $<?php echo number_format($bookingComHotelCollects, 2); ?>
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-12">
                                <!-- Bill to Info -->
                                <div class="p-4 rounded-lg border-2 border-cyan-950">
                                    <h3 class="font-semibold text-medium font-obeo mb-2">Bill to</h3>
                                    <h3 class="font-semibold text-medium font-obeo">General Manager</h3>
                                    <h3 class="font-semibold text-medium font-obeo"><?php echo htmlspecialchars($row['hotel']); ?></h3>
                                    <p>5000 W Kearney Street,<br>Springfield, MO 65803 US.</p>
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
                                            <td class="w-1/2 text-black font-rflex text-sm">$<?php // echo $total_amount; ?></td>
                                        </tr>
                                        <tr class="text-left">
                                            <th class="w-1/2 font-serif text-sm">Printing Time</th>
                                            <td class="w-1/2 text-black font-rflex text-sm"><?php date_default_timezone_set('Asia/Dhaka'); echo date('d-m-Y h:i:s A'); ?></td>
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

                                                            foreach ($reservationData as $reservation) {
                                                                if (is_array($reservation) && 
                                                                    $reservation['source'] === 'Booking.com' && 
                                                                    trim($reservation['payment_method']) === 'Hotel  Collects') {
                                                                    
                                                                    echo '<tr class="border border-cyan-950">';
                                                                    echo '<td class="px-1 py-1.5 text-xs font-medium text-black max-w-[100px]">' . htmlspecialchars($serialNumber++) . '</td>';
                                                                    
                                                                    foreach ($reservation as $key => $value) {
                                                                        if (in_array($key, ['check_in', 'check_out', 'guest_name', 'room_name', 'status', 'Total'])) {
                                                                            echo '<td class="px-1 py-1.5 text-xs font-medium text-black max-w-[100px]">' . htmlspecialchars($value) . '</td>';
                                                                        }
                                                                    }
                                                                    
                                                                    echo '</tr>';
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    echo '<div class="text-center text-lg font-medium text-red-600">No Booking.com Hotel Collects data available.</div>';
                                }
                            }
                        }
                     else {
                        echo '<div class="text-center text-lg font-medium text-red-600">No invoice data found.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function downloadPDF() {
        const element = document.getElementById('booking_print');
        html2pdf()
            .from(element)
            .save('invoice.pdf');
    }
</script>
