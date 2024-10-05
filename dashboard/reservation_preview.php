
<button type="button" class ="" data-hs-overlay="#hs-vertically-centered-scrollable-modal<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
  <i class="fa-regular fa-pen-to-square text-blue-600 "></i>
</button>

<div id="hs-vertically-centered-scrollable-modal<?php echo $row['id']; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all  sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
    <div class="w-full max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto  dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 class="font-bold text-black text-xl">
          Update Reservation Information
        </h3>
        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full" data-hs-overlay="#hs-vertically-centered-scrollable-modal<?php echo $row['id']; ?>">
            <span class="sr-only">Close</span>
            <i class="fa-solid fa-xmark text-black text-2xl hover:text-white hover:bg-cyan-950 px-4 py-3 rounded-full"></i>
        </button>
      </div>
        <div class="p-4 overflow-y-auto">
            <form method="post" class=" ps-4 w-full " enctype="multipart/form-data">
                <div class=" mt-6 gap-x-4 flex flex-col justify-center items-center ">
                    <div class="grid grid-cols-3  gap-x-4 gap-y-3 pb-4">
                        <input type="hidden" name="update_id" value="<?php echo $row["id"]; ?>">
                        <!-- Reservation Numner -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="reservation_number" class="text-black w-auto ps-4  font-serif">Reservation No : </label>
                                <input type="number" name="reservation_number" value="<?php echo $old['reservation_number'] ?? $row['reservation_number'] ?? ''; ?>" placeholder=" Reservation Number" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['reservation_number'] ?? ''; ?></h5>
                        </div>
                        <!-- Check In Date -->
                        <div> 
                            <div class="outline outline-1 outline-black rounded relative flex items-center">
                                <label for="check_in" class="text-black ps-4 font-serif w-auto">Check In:</label>
                                <input id="check_in" type="text" name="check_in" value="<?php echo $old['check_in'] ?? $row['check_in'] ?? ''; ?>" placeholder="Check In Date" 
                                class="py-px bg-transparent w-auto px-4 focus:outline-none pr-10 custom-date-input" autocomplete="off">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" id="calendar-icon-check-in">
                                    <i class="fa-solid fa-calendar-days text-blue-700 text-lg"></i>
                                </div>
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['check_in'] ?? ''; ?></h5>
                        </div>
                        <!-- Check Out Date -->
                        <div>
                            <div class="outline outline-1 outline-black rounded relative flex items-center">
                                <label for="check_out" class="text-black ps-4 font-serif w-auto">Check Out:</label>
                                <input id="check_out" type="text" name="check_out" value="<?php echo $old['check_out'] ??  $row['check_out'] ??''; ?>" placeholder="Check Out Date" 
                                class="py-px bg-transparent w-auto px-4 focus:outline-none pr-10 custom-date-input" autocomplete="off">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" id="calendar-icon-check-out">
                                    <i class="fa-solid fa-calendar-days text-blue-700 text-lg"></i>
                                </div>
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['check_out'] ?? ''; ?></h5>
                        </div>
                        <!-- Reservation Date -->
                        <div>
                            <div class="outline outline-1 outline-black rounded relative flex items-center">
                                <label for="booking_date" class="text-black ps-4  font-serif w-auto">Reservation Date:</label>
                                <input id="booking_date" type="text" name="booking_date" value="<?php echo $old['booking_date'] ??  $row['booking_date'] ??''; ?>" placeholder="Booking Date" 
                                class="py-px bg-transparent w-40 px-4 focus:outline-none pr-10 custom-date-input" autocomplete="off">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" id="calendar-icon-booking-date">
                                    <i class="fa-solid fa-calendar-days text-blue-700 text-lg"></i>
                                </div>
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['booking_date'] ?? ''; ?></h5>
                        </div>
                        <!-- Hotel Name -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="hotel" class="text-black w-auto   ps-4 font-serif">Hotel Name: </label>
                                <select name="hotel" class="py-px bg-transparent w-full ps-2 focus:outline-none">
                                <option disabled selected>Select Hotel Name</option>
                                <?php 
                                    foreach ($hotel_names as $hotel_name) {
                                        $selected = '';
                                        if (isset($old['hotel']) && $old['hotel'] == $hotel_name) {
                                            $selected = 'selected';
                                        } elseif (isset($row['hotel']) && $row['hotel'] == $hotel_name) {
                                            $selected = 'selected';
                                        }
                                ?>
                                    <option value="<?php echo htmlspecialchars($hotel_name); ?>" 
                                        <?php echo $selected; ?> class="bg-cyan-950 text-white ">
                                        <?php echo htmlspecialchars($hotel_name); ?>
                                    </option>    
                                <?php
                                    }
                                ?>
                            </select>
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['hotel'] ?? ''; ?></h5>
                        </div>
                        <!-- Guest Name -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="guest" class="text-black w-auto ps-4  font-serif">Guest Name: </label>
                                <input type="text" name="guest" value="<?php echo $old['guest'] ?? $row['guest'] ?? ''; ?>" placeholder=" Guest Name" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['guest'] ?? ''; ?></h5>
                        </div>
                        <!-- Room Name -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="room" class="text-black w-auto ps-4  font-serif">Room Name: </label>
                                <input type="text" name="room" value="<?php echo $old['room'] ?? $row['room'] ?? ''; ?>" placeholder=" Room  Name" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['room'] ?? ''; ?></h5>
                        </div>
                        <!-- Total Room -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="total_room" class="text-black w-auto ps-4  font-serif">Total Room: </label>
                                <input type="number" name="total_room" value="<?php echo $old['total_room'] ?? $row['total_room'] ?? ''; ?>" placeholder=" Total Room" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none" step="0.001">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['total_room'] ?? ''; ?></h5>
                        </div>
                        <!-- Total Nights -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="night" class="text-black w-auto ps-4  font-serif">Total Night: </label>
                                <input type="number" name="night" value="<?php echo $old['night'] ?? $row['night'] ?? ''; ?>" placeholder=" Total Night" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none" step="0.001">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['night'] ?? ''; ?></h5>
                        </div>
                        <!-- Total Price -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 outline-black rounded">
                                <label for="price" class="text-black w-auto ps-4  font-serif">Total Price: </label>
                                <input type="number" name="price" value="<?php echo $old['price'] ?? $row['price'] ?? ''; ?>" placeholder=" Total Price" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none" step="0.001">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['price'] ?? ''; ?></h5>
                        </div>
                        <!-- Currency -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="currency" class="text-black w-auto   ps-4  font-serif">Currency : </label>
                                <select name="currency" class="py-px bg-transparent w-full ps-2 focus:outline-none">
                                <option disabled selected>Select Currency</option>
                                <?php 
                                    foreach ($currency_names as $currency_name) {
                                        $selected = '';
                                        if (isset($old['currency']) && $old['currency'] == $currency_name) {
                                            $selected = 'selected';
                                        } elseif (isset($row['currency']) && $row['currency'] == $currency_name) {
                                            $selected = 'selected';
                                        }
                                ?>
                                    <option value="<?php echo htmlspecialchars($currency_name); ?>" 
                                        <?php echo $selected; ?> class="bg-cyan-950 text-white ">
                                        <?php echo htmlspecialchars($currency_name); ?>
                                    </option>    
                                <?php
                                    }
                                ?>
                            </select>
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['currency'] ?? ''; ?></h5>
                        </div>
                        <!-- USD Rate -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="rate" class="text-black w-auto ps-4  font-serif">USD Rate : </label>
                                <input type="number" name="rate" value="<?php echo $old['rate'] ??  $row['rate'] ?? ''; ?>" placeholder="USD Rate" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none" step="0.001">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['rate'] ?? ''; ?></h5>
                        </div>
                        <!-- Total Advance -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 outline-black rounded">
                                <label for="advance" class="text-black w-auto ps-4  font-serif">Total Advance : </label>
                                <input id="advance" type="number" name="advance" value="<?php echo $old['advance'] ?? $row['advance'] ?? ''; ?>" placeholder=" Total advance amount" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none" step="0.001">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['advance'] ?? ''; ?></h5>
                        </div>
                        <!-- Advance Currency -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 outline-black rounded">
                                <label for="advance_currency" class="text-black w-auto   ps-4  font-serif">Advance Currency : </label>
                                <select id="advance_currency" name="advance_currency" class="py-px bg-transparent w-full ps-2 focus:outline-none">
                                    <option disabled selected>Select Advance Currency</option>
                                    <?php 
                                        foreach ($advance_currency_names as $advance_currency_name) {
                                            $selected = '';
                                            if (isset($old['advance_currency']) && $old['advance_currency'] == $advance_currency_name) {
                                                $selected = 'selected';
                                            } elseif (isset($row['advance_currency']) && $row['advance_currency'] == $advance_currency_name) {
                                                $selected = 'selected';
                                            }
                                    ?>
                                        <option value="<?php echo htmlspecialchars($advance_currency_name); ?>" 
                                            <?php echo $selected; ?> class="bg-cyan-950 text-white ">
                                            <?php echo htmlspecialchars($advance_currency_name); ?>
                                        </option>    
                                    <?php
                                        }
                                    ?>
                            </select>
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['advance_currency'] ?? ''; ?></h5>
                        </div>
                        <!-- Booking Source -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="source" class="text-black w-auto   ps-4  font-serif">Source: </label>
                                <select name="source" class="py-px bg-transparent w-full ps-2 focus:outline-none">
                                    <option disabled selected>Select Booking Source</option>
                                    <?php 
                                        foreach ($source_names as $source_name) {
                                            $selected = '';
                                            if (isset($old['source']) && $old['source'] == $source_name) {
                                                $selected = 'selected';
                                            } elseif (isset($row['source']) && $row['source'] == $source_name) {
                                                $selected = 'selected';
                                            }
                                    ?>
                                        <option value="<?php echo htmlspecialchars($source_name); ?>" 
                                            <?php echo $selected; ?> class="bg-cyan-950 text-white ">
                                            <?php echo htmlspecialchars($source_name); ?>
                                        </option>    
                                    <?php
                                        }
                                    ?>
                            </select>
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['source'] ?? ''; ?></h5>
                        </div>
                        <!-- Payment Method -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 outline-black rounded">
                                <label for="payment_method" class="text-black w-auto   ps-4   font-serif">Payment Method: </label>
                                <select name="payment_method" class="py-px bg-transparent w-full ps-2 focus:outline-none">
                                    <option disabled selected>Select Payment Method</option>
                                    <?php 
                                        foreach ($payment_method_names as $payment_method_name) {
                                            $selected = '';
                                            if (isset($old['payment_method']) && $old['payment_method'] == $payment_method_name) {
                                                $selected = 'selected';
                                            } elseif (isset($row['payment_method']) && $row['payment_method'] == $payment_method_name) {
                                                $selected = 'selected';
                                            }
                                    ?>
                                        <option value="<?php echo htmlspecialchars($payment_method_name); ?>" 
                                            <?php echo $selected; ?> class="bg-cyan-950 text-white ">
                                            <?php echo htmlspecialchars($payment_method_name); ?>
                                        </option>    
                                    <?php
                                        }
                                    ?>
                            </select>
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['payment_method'] ?? ''; ?></h5>
                        </div>
                        <!-- Phone Number -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="phone" class="text-black w-auto ps-4  font-serif">Phone Or Email : </label>
                                <input type="text" name="phone" value="<?php echo $old['phone'] ?? $row['phone'] ?? ''; ?>" placeholder=" Guest  phone number Or Email" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['phone'] ?? ''; ?></h5>
                        </div>
                        <!-- Comments -->
                        <div>
                            <div class=" flex justify-start items-center outline outline-1 ouline-black rounded">
                                <label for="comment" class="text-black w-auto ps-4  font-serif">Comments : </label>
                                <input type="text" name="comment" value="<?php echo $old['comment'] ?? $row['comment'] ?? ''; ?>" placeholder=" Comments about guest" 
                                class=" py-px bg-transparent w-auto ps-2 focus:outline-none">
                            </div>
                            <h5 class="text-red-600 pt-1 font-mono font-xl"><?php echo $error['comment'] ?? ''; ?></h5>
                        </div>
                        <div class="col-span-3 flex justify-center items-center">
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 ">
                                <button type="button" class="bg-cyan-950 hover:bg-slate-800  text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5  rounded outline outline-1 outline-black" data-hs-overlay="#hs-vertically-centered-scrollable-modal">
                                    Close
                                </button>
                                <button type="submit" name="single_reservation_update" class="bg-cyan-950 hover:bg-slate-800  text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5  rounded outline outline-1 outline-black">
                                    Update Reservation
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<script>
    document.getElementById('advance').addEventListener('input', function() {
        var advanceInput = document.getElementById('advance');
        var advanceCurrencySelect = document.getElementById('advance_currency');
        
        if (advanceInput.value === '') {
            advanceCurrencySelect.selectedIndex = 0; 
        }
    });
</script>