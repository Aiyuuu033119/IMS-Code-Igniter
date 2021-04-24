<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;
use PhpOffice\PhpSpreadsheet\Worksheet;

class Reports extends CI_Controller {

    public function __construct(){
		parent::__construct();

        $this->load->helper('url');
        $this->load->model('Admin_Model', 'admin');

		// new models
		$this->load->model('Stock_Model', 'stock');
		$this->load->model('Products_Model', 'products');
		$this->load->model('Orders_Model', 'orders');
		$this->load->model('Inventory_Model', 'inventory');

	}

    public function stocklist(){
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Name');
		$sheet->setCellValue('B1', 'Quantity');
		$sheet->setCellValue('C1', 'Price');
		
		$info = $this->stock->get('goods_table','');

		$start = 2;
		
        foreach($info as $d){
			
            $sheet->setCellValue('A'.$start, $d->name);
			$sheet->setCellValue('B'.$start, $d->quantity);
			$sheet->setCellValue('C'.$start, $d->price);
		
		    $start = $start+1;
		}
		
		
		$styleThinBlackBorderOutline = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
		
		$sheet->getColumnDimension('A')->setWidth(50);
		$sheet->getColumnDimension('B')->setWidth(30);
		$sheet->getColumnDimension('C')->setWidth(30);

		$curdate = date('d-m-Y H:i:s');

		$writer = new Xlsx($spreadsheet);

		$filename = 'Stock List -'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
    }

    public function productlist(){
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Name');
		$sheet->setCellValue('B1', 'Quantity');
		$sheet->setCellValue('C1', 'Price');
		
		$info = $this->products->get('goods_table',"");
		$start = 2;
		
        foreach($info as $d){
			
            $sheet->setCellValue('A'.$start, $d->name);
			$sheet->setCellValue('B'.$start, $d->quantity);
			$sheet->setCellValue('C'.$start, $d->price);
		
		    $start = $start+1;
		}
		
		
		$styleThinBlackBorderOutline = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
		
		$sheet->getColumnDimension('A')->setWidth(50);
		$sheet->getColumnDimension('B')->setWidth(30);
		$sheet->getColumnDimension('C')->setWidth(30);

		$curdate = date('d-m-Y H:i:s');

		$writer = new Xlsx($spreadsheet);

		$filename = 'Product List -'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
    }

    public function orderlist($date){
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Name');
		$sheet->setCellValue('B1', 'Quabtity');
		$sheet->setCellValue('C1', 'Total');
		$sheet->setCellValue('D1', 'Time');
		$sheet->setCellValue('E1', 'Date');
		
		$info = $this->orders->get('invent_table', array('date' => $date), '');
		$start = 2;
		
        foreach($info as $d){
			
            $sheet->setCellValue('A'.$start, $d->name);
			$sheet->setCellValue('B'.$start, $d->quantity);
			$sheet->setCellValue('C'.$start, $d->total);
			$sheet->setCellValue('D'.$start, substr($d->time, 11, 8));
            $sheet->setCellValue('E'.$start, $d->date);
		
		    $start = $start+1;
		}
		
		
		$styleThinBlackBorderOutline = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
		
		$sheet->getColumnDimension('A')->setWidth(50);
		$sheet->getColumnDimension('B')->setWidth(30);
		$sheet->getColumnDimension('C')->setWidth(30);
		$sheet->getColumnDimension('D')->setWidth(30);
		$sheet->getColumnDimension('E')->setWidth(30);

		$curdate = date('d-m-Y H:i:s');

		$writer = new Xlsx($spreadsheet);

		$filename = 'Order List-'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
    }

    public function inventlist($date){
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Name');
		$sheet->setCellValue('B1', 'Quabtity');
		$sheet->setCellValue('C1', 'Total');
		
		$info = $this->inventory->get('invent_table', array('date' => $date), '');
		$start = 2;
		
        foreach($info as $d){
			
            $sheet->setCellValue('A'.$start, $d->name);
			$sheet->setCellValue('B'.$start, $d->quantity);
			$sheet->setCellValue('C'.$start, $d->total);
		
		    $start = $start+1;
		}
		
		
		$styleThinBlackBorderOutline = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
		
		$sheet->getColumnDimension('A')->setWidth(50);
		$sheet->getColumnDimension('B')->setWidth(30);
		$sheet->getColumnDimension('C')->setWidth(30);

		$curdate = date('d-m-Y H:i:s');

		$writer = new Xlsx($spreadsheet);

		$filename = 'Inventory List-'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
    }


    public function admin(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Name');
		$sheet->setCellValue('B1', 'Email');
		$sheet->setCellValue('C1', 'Status');
		

		$info = $this->admin->get('user_table','');
		$start = 2;
		
        foreach($info as $d){
			
            $sheet->setCellValue('A'.$start, $d->name);
			$sheet->setCellValue('B'.$start, $d->email);
			$sheet->setCellValue('C'.$start, $d->status);
		
		    $start = $start+1;
		}
		
		
		$styleThinBlackBorderOutline = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
		
		$sheet->getColumnDimension('A')->setWidth(15);
		$sheet->getColumnDimension('B')->setWidth(50);
		$sheet->getColumnDimension('C')->setWidth(50);

		$curdate = date('d-m-Y H:i:s');

		$writer = new Xlsx($spreadsheet);

		$filename = 'Admin List-'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
    }

}


?>