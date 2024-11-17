<?php 
    include('dashboard-header.php');
    include('../function/settings_authentication.php');
    include('../function/reservaton_authentication.php');
    include('../function/search_authentication.php');
    include('../function/hotel_invoice_authentication.php');
    
    $currentMonth = date('F'); 

    if (isset($_GET['availavleInvoiceSearch'])) {
        $search_data = availableInvoicesSearch();
    
        if ($search_data && mysqli_num_rows($search_data) > 0) {
            $data_available = true;
        } else {
            $data_available = false;
        }
    } else {
        $data_available = false;
    }

    if (isset($_POST['reservation_invoice'])) {
        $hotel = $_POST['hotel'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $result = createHotelInvoice($hotel, $month, $year);
        
        if ($result['status'] === 'error') {
            $errors[] = $result['message'];
        } else {
            $success = $result['message'];
            
        }
    }

    $all_Invoice_data = allInvoiceView();
?>

<div class="flex">  
    <?php include('dashboard-sidebar.php');?>
    <!-- Main Content -->
    <div class="w-4/5 p-4">
        <div class="container mx-auto pt-24">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold font-serif capitalize">Create Hotel Invoice</h1>
                <div class="flex justify-center items-center gap-x-4">
                    <a href="hotelInvoice.php" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black">
                        Go Back
                    </a>
                    <a href="allHotelInvoice.php" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black">
                        All Hotel Invoices
                    </a>
                    <a href="dashboard.php" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black">
                        Dashboard
                    </a>
                </div>
            </div>
            <hr class="border border-black">  

            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Error:</strong>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php echo $success ?? ''; ?>

            <form method="GET" class="py-4 grid grid-cols-12 gap-x-4">
                <!-- Year Selection -->
                <div class="col-span-9">
                    <div class="grid grid-cols-2 gap-x-4">
                        <div class="flex justify-start items-center outline outline-1 outline-black rounded">
                            <label for="year" class="text-black w-40 ps-4 font-serif">Year</label>
                            <select name="year" class="p-1.5 bg-transparent w-full ps-2 border-none focus:outline-none focus:ring-0">
                                <?php
                                    $currentYear = date("Y");
                                    for ($i = 2021; $i <= 2031; $i++) { ?>
                                        <option value="<?php echo $i; ?>" <?php echo isset($_GET['year']) && $_GET['year'] == $i || $i == $currentYear ? 'selected' : ''; ?>>
                                            <?php echo $i; ?>
                                        </option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Month Selection -->
                        <div class="flex justify-start items-center outline outline-1 outline-black rounded">
                            <label for="month" class="text-black w-40 ps-4 font-serif">Month</label>
                            <select name="month" class="p-1.5 bg-transparent w-full ps-2 border-none focus:outline-none focus:ring-0">
                                <?php
                                    $months = [
                                        "01" => "January", "02" => "February", "03" => "March",
                                        "04" => "April", "05" => "May", "06" => "June",
                                        "07" => "July", "08" => "August", "09" => "September",
                                        "10" => "October", "11" => "November", "12" => "December"
                                    ];
                                    $currentMonth = date("m");
                                    $previousMonth = $currentMonth == "01" ? "12" : str_pad($currentMonth - 1, 2, "0", STR_PAD_LEFT);
                                    $previousYear = $currentMonth == "01" ? $currentYear - 1 : $currentYear;
                                    foreach ($months as $num => $name) { ?>
                                        <option value="<?php echo $num; ?>" <?php echo isset($_GET['month']) && $_GET['month'] == $num || $num == $previousMonth ? 'selected' : ''; ?>>
                                            <?php echo $name; ?>
                                        </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="availavleInvoiceSearch" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-4 py-1 rounded outline outline-1 outline-black col-span-3">See All Available Invoices</button>
            </form>

            <h5 class="text-xl font-bold font-mono text-blue-900 py-px"><?php echo $update_success ?? ''; ?></h5>

            <div class="flex flex-col mt-2">
                <div class="-m-1.5">
                    <div class="p-1.5 w-full inline-block align-middle">
                        <div class="border border-cyan-950 rounded-lg overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-cyan-950">
                                    <tr>
                                        <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase">SL</th>
                                        <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase">Hotel Name</th>
                                        <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-cyan-950">
                                    <?php 
                                        if ($data_available) {
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($search_data)) {
                                                $buttonText = '<button type="submit" name="reservation_invoice" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600">Make Invoice</button>';
                                                if (invoiceExists($row['hotel'], $_GET['month'] ?? $previousMonth, $_GET['year'] ?? $currentYear)) {
                                                    $buttonText = '<button type="submit" name="reservation_invoice" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600">Update Invoice</button>';
                                                }
                                    ?>
                                    <tr class="border border-cyan-950">
                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $i++; ?></td>
                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['hotel']; ?></td>
                                        <td class="px-2 py-1.5 whitespace-nowrap text-end text-sm font-medium inline-flex gap-x-2">
                                            <a href="viewCheckedInAvailbleInvoice.php?hotel=<?php echo urlencode($row['hotel']); ?>&availavleInvoiceSearch=true" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-cyan-950" target="_blank">View</a>
                                            <form action="" method="post" onsubmit="return confirm('Do you want to create an invoice?')">
                                                <input type="hidden" name="hotel" value="<?php echo htmlspecialchars($row['hotel']); ?>">
                                                <input type="hidden" name="month" value="<?php echo htmlspecialchars($_GET['month'] ?? $previousMonth); ?>">
                                                <input type="hidden" name="year" value="<?php echo htmlspecialchars($_GET['year'] ?? $currentYear); ?>">
                                                <?php echo $buttonText; ?>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                        } else {
                                            echo '<tr><td colspan="3" class="text-center py-4"><h5 class="font-serif text-black">No Data Available</h5></td></tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('dashboard-footer.php'); ?>
