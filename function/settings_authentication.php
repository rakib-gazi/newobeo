<?php
    require_once('db_connection.php');
    function hotel_name(){
        $db_connect = db_connect();
        $hotel_name = mysqli_real_escape_string($db_connect,$_POST['hotel_name']);

        $error = [];
        if(empty($hotel_name)){
            $error['hotel_name'] = 'Hotel name is empty';
        }else{
            $sql_view = "SELECT * FROM hotel_name WHERE hotel_name = '$hotel_name' " ;
			$results = mysqli_query($db_connect, $sql_view);
				if(mysqli_num_rows($results) == 1){
					$error['hotel_name'] = ' Hotel Name Already Exists';
				}
        }
        
        if(count($error)> 0){
            return [
				'status' => 'error',
				'message' => $error,
			 ];
        }

        $sql_insert = "INSERT INTO hotel_name(hotel_name) VALUES ('$hotel_name')";
        $result =  mysqli_query ($db_connect,$sql_insert);
        
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return [
            'status' => 'success',
            'message' => 'Hotel name added successfull',
        ];
    }
    function hotel_name_view($starting_limit, $results_per_page) {
        $db_connect = db_connect();
        $sql_view = "SELECT * FROM hotel_name LIMIT $starting_limit, $results_per_page";
        $hotel_name_results = mysqli_query($db_connect, $sql_view);
        return $hotel_name_results;
    }

     
	function hotel_name_form_view() {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM hotel_name";
		$hotel_name_form_results = mysqli_query($db_connect, $sql_view);
		if (!$hotel_name_form_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		return $hotel_name_form_results;
	}
	
    function hotel_name_delete(){
		$db_connect = db_connect();
		$id = $_POST['delete_id'];
		
		$errors=[];
		$sql_view = "SELECT * FROM hotel_name WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_view);
		if(mysqli_num_rows($result) == 0){
			$errors['data_delete'] = 'Unknown ID';
		}
		
		if(count($errors) > 0){
			return [
				'status' => 'error',
				'message' => $errors,
			 ];
		}
		$sql_delete = "DELETE FROM hotel_name WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_delete);
			
			if(mysqli_error($db_connect)){
				die('Table Error:'.mysqli_error($db_connect));
			}
			
			return [
				'status' => 'success',
				'message' => 'Hotel Name Delete Successfull.',
			];
		
	}

    //currency part
    
    function currency(){
        $db_connect = db_connect();
        $currency = mysqli_real_escape_string($db_connect,$_POST['currency']);

        $error = [];
        if(empty($currency)){
            $error['currency'] = 'Currency is empty';
        }else{
            $sql_view = "SELECT * FROM currency WHERE currency = '$currency' " ;
			$results = mysqli_query($db_connect, $sql_view);
				if(mysqli_num_rows($results) == 1){
					$error['currency'] = ' Currecny Already Exists';
				}
        }
        
        if(count($error)> 0){
            return [
				'status' => 'error',
				'message' => $error,
			 ];
        }

        $sql_insert = "INSERT INTO currency(currency) VALUES ('$currency')";
        $result =  mysqli_query ($db_connect,$sql_insert);
        
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return [
            'status' => 'success',
            'message' => 'Currency added successfull',
        ];
    }
    function currency_view($starting_limit, $results_per_page) {
        $db_connect = db_connect();
        $sql_view = "SELECT * FROM currency LIMIT $starting_limit, $results_per_page";
        $currency_results = mysqli_query($db_connect, $sql_view);
        return $currency_results;
    }
         
	function currency_form_view() {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM currency";
		$currency_form_results = mysqli_query($db_connect, $sql_view);
		if (!$currency_form_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		return $currency_form_results;
	}
    function currency_delete(){
		$db_connect = db_connect();
		$id = $_POST['delete_id'];
		
		$errors=[];
		$sql_view = "SELECT * FROM currency WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_view);
		if(mysqli_num_rows($result) == 0){
			$errors['data_delete'] = 'Unknown ID';
		}
		
		if(count($errors) > 0){
			return [
				'status' => 'error',
				'message' => $errors,
			 ];
		}
		$sql_delete = "DELETE FROM currency WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_delete);
			
			if(mysqli_error($db_connect)){
				die('Table Error:'.mysqli_error($db_connect));
			}
			
			return [
				'status' => 'success',
				'message' => 'Currency  Delete Successfull.',
			];
		
	}
    

    //advance_currency part
    
    function advance_currency(){
        $db_connect = db_connect();
        $advance_currency = mysqli_real_escape_string($db_connect,$_POST['advance_currency']);

        $error = [];
        if(empty($advance_currency)){
            $error['advance_currency'] = 'Advance Currency is empty';
        }else{
            $sql_view = "SELECT * FROM advance_currency WHERE advance_currency = '$advance_currency' " ;
			$results = mysqli_query($db_connect, $sql_view);
				if(mysqli_num_rows($results) == 1){
					$error['advance_currency'] = ' Advance Currecny Already Exists';
				}
        }
        
        if(count($error)> 0){
            return [
				'status' => 'error',
				'message' => $error,
			 ];
        }

        $sql_insert = "INSERT INTO advance_currency(advance_currency) VALUES ('$advance_currency')";
        $result =  mysqli_query ($db_connect,$sql_insert);
        
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return [
            'status' => 'success',
            'message' => 'Advance Currency added successfull',
        ];
    }
    function advance_currency_view($starting_limit, $results_per_page) {
        $db_connect = db_connect();
        $sql_view = "SELECT * FROM advance_currency LIMIT $starting_limit, $results_per_page";
        $advance_currency_results = mysqli_query($db_connect, $sql_view);
        return $advance_currency_results;
    }
         
	function advance_currency_form_view() {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM advance_currency";
		$advance_currency_form_results = mysqli_query($db_connect, $sql_view);
		if (!$advance_currency_form_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		return $advance_currency_form_results;
	}
    function advance_currency_delete(){
		$db_connect = db_connect();
		$id = $_POST['delete_id'];
		
		$errors=[];
		$sql_view = "SELECT * FROM advance_currency WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_view);
		if(mysqli_num_rows($result) == 0){
			$errors['data_delete'] = 'Unknown ID';
		}
		
		if(count($errors) > 0){
			return [
				'status' => 'error',
				'message' => $errors,
			 ];
		}
		$sql_delete = "DELETE FROM advance_currency WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_delete);
			
			if(mysqli_error($db_connect)){
				die('Table Error:'.mysqli_error($db_connect));
			}
			
			return [
				'status' => 'success',
				'message' => 'Currency  Delete Successfull.',
			];
		
	}
    
    //source part
    
    function source(){
        $db_connect = db_connect();
        $source = mysqli_real_escape_string($db_connect,$_POST['source']);

        $error = [];
        if(empty($source)){
            $error['source'] = 'source is empty';
        }else{
            $sql_view = "SELECT * FROM source WHERE source = '$source' " ;
			$results = mysqli_query($db_connect, $sql_view);
				if(mysqli_num_rows($results) == 1){
					$error['source'] = ' source Already Exists';
				}
        }
        
        if(count($error)> 0){
            return [
				'status' => 'error',
				'message' => $error,
			 ];
        }

        $sql_insert = "INSERT INTO source(source) VALUES ('$source')";
        $result =  mysqli_query ($db_connect,$sql_insert);
        
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return [
            'status' => 'success',
            'message' => 'source added successfull',
        ];
    }
    function source_view($starting_limit, $results_per_page) {
        $db_connect = db_connect();
        $sql_view = "SELECT * FROM source LIMIT $starting_limit, $results_per_page";
        $source_results = mysqli_query($db_connect, $sql_view);
        return $source_results;
    }
	function source_form_view() {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM source";
		$source_form_results = mysqli_query($db_connect, $sql_view);
		if (!$source_form_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		return $source_form_results;
	}
    function source_delete(){
		$db_connect = db_connect();
		$id = $_POST['delete_id'];
		
		$errors=[];
		$sql_view = "SELECT * FROM source WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_view);
		if(mysqli_num_rows($result) == 0){
			$errors['data_delete'] = 'Unknown ID';
		}
		
		if(count($errors) > 0){
			return [
				'status' => 'error',
				'message' => $errors,
			 ];
		}
		$sql_delete = "DELETE FROM source WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_delete);
			
			if(mysqli_error($db_connect)){
				die('Table Error:'.mysqli_error($db_connect));
			}
			
			return [
				'status' => 'success',
				'message' => 'source  Delete Successfull.',
			];
		
	}
    //Status part
    
    function status(){
        $db_connect = db_connect();
        $status = mysqli_real_escape_string($db_connect,$_POST['status']);

        $error = [];
        if(empty($status)){
            $error['status'] = 'status is empty';
        }else{
            $sql_view = "SELECT * FROM status WHERE status = '$status' " ;
			$results = mysqli_query($db_connect, $sql_view);
				if(mysqli_num_rows($results) == 1){
					$error['status'] = ' status Already Exists';
				}
        }
        
        if(count($error)> 0){
            return [
				'status' => 'error',
				'message' => $error,
			 ];
        }

        $sql_insert = "INSERT INTO status(status) VALUES ('$status')";
        $result =  mysqli_query ($db_connect,$sql_insert);
        
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return [
            'status' => 'success',
            'message' => 'status added successfull',
        ];
    }
    function status_view($starting_limit, $results_per_page) {
        $db_connect = db_connect();
        $sql_view = "SELECT * FROM status LIMIT $starting_limit, $results_per_page";
        $status_results = mysqli_query($db_connect, $sql_view);
        return $status_results;
    }
	function status_form_view() {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM status";
		$status_form_results = mysqli_query($db_connect, $sql_view);
		if (!$status_form_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		return $status_form_results;
	}
    function status_delete(){
		$db_connect = db_connect();
		$id = $_POST['delete_id'];
		
		$errors=[];
		$sql_view = "SELECT * FROM status WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_view);
		if(mysqli_num_rows($result) == 0){
			$errors['data_delete'] = 'Unknown ID';
		}
		
		if(count($errors) > 0){
			return [
				'status' => 'error',
				'message' => $errors,
			 ];
		}
		$sql_delete = "DELETE FROM status WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_delete);
			
			if(mysqli_error($db_connect)){
				die('Table Error:'.mysqli_error($db_connect));
			}
			
			return [
				'status' => 'success',
				'message' => 'status  Delete Successfull.',
			];
		
	}

    //Payment Method part
    
    function payment(){
        $db_connect = db_connect();
        $payment = mysqli_real_escape_string($db_connect,$_POST['payment']);

        $error = [];
        if(empty($payment)){
            $error['payment'] = 'payment Method is empty';
        }else{
            $sql_view = "SELECT * FROM payment_method WHERE payment = '$payment' " ;
			$results = mysqli_query($db_connect, $sql_view);
				if(mysqli_num_rows($results) == 1){
					$error['payment'] = ' payment_method Already Exists';
				}
        }
        
        if(count($error)> 0){
            return [
				'status' => 'error',
				'message' => $error,
			 ];
        }

        $sql_insert = "INSERT INTO payment_method(payment) VALUES ('$payment')";
        $result =  mysqli_query ($db_connect,$sql_insert);
        
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return [
            'status' => 'success',
            'message' => 'Payment Method added successfull',
        ];
    }
    function payment_method_view($starting_limit, $results_per_page) {
        $db_connect = db_connect();
        $sql_view = "SELECT * FROM payment_method LIMIT $starting_limit, $results_per_page";
        $payment_method_results = mysqli_query($db_connect, $sql_view);
        return $payment_method_results;
    }
    
	function payment_method_form_view() {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM payment_method";
		$payment_method_form_results = mysqli_query($db_connect, $sql_view);
		if (!$payment_method_form_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		return $payment_method_form_results;
	}
    function payment_delete(){
		$db_connect = db_connect();
		$id = $_POST['delete_id'];
		
		$errors=[];
		$sql_view = "SELECT * FROM payment_method WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_view);
		if(mysqli_num_rows($result) == 0){
			$errors['data_delete'] = 'Unknown ID';
		}
		
		if(count($errors) > 0){
			return [
				'status' => 'error',
				'message' => $errors,
			 ];
		}
		$sql_delete = "DELETE FROM payment_method WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_delete);
			
			if(mysqli_error($db_connect)){
				die('Table Error:'.mysqli_error($db_connect));
			}
			
			return [
				'status' => 'success',
				'message' => 'Payment Method  Delete Successfull.',
			];
		
	}
