<?php 
include ('dashboard-header.php');
 include ('../function/settings_authentication.php');
 $hotel_name_data = hotel_name_form_view();
 $hotel_names = [];
 if (mysqli_num_rows($hotel_name_data) > 0) {
    while ($hotel_name = mysqli_fetch_assoc($hotel_name_data)) {
        $hotel_names[] = $hotel_name['hotel_name'];
    }
}
if (isset($_POST['commissionSubmit'])) {
    $old = $_POST;
    $result = addCommission();
    if ($result['status'] == 'error') {
        $error = $result['message'];
    } else {
        $success = $result['message'];
        header('Refresh: 1; URL=hotelCommision.php');
    }
}

if (isset($_POST['hotelCommissionDelete'])) {
    $result = hotelCommissionDelete();
    if ($result['status'] == 'error') {
        $errors = $result['message'];
    } else {
        $success = $result['message'];
        header('Refresh: 1; URL=hotelCommision.php');
    }
}



// Fetch data for the current page
$hotelCommissionView = hotelCommissionView();
?>
<div class="flex">  
    <?php include('dashboard-sidebar.php'); ?>
    <!-- Main Content -->
    <div class="w-4/5 overflow-auto p-4">
        <div class="container mx-auto pt-24">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold font-serif capitalize ps-12 ">Hotels Commission</h1>
                <a href="settings.php" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black">
                    <i class="fa-solid fa-long-arrow-alt-left me-4"></i>Go Back
                </a>
            </div>
            <hr class="border border-black">    
            <form method="post" class="ps-12 w-full" enctype="multipart/form-data">
                <h5 class="text-xl font-semibold font-mono text-black py-2">
                    <?php echo $success ?? ''; ?>
                </h5>
                <!-- Hotel Name -->
                <div>
                    <div class=" flex justify-start items-center outline outline-1 ouline-black rounded cursor-pointer">
                        <label for="hotel" class="text-black w-48 p-4  font-serif">Hotel Name: </label>
                        <select name="hotel"  class=" py-px bg-transparent w-full ps-2 focus:outline-none">
                            <option disabled selected>Select Hotel Name</option>
                            <?php 
                            foreach ($hotel_names as $hotel_name) {
                            ?>
                                <option value="<?php echo htmlspecialchars($hotel_name); ?>" 
                                    <?php echo (isset($old['hotel']) && $old['hotel'] == $hotel_name ? 'selected' : ''); ?> class="bg-cyan-950 text-white ">
                                    <?php echo htmlspecialchars($hotel_name); ?>
                                </option>    
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['hotel'] ?? ''; ?></h5>
                </div>
                <div class="mt-6 grid grid-cols-3 gap-4">
                    <div>
                        <div class="flex justify-start items-center outline outline-1 outline-black rounded w-full">
                            <label for="hotelCollects" class="text-black text-xl w-60 ps-4 font-serif">Hotel Collects: </label>
                            <input type="text" name="hotelCollects" value="<?php echo $old['hotelCollects'] ?? ''; ?>" placeholder="Hotel Collects" 
                            class="py-2 bg-transparent w-full px-4 focus:outline-none">
                        </div>
                        <h5 class="text-black font-mono font-xl my-2 text-center"><?php echo $error['hotelCollects'] ?? ''; ?></h5>
                    </div>
                    <div>
                        <div class="flex justify-start items-center outline outline-1 outline-black rounded w-full">
                            <label for="expediaCollects" class="text-black text-xl w-72 ps-4 font-serif">Expedia Collects: </label>
                            <input type="text" name="expediaCollects" value="<?php echo $old['expediaCollects'] ?? ''; ?>" placeholder="Expedia Collects" 
                            class="py-2 bg-transparent w-full px-4 focus:outline-none">
                        </div>
                        <h5 class="text-black font-mono font-xl my-2 text-center"><?php echo $error['expediaCollects'] ?? ''; ?></h5>
                    </div>
                    <div>
                        <div class="flex justify-start items-center outline outline-1 outline-black rounded w-full">
                            <label for="custom" class="text-black text-xl w-72 ps-4 font-serif">Custom Com...: </label>
                            <input type="text" name="custom" value="<?php echo $old['custom'] ?? ''; ?>" placeholder="Custom Commission" 
                            class="py-2 bg-transparent w-full px-4 focus:outline-none">
                        </div>
                        <h5 class="text-black font-mono font-xl my-2 text-center"><?php echo $error['custom'] ?? ''; ?></h5>
                    </div>
                </div>
                <div class="flex justify-center items-center mt-4">
                    <button type="submit" name="commissionSubmit" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black">Submit</button>
                </div>
            </form>
            <div class="overflow-x-auto ps-12">
                <table class="table-fixed w-full mt-8 rounded-lg border-collapse overflow-hidden ">
                    <thead class="bg-cyan-950 text-white">
                        <tr class="text-center">
                            <th class="py-2 px-4 w-32 border border-black">SL No</th>
                            <th class="py-2 px-4 w-full border border-black">Hotel Names</th>
                            <th class="py-2 px-4 w-full border border-black">Hotel Collects</th>
                            <th class="py-2 px-4 w-full border border-black">Expedia Collects</th>
                            <th class="py-2 px-4 w-full border border-black">Custom</th>
                            <th class="py-2 px-4 w-60 border border-black">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($hotelCommissionView) > 0) {
                            $i =  1;
                            while ($row = mysqli_fetch_assoc($hotelCommissionView)) {
                                echo '<tr class="text-center bg-white rounded">';
                                    echo '<td class="py-2 px-4 w-32 font-serif font-semibold text-gray-800 border border-black rounded">' . $i++ . '</td>';
                                    echo '<td class="py-2 px-4 w-full font-serif font-semibold text-gray-800 border border-black rounded">' . $row["hotel"] . '</td>';
                                    echo '<td class="py-2 px-4 w-full font-serif font-semibold text-gray-800 border border-black rounded">' . $row["hotelCollects"] . '</td>';
                                    echo '<td class="py-2 px-4 w-full font-serif font-semibold text-gray-800 border border-black rounded">' . $row["expediaCollects"] . '</td>';
                                    echo '<td class="py-2 px-4 w-full font-serif font-semibold text-gray-800 border border-black rounded">' . $row["custom"] . '</td>';
                                    echo '<td class="py-2 px-4 w-60 font-serif font-semibold text-gray-800 border border-black rounded">';
                                        echo '<div class="flex justify-center items-center">';
                                            echo '<form method="post" onsubmit="return confirm(\'Do you want to delete?\')">
                                                    <input type="hidden" name="delete_id" value="'.$row['id'].'">
                                                    <button class="fs-4 mx-4 bg-red-700 py-1 px-2 rounded" name="hotelCommissionDelete" type="submit">
                                                        <i class="fa-solid fa-trash text-white"></i>
                                                    </button>
                                                  </form>';
                                        echo '</div>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr>';
                            echo '<td colspan="5" class="text-center py-4"><h5 class="font-serif text-black">No Data Available</h5></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
