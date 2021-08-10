<?php 
		$response = "<table class='table table-striped table-bordered table-hover' width='100%'>";
		$response.= "<tr>";
		$response.= "<th>Company Name</th>";
		$response.= "<th>GST PAN No.</th>";
		$response.= "<th>Address</th>";
		$response.= "<th>Transport Name</th>";
		$response.= "<th>Date Added</th>";
		$response.= "<th>Date Updated</th>";
		$response .= "</tr>";
		foreach($custdetails as $row)
		{
			$company_name=$row['company_name'];
		    $gst_pan_no=$row['gst_pan_no'];
		    $address=$row['address'];
		    $transport_name=$row['transport_name'];
		    $is_deleted=$row['is_deleted'];
		    $date_added=$row['date_added'];
		    $date_updated=$row['date_updated'];

			$response.= "<tr>";
			$response.= "<td>".$company_name."</td>";
			$response.= "<td>".$gst_pan_no."</td>";
			$response.= "<td>".$address."</td>";
			$response.= "<td>".$transport_name."</td>";
			$response.= "<td>".$date_added."</td>";
			$response.= "<td>".$date_updated."</td>";
			$response .= "</tr>";
        }
        
		$response .= "</table>";
		
		echo $response;
		exit;
	?>