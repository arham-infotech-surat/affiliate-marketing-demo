<?php 

		$response = "<table class='table table-striped table-bordered table-hover' width='100%'>";
		
		foreach($prod_details as $row)
		{
			$brand_name=$row['brand_name'];
			$cat_name=$row['cat_name'];
			$description=$row['product_desc'];

			$response.= "<tr>";
			$response.= "<th>Brand Name</th><td>".$brand_name."</td>";
			$response .= "</tr>";
			
			$response.= "<tr>";
			$response.= "<th>Category</th><td>".$cat_name."</td>";
			$response .= "</tr>";
			
			$response.= "<tr>";
			$response.= "<th style='vertical-align: baseline;'>Description</th>";
			$response.= "<td>".$description."</td>";
			$response .= "</tr>";
        }
        
		$response .= "</table>";
		
		echo $response;
		exit;
	?>