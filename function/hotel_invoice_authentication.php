<?php

    require_once ('db_connection.php');
    require_once ('settings_authentication.php');
    // function createHotelInvoice($hotel, $month, $year) {
    //     $db_connect = db_connect();
    
    //     if (!$db_connect) {
    //         return ['status' => 'error', 'message' => 'Database connection failed.'];
    //     }

    //     // get hotel address
    //     $address_view = "SELECT * FROM hoteladdress WHERE hotel = ?";
    //     $stmt_address = $db_connect->prepare($address_view);
    //     $stmt_address->bind_param('s', $hotel);
    //     $stmt_address->execute();
    //     $address_result = $stmt_address->get_result();

    //     if ($address_result->num_rows > 0) {
    //         while ($aRows = $address_result->fetch_assoc()) {
    //             $address = $aRows['	address']?? 'Please Add Hotel Address';
    //         }
    //     } else {
    //         return ['status' => 'error', 'message' => 'Hotel Address not found for the selected hotel.'];
    //     }
    //     // get hotel commission
    //     $commission_view = "SELECT * FROM hotelcommission WHERE hotel = ?";
    //     $stmt_commission = $db_connect->prepare($commission_view);
    //     $stmt_commission->bind_param('s', $hotel);
    //     $stmt_commission->execute();
    //     $commission_result = $stmt_commission->get_result();

    //     if ($commission_result->num_rows > 0) {
    //         while ($cRows = $commission_result->fetch_assoc()) {
    //             $hotelCollects = $cRows['hotelCollects'] ?? 'Please add Hotel collects commission';
    //             $expediaCollects = $cRows['expediaCollects']?? 'Please add Expedia collects commission';;
    //             $custom = $cRows['custom']?? 'Please add custom commission';;
    //         }
    //     } else {
    //         return ['status' => 'error', 'message' => 'Commission data not found for the selected hotel.'];
    //     }
    //     // Generate a unique ID for the invoice
    //     $unique_id = date('d') . date('m') . date('y') . mt_rand(1000, 9999); // Prefix 'inv_' to easily identify the invoice
    //     $invDate = date('d F Y'); // Current date in d F Y format
    
    //     // Get reservation data for the current month and year
    //     $startDateFormatted = "01-$month-$year";
    //     $endDateFormatted = date("t-m-Y", strtotime($startDateFormatted));
    
    //     $sql_view = "SELECT * FROM reservation 
    //                  WHERE STR_TO_DATE(check_in, '%d-%m-%Y') BETWEEN STR_TO_DATE('$startDateFormatted', '%d-%m-%Y') 
    //                  AND STR_TO_DATE('$endDateFormatted', '%d-%m-%Y')
    //                  AND status = 'Checked In'
    //                  AND hotel = ?";
    
    //     $stmt_view = $db_connect->prepare($sql_view);
    //     $stmt_view->bind_param('s', $hotel);
    //     $stmt_view->execute();
    //     $result = $stmt_view->get_result();
    
    //     if (mysqli_num_rows($result) == 0) {
    //         return ['status' => 'error', 'message' => 'No check-in reservations found for the selected hotel and month.'];
    //     }
    
    //     $reservations = [];
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $reservations[] = [
    //             'reservation_no' => $row['reservation_number'],
    //             'source' => $row['source'],
    //             'payment_method' => trim($row['payment_method']),
    //             'C/in' => $row['check_in'],
    //             'C/out' => $row['check_out'],
    //             'guest' => $row['guest'],
    //             'room' => $row['room'] ?? 'Multiple Type Room',
    //             'status' => $row['status'],
    //             'price' => $row['price'],
    //             'E/rate' => $row['rate'],
    //             'Total' => number_format($row['price'] * $row['rate'], 2),
    //         ];
    //     }
    
    //     $newData = json_encode($reservations);
    
    //     // Check if an invoice already exists
    //     $sql_check = "SELECT reservation_data FROM invoices WHERE hotel = ? AND month = ? AND year = ?";
    //     $stmt_check = $db_connect->prepare($sql_check);
    //     $stmt_check->bind_param('sss', $hotel, $month, $year);
    //     $stmt_check->execute();
    //     $stmt_check->store_result();
    //     $stmt_check->bind_result($existingData);
    
    //     if ($stmt_check->fetch()) {
    //         // Compare new data with existing data
    //         if ($existingData === $newData) {
    //             return ['status' => 'success', 'message' => 'Nothing to update; data is already current.'];
    //         } else {
    //             // Update invoice with new data
    //             $sql_update = "UPDATE invoices SET reservation_data = ?, invoice_date = ? WHERE hotel = ? AND month = ? AND year = ?";
    //             $stmt_update = $db_connect->prepare($sql_update);
    //             $stmt_update->bind_param('sssss', $newData, $invDate, $hotel, $month, $year);
    //             if ($stmt_update->execute()) {
    //                 return ['status' => 'success', 'message' => 'Invoice updated successfully with new data!'];
    //             } else {
    //                 return ['status' => 'error', 'message' => 'Error updating invoice: ' . $stmt_update->error];
    //             }
    //         }
    //     } else {
    //         // Insert as new invoice if none exists
    //         $sql_insert = "INSERT INTO invoices (invoice_id, hotel, month, year, reservation_data, invoice_date) VALUES (?, ?, ?, ?, ?, ?)";
    //         $stmt_insert = $db_connect->prepare($sql_insert);
    //         $stmt_insert->bind_param('ssssss', $unique_id, $hotel, $month, $year, $newData, $invDate);
    //         if ($stmt_insert->execute()) {
    //             return ['status' => 'success', 'message' => 'Invoice created successfully!'];
    //         } else {
    //             return ['status' => 'error', 'message' => 'Error creating invoice: ' . $stmt_insert->error];
    //         }
    //     }
    // }

    // function createHotelInvoice($hotel, $month, $year) {
    //     // Establish database connection
    //     $db_connect = db_connect();
    
    //     if (!$db_connect) {
    //         return ['status' => 'error', 'message' => 'Database connection failed.'];
    //     }
    
    //     // Convert month and year to start and end date for the query
    //     $startDateFormatted = "01-$month-$year"; // First day of the month
    //     $endDateFormatted = date("t-m-Y", strtotime($startDateFormatted)); // Last day of the month
    
    //     // SQL query to fetch reservations
    //     $sql_view = "SELECT * 
    //                  FROM reservation 
    //                  WHERE STR_TO_DATE(check_in, '%d-%m-%Y') BETWEEN STR_TO_DATE('$startDateFormatted', '%d-%m-%Y') 
    //                        AND STR_TO_DATE('$endDateFormatted', '%d-%m-%Y')
    //                        AND status = 'Checked In'
    //                        AND hotel = '$hotel'";
    
    //     // Execute the SQL query
    //     $result = mysqli_query($db_connect, $sql_view);
    //     if (!$result) {
    //         return ['status' => 'error', 'message' => 'Error executing query: ' . mysqli_error($db_connect)];
    //     }
    
    //     // Check if any rows were returned
    //     if (mysqli_num_rows($result) > 0) {
    //         $reservations = [];
    
    //         // Fetch all rows
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $reservations[] = [
    //                 'reservation_no' => $row['reservation_number'],
    //                 'check_in' => $row['check_in'],
    //                 'check_out' => $row['check_out'],
    //                 'guest' => $row['guest'],
    //                 'room' => $row['room'] ?? 'Multiple Type Room',
    //                 'price' => $row['price'],
    //                 'status' => $row['status'],
    //             ];
    //         }
           
    //         // Combine the reservation data into JSON format
    //         $combinedData = json_encode($reservations);
            
    //         // Check if an invoice already exists for the same hotel, month, and year
    //         $sql_check = "SELECT id FROM invoices WHERE hotel = ? AND month = ? AND year = ?";
    //         $stmt_check = $db_connect->prepare($sql_check);
    
    //         if (!$stmt_check) {
    //             return ['status' => 'error', 'message' => 'SQL error: ' . $db_connect->error];
    //         }
    
    //         // Bind parameters and execute the query to check if the invoice exists
    //         $stmt_check->bind_param('sss', $hotel, $month, $year);
    //         $stmt_check->execute();
    //         $stmt_check->store_result();
    
    //         if ($stmt_check->num_rows > 0) {
    //             // If an invoice exists, perform an update
    //             $sql_update = "UPDATE invoices SET reservation_data = ? WHERE hotel = ? AND month = ? AND year = ?";
    //             $stmt_update = $db_connect->prepare($sql_update);
    
    //             if (!$stmt_update) {
    //                 return ['status' => 'error', 'message' => 'SQL error: ' . $db_connect->error];
    //             }
    
    //             // Bind parameters and execute the update statement
    //             $stmt_update->bind_param('ssss', $combinedData, $hotel, $month, $year);
    
    //             if ($stmt_update->execute()) {
    //                 return ['status' => 'success', 'message' => 'Invoice updated successfully!'];
    //             } else {
    //                 return ['status' => 'error', 'message' => 'Error updating invoice: ' . $stmt_update->error];
    //             }
    //         } else {
    //             // If no invoice exists, perform an insert
    //             $sql_insert = "INSERT INTO invoices (hotel, month, year, reservation_data) VALUES (?, ?, ?, ?)";
    //             $stmt_insert = $db_connect->prepare($sql_insert);
    
    //             if (!$stmt_insert) {
    //                 return ['status' => 'error', 'message' => 'SQL error: ' . $db_connect->error];
    //             }
    
    //             // Bind parameters for the prepared statement
    //             $stmt_insert->bind_param('ssss', $hotel, $month, $year, $combinedData);
    
    //             // Execute the insert statement
    //             if ($stmt_insert->execute()) {
    //                 return ['status' => 'success', 'message' => 'Invoice created successfully!'];
    //             } else {
    //                 return ['status' => 'error', 'message' => 'Error creating invoice: ' . $stmt_insert->error];
    //             }
    //         }
    //     } else {
    //         return ['status' => 'error', 'message' => 'No check-in reservations found for the selected hotel and month.'];
    //     }
    // }
    //latest
    function createHotelInvoice($hotel, $month, $year) {
        $db_connect = db_connect();
    
        if (!$db_connect) {
            return ['status' => 'error', 'message' => 'Database connection failed.'];
        }
    
        // Get hotel address
        $address_view = "SELECT * FROM hoteladdress WHERE hotel = ?";
        $stmt_address = $db_connect->prepare($address_view);
        $stmt_address->bind_param('s', $hotel);
        $stmt_address->execute();
        $address_result = $stmt_address->get_result();
    
        if ($address_result->num_rows > 0) {
            while ($aRows = $address_result->fetch_assoc()) {
                $address = $aRows['address'] ?? 'Please Add Hotel Address';
            }
        } else {
            return ['status' => 'error', 'message' => 'Hotel address not found for the selected hotel.'];
        }
    
        // Get hotel commission
        $commission_view = "SELECT * FROM hotelcommission WHERE hotel = ?";
        $stmt_commission = $db_connect->prepare($commission_view);
        $stmt_commission->bind_param('s', $hotel);
        $stmt_commission->execute();
        $commission_result = $stmt_commission->get_result();
    
        if ($commission_result->num_rows > 0) {
            while ($cRows = $commission_result->fetch_assoc()) {
                $hotelCollects = $cRows['hotelCollects'] ?? 'Please add Hotel collects commission';
                $expediaCollects = $cRows['expediaCollects'] ?? 'Please add Expedia collects commission';
                $custom = $cRows['custom'] ?? 'Please add custom commission';
            }
        } else {
            return ['status' => 'error', 'message' => 'Commission data not found for the selected hotel.'];
        }
    
        // Escape values to prevent SQL injection
        $address = mysqli_real_escape_string($db_connect, $address);
        $hotelCollects = mysqli_real_escape_string($db_connect, $hotelCollects);
        $expediaCollects = mysqli_real_escape_string($db_connect, $expediaCollects);
        $custom = mysqli_real_escape_string($db_connect, $custom);
    
        // Generate a unique ID for the invoice
        $unique_id = date('d') . date('m') . date('y') . mt_rand(1000, 9999); // Prefix 'inv_' to easily identify the invoice
        $invDate = date('d F Y'); // Current date in d F Y format
    
        // Get reservation data for the current month and year
        $startDateFormatted = "01-$month-$year";
        $endDateFormatted = date("t-m-Y", strtotime($startDateFormatted));
    
        $sql_view = "SELECT * FROM reservation 
                     WHERE STR_TO_DATE(check_in, '%d-%m-%Y') BETWEEN STR_TO_DATE('$startDateFormatted', '%d-%m-%Y') 
                     AND STR_TO_DATE('$endDateFormatted', '%d-%m-%Y')
                     AND status = 'Checked In'
                     AND hotel = ?";
    
        $stmt_view = $db_connect->prepare($sql_view);
        $stmt_view->bind_param('s', $hotel);
        $stmt_view->execute();
        $result = $stmt_view->get_result();
    
        if ($result->num_rows == 0) {
            return ['status' => 'error', 'message' => 'No check-in reservations found for the selected hotel and month.'];
        }
    
        $reservations = [];
        while ($row = $result->fetch_assoc()) {
            $reservations[] = [
                'reservation_no' => $row['reservation_number'],
                'source' => $row['source'],
                'payment_method' => trim($row['payment_method']),
                'C/in' => $row['check_in'],
                'C/out' => $row['check_out'],
                'guest' => $row['guest'],
                'room' => $row['room'] ?? 'Multiple Type Room',
                'status' => $row['status'],
                'price' => $row['price'],
                'E/rate' => $row['rate'],
                'Total' => number_format($row['price'] * $row['rate'], 2),
            ];
        }
    
        $newData = json_encode($reservations);
    
        // Check if an invoice already exists
        $sql_check = "SELECT reservation_data FROM invoices WHERE hotel = ? AND month = ? AND year = ?";
        $stmt_check = $db_connect->prepare($sql_check);
        $stmt_check->bind_param('sss', $hotel, $month, $year);
        $stmt_check->execute();
        $stmt_check->store_result();
        $stmt_check->bind_result($existingData);
    
        if ($stmt_check->fetch()) {
            // Compare new data with existing data
            if ($existingData === $newData) {
                return ['status' => 'success', 'message' => 'Nothing to update; data is already current.'];
            } else {
                // Update invoice with new data
                $sql_update = "UPDATE invoices 
                               SET reservation_data = ?, invoice_date = ?, address = ?, hotelCollects = ?, expediaCollects = ?, custom = ? 
                               WHERE hotel = ? AND month = ? AND year = ?";
                $stmt_update = $db_connect->prepare($sql_update);
                $stmt_update->bind_param('sssssssss', $newData, $invDate, $address, $hotelCollects, $expediaCollects, $custom, $hotel, $month, $year);
                if ($stmt_update->execute()) {
                    return ['status' => 'success', 'message' => 'Invoice updated successfully with new data!'];
                } else {
                    return ['status' => 'error', 'message' => 'Error updating invoice: ' . $stmt_update->error];
                }
            }
        } else {
            // Insert as new invoice if none exists
            $sql_insert = "INSERT INTO invoices (invoice_id, hotel, month, year, reservation_data, invoice_date, address, hotelCollects, expediaCollects, custom) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $db_connect->prepare($sql_insert);
            $stmt_insert->bind_param('ssssssssss', $unique_id, $hotel, $month, $year, $newData, $invDate, $address, $hotelCollects, $expediaCollects, $custom);
            if ($stmt_insert->execute()) {
                return ['status' => 'success', 'message' => 'Invoice created successfully!'];
            } else {
                return ['status' => 'error', 'message' => 'Error creating invoice: ' . $stmt_insert->error];
            }
        }
    }
    
    // function createHotelInvoice($hotel, $month, $year) {
    //     $db_connect = db_connect();
    
    //     if (!$db_connect) {
    //         return ['status' => 'error', 'message' => 'Database connection failed.'];
    //     }
    
    //     // Get reservation data for the current month and year
    //     $startDateFormatted = "01-$month-$year";
    //     $endDateFormatted = date("t-m-Y", strtotime($startDateFormatted));
        
    //     $sql_view = "SELECT * FROM reservation 
    //                  WHERE STR_TO_DATE(check_in, '%d-%m-%Y') BETWEEN STR_TO_DATE('$startDateFormatted', '%d-%m-%Y') 
    //                  AND STR_TO_DATE('$endDateFormatted', '%d-%m-%Y')
    //                  AND status = 'Checked In'
    //                  AND hotel = ?";
        
    //     $stmt_view = $db_connect->prepare($sql_view);
    //     $stmt_view->bind_param('s', $hotel);
    //     $stmt_view->execute();
    //     $result = $stmt_view->get_result();
    
    //     if (mysqli_num_rows($result) == 0) {
    //         return ['status' => 'error', 'message' => 'No check-in reservations found for the selected hotel and month.'];
    //     }
    
    //     $reservations = [];
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $reservations[] = [
    //             'reservation_no' => $row['reservation_number'],
    //             'source' => $row['source'],
    //             'payment_method' => trim($row['payment_method']),
    //             'C/in' => $row['check_in'],
    //             'C/out' => $row['check_out'],
    //             'guest' => $row['guest'],
    //             'room' => $row['room'] ?? 'Multiple Type Room',
    //             'status' => $row['status'],
    //             'price' => $row['price'],
    //             'E/rate'=> $row['rate'],
    //             'Total'=> number_format($row['price'] * $row['rate'], 2),
    //         ];
    //     }
    
    //     $newData = json_encode($reservations);
    
    //     // Check if an invoice already exists
    //     $sql_check = "SELECT reservation_data FROM invoices WHERE hotel = ? AND month = ? AND year = ?";
    //     $stmt_check = $db_connect->prepare($sql_check);
    //     $stmt_check->bind_param('sss', $hotel, $month, $year);
    //     $stmt_check->execute();
    //     $stmt_check->store_result();
    //     $stmt_check->bind_result($existingData);
        
    //     if ($stmt_check->fetch()) {
    //         // Compare new data with existing data
    //         if ($existingData === $newData) {
    //             return ['status' => 'success', 'message' => 'Nothing to update; data is already current.'];
    //         } else {
    //             // Update invoice with new data
    //             $sql_update = "UPDATE invoices SET reservation_data = ? WHERE hotel = ? AND month = ? AND year = ?";
    //             $stmt_update = $db_connect->prepare($sql_update);
    //             $stmt_update->bind_param('ssss', $newData, $hotel, $month, $year);
    //             if ($stmt_update->execute()) {
    //                 return ['status' => 'success', 'message' => 'Invoice updated successfully with new data!'];
    //             } else {
    //                 return ['status' => 'error', 'message' => 'Error updating invoice: ' . $stmt_update->error];
    //             }
    //         }
    //     } else {
    //         // Insert as new invoice if none exists
    //         $sql_insert = "INSERT INTO invoices (hotel, month, year, reservation_data) VALUES (?, ?, ?, ?)";
    //         $stmt_insert = $db_connect->prepare($sql_insert);
    //         $stmt_insert->bind_param('ssss', $hotel, $month, $year, $newData);
    //         if ($stmt_insert->execute()) {
    //             return ['status' => 'success', 'message' => 'Invoice created successfully!'];
    //         } else {
    //             return ['status' => 'error', 'message' => 'Error creating invoice: ' . $stmt_insert->error];
    //         }
    //     }
    // }

    
    

    function allInvoiceView() {
        $db_connect = db_connect();
        $sql_view=  "SELECT * FROM invoices";
        $allInvoiceViewResult = mysqli_query( $db_connect,  $sql_view);
        if (!$allInvoiceViewResult) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		return $allInvoiceViewResult;
    }

    

    function invoiceExists($hotel, $month, $year) {
        // Ensure the global database connection is accessible
        global $conn;
    
        // Check if the database connection is established
        if (!$conn) {
            $conn = db_connect(); // Call the function to establish a connection if $conn is not set
        }
    
        // Define the SQL query to check if an invoice exists for the given hotel, month, and year
        $query = "SELECT COUNT(*) as count FROM invoices WHERE hotel = ? AND month = ? AND year = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Prepare statement failed: " . $conn->error);
        }
    
        $stmt->bind_param("sii", $hotel, $month, $year);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
    
        // Return true if an invoice exists; otherwise, false
        return $data['count'] > 0;
    }
    function hotelInvoiceCopyView($id) {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM invoices WHERE id = '$id'";
		$bank_invoice_copy_results = mysqli_query($db_connect, $sql_view);
		if (!$bank_invoice_copy_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		if(mysqli_num_rows($bank_invoice_copy_results) > 0) {
			return $bank_invoice_copy_results;
		} else {
			die('No data found for the provided ID.');
		}
	}
    function hotelInvoiceCopyViewHotel($id) {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM invoices WHERE id = '$id'";
		$bank_invoice_copy_results = mysqli_query($db_connect, $sql_view);
		if (!$bank_invoice_copy_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		if(mysqli_num_rows($bank_invoice_copy_results) > 0) {
			return $bank_invoice_copy_results;
		} else {
			die('No data found for the provided ID.');
		}
	}
    // function hotelInvoiceCopyViewHotel($hotel) {
	// 	$db_connect = db_connect();
	// 	$sql_view = "SELECT * FROM hoteladdress WHERE hotel = '$hotel'";
	// 	$results = mysqli_query($db_connect, $sql_view);
	// 	if (!$results) {
	// 		die('Query failed: ' . mysqli_error($db_connect));
	// 	}
	// 	if(mysqli_num_rows($results) > 0) {
    //         while ($row = mysqli_fetch_assoc($results)) {
    //             $hotelAddress = $row['hotel'];
    //         }
	// 		return $hotelAddress;
	// 	} else {
	// 		die('No data found for the provided ID.');
	// 	}
	// }
    function hotelInvoiceCopyViewCommission($id) {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM invoices WHERE id = '$id'";
		$bank_invoice_copy_results = mysqli_query($db_connect, $sql_view);
		if (!$bank_invoice_copy_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		if(mysqli_num_rows($bank_invoice_copy_results) > 0) {
			return $bank_invoice_copy_results;
		} else {
			die('No data found for the provided ID.');
		}
	}