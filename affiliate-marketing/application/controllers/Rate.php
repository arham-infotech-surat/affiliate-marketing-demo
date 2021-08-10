<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Rate_Modal');
	    $this->load->library('form_validation');
		$this->load->helper('login');
	   // $this->tbl_page="tbl_page";
	   if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	}

//--------------------------------------------- Index Page --------------------------------------->
	public function viewrate()
	{
		$data['result'] = $this->Rate_Modal->fetch_rates();
		$this->load->view('admin/rate-view',$data);
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Delete Rate ----------------------------------------------->
	public function delete_Rate()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$Rid = 0;
			}
			else
			{
				$Rid = $this->uri->segment(3);
			}
			
			$result = $this->Rate_Modal->delete_single_rate($Rid);
			
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Rate/viewrate');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Rate/viewrate');
			}
		}
		
		
		public function get_Ratedata()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$Rid = 0;
			}
			else
			{
				$Rid = $this->uri->segment(3);
			}
			
			$result['data'] = $this->Rate_Modal->fetch_ratedata($Rid);
			$this->load->view('admin/update_rate',$result);
		}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Index Page --------------------------------------->
	public function rate_add()
	{
		if($this->input->post('register')) //if(isset($_POST['register']))
		{
			// echo "hii"; die;
				$country 	= $this->input->post('country'); 
				$service 	= $this->input->post('service');
				$gm500 		= $this->input->post('gm500');
				$kg1 		= $this->input->post('kg1');
				$kg1_5 		= $this->input->post('kg1_5');
				$kg2 		= $this->input->post('kg2');
				$kg2_5 		= $this->input->post('kg2_5');
				$kg3 		= $this->input->post('kg3');
				$kg3_5		= $this->input->post('kg3_5');
				$kg4 		= $this->input->post('kg4');
				$kg4_5 		= $this->input->post('kg4_5');
				$kg5 		= $this->input->post('kg5');
				$kg5_5 		= $this->input->post('kg5_5');
				$kg6 		= $this->input->post('kg6');
				$kg7_10 	= $this->input->post('kg7_10');
				$kg11_16	= $this->input->post('kg11_16');
				$kg17_20	= $this->input->post('kg17_20');
				$kg21_30 	= $this->input->post('kg21_30');
				$kg31_50 	= $this->input->post('kg31_50');
				$kg51_70 	= $this->input->post('kg51_70');
				$kg100p	 	= $this->input->post('kg100p');
				$days	 	= $this->input->post('days');
				//echo "<pre>";
				//print_r($_POST);
				$data = array(
					'country'	=>  $country,
					'service'	=>  $service,
					'gm500'		=>  $gm500,
					'kg1' 		=>  $kg1,
					'kg1_5'		=>  $kg1_5,
					'kg2'		=>  $kg2,
					'kg2_5' 	=>  $kg2_5,
					'kg3' 		=>  $kg3,
					'kg3_5' 	=>  $kg3_5,
					'kg4'		=>  $kg4,
					'kg4_5' 	=>  $kg4_5,
					'kg5' 		=>  $kg5,
					'kg5_5' 	=>  $kg5_5,
					'kg6' 		=>  $kg6,
					'kg7_10' 	=>  $kg7_10,
					'kg11_16' 	=>  $kg11_16,
					'kg17_20' 	=>  $kg17_20,
					'kg21_30' 	=>  $kg21_30,
					'kg31_50' 	=>  $kg31_50,
					'kg51_70' 	=>  $kg51_70,
					'kg100p' 	=>  $kg100p,
					'days'		=>  $days
				);
					
				$result = $this->Rate_Modal->insert_rate($data);
				if($result)
				{
					//$this->db->insert('user_table',$data);
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Rate/viewrate');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Rate/viewrate');
				}
		}	
		else
		{
			$this->load->view('admin/add-rate');
		}
	}
//--------------------------------------------- End ----------------------------------------------->

//-------------------------------Update----------------------------------------------
public function rate_update()
	{
		if($this->input->post('update')) //if(isset($_POST['register']))
		{
			// echo "hii"; die;
				$country 	= $this->input->post('country'); 
				$service 	= $this->input->post('service');
				$gm500 		= $this->input->post('gm500');
				$kg1 		= $this->input->post('kg1');
				$kg1_5 		= $this->input->post('kg1_5');
				$kg2 		= $this->input->post('kg2');
				$kg2_5 		= $this->input->post('kg2_5');
				$kg3 		= $this->input->post('kg3');
				$kg3_5		= $this->input->post('kg3_5');
				$kg4 		= $this->input->post('kg4');
				$kg4_5 		= $this->input->post('kg4_5');
				$kg5 		= $this->input->post('kg5');
				$kg5_5 		= $this->input->post('kg5_5');
				$kg6 		= $this->input->post('kg6');
				$kg7_10 	= $this->input->post('kg7_10');
				$kg11_16	= $this->input->post('kg11_16');
				$kg17_20	= $this->input->post('kg17_20');
				$kg21_30 	= $this->input->post('kg21_30');
				$kg31_50 	= $this->input->post('kg31_50');
				$kg51_70 	= $this->input->post('kg51_70');
				$kg100p	 	= $this->input->post('kg100p');
				$days	 	= $this->input->post('days');
				//echo "<pre>";
				//print_r($_POST);
				$data = array(
					'country'	=>  $country,
					'service'	=>  $service,
					'gm500'		=>  $gm500,
					'kg1' 		=>  $kg1,
					'kg1_5'		=>  $kg1_5,
					'kg2'		=>  $kg2,
					'kg2_5' 	=>  $kg2_5,
					'kg3' 		=>  $kg3,
					'kg3_5' 	=>  $kg3_5,
					'kg4'		=>  $kg4,
					'kg4_5' 	=>  $kg4_5,
					'kg5' 		=>  $kg5,
					'kg5_5' 	=>  $kg5_5,
					'kg6' 		=>  $kg6,
					'kg7_10' 	=>  $kg7_10,
					'kg11_16' 	=>  $kg11_16,
					'kg17_20' 	=>  $kg17_20,
					'kg21_30' 	=>  $kg21_30,
					'kg31_50' 	=>  $kg31_50,
					'kg51_70' 	=>  $kg51_70,
					'kg100p' 	=>  $kg100p,
					'days'		=>  $days
				);
					
				$result = $this->Rate_Modal->update_rate($data);
				if($result)
				{
					//$this->db->insert('user_table',$data);
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Rate/viewrate');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Rate/rate_add');
				}
			
			
		}	
	}
	
//--------------------------IMPORT-----------------
    	public function importFile()
	{
			if ($this->input->post('submit')) 
			{
					$path = 'assets/Uploads/Images/';
					
					//$this->load->library('PHPExcel');
					require_once APPPATH . "/third_party/PHPExcel.php";
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'xlsx|xls|csv';
					$config['remove_spaces'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);            
					if (!$this->upload->do_upload('uploadFile')) {
					$error = array('error' => $this->upload->display_errors());
					} else {
					$data = array('upload_data' => $this->upload->data());
					}
					if(empty($error)){
					if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
					} else {
					$import_xls_file = 0;
					}
					$inputFileName = $path . $import_xls_file;
					try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					foreach ($allDataInSheet as $value) {
					if($flag){
					$flag =false;
					continue;
					}
					$inserdata[$i]['country'] = $value['A'];
					$inserdata[$i]['service'] = $value['B'];
					$inserdata[$i]['gm500'] = $value['C'];
					$inserdata[$i]['kg1'] = $value['D'];
					$inserdata[$i]['kg1_5'] = $value['E'];
					$inserdata[$i]['kg2'] = $value['F'];
					$inserdata[$i]['kg2_5'] = $value['G'];
					$inserdata[$i]['kg3'] = $value['H'];
					$inserdata[$i]['kg3_5'] = $value['I'];
					$inserdata[$i]['kg4'] = $value['J'];
					$inserdata[$i]['kg4_5'] = $value['K'];
					$inserdata[$i]['kg5'] = $value['L'];
					$inserdata[$i]['kg5_5'] = $value['M'];
					$inserdata[$i]['kg6'] = $value['N'];
					$inserdata[$i]['kg7_10'] = $value['O'];
					$inserdata[$i]['kg11_16'] = $value['P'];
					$inserdata[$i]['kg17_20'] = $value['Q'];
					$inserdata[$i]['kg21_30'] = $value['R'];
					$inserdata[$i]['kg31_50'] = $value['S'];
					$inserdata[$i]['kg51_70'] = $value['T'];
					$inserdata[$i]['kg100p'] = $value['U'];
					$inserdata[$i]['days'] = $value['V'];
					$i++;
					}               
					$result = $this->Rate_Modal->insert($inserdata);   
					if($result){
					echo "Imported successfully";					redirect('Rate/viewrate');
					}else{
					echo "ERROR !";
					}             
					} catch (Exception $e) {
					die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
					. '": ' .$e->getMessage());
					}
					}else{
					echo $error['error'];
					}
					}
					redirect('Rate/viewrate');
					//$this->load->view('import');
			}
//--------------------END-------------------------

//----------------EXPORT-------------------------------------
      public function generateXls() {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->Rate_Modal->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'country');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'service');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'gm500');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'kg1');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'kg1_5');    
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'kg2');    
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'kg2_5');    
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'kg3');    
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'kg3_5');    
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'kg4');    
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'kg4_5');    
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'kg5');    
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'kg5_5');    
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'kg6');    
		$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'kg7_10');    
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'kg11-16');    
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'kg17-20');    
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'kg21-30');    
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'kg31-50');    
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'kg51-70');
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'kg100p');    
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'days');    
		
        // set Row
        $rowCount = 2;
		
		
		
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->country);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->service);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->gm500);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->kg1);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->kg1_5);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->kg2);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->kg2_5);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->kg3);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->kg3_5);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->kg4);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->kg4_5);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->kg5);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->kg5_5);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list->kg6);
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $list->kg7_10);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $list->kg11_16);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $list->kg17_20);
            $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $list->kg21_30);
            $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $list->kg31_50);
            $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $list->kg51_70);
            $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $list->kg100p);
            $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $list->days);
            $rowCount++;
        }
        $filename = "Rate.". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 
    }
//----------------END-----------------------------------------

//------------------------------end-------------------------------------------		
	function readExcel()
	{
		//echo "hieee";die;
		$this->load->library('csvreader');
		$csvfile = $this->input->post('csvfile');
        
		//echo "<pre>";
		//print_r($_POST);die;
        $result = $this->Rate_Modal->parse_file($csvfile);//path to csv file
        $data['csvData'] =  $result;
	}
	
}


