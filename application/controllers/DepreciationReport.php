<?php

class DepreciationReport extends CI_Controller{

    function __construct() {
        parent::__construct();
        
        $this->load->library('Excel');
    }
    
    public function index() {
        
        //XX Query company from table for company dropdown
        $data['company'] = $this->Main_model->getCompany();
        //XX Query category from tabledetail parameter = 100 for category dropdown
        $data['category'] = $this->Main_model->getCategory();
        //XX Query month from tabledetail parameter = 101 for month dropdown
        $data['month'] = $this->Main_model->getMonth();

        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('report/depreciationReport/depreciationReport_index.php',$data);
        $this->load->view('report/depreciationReport/depreciationReport_js.php');
    }
    
    public function printReport() {
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        // Set document properties
        $objPHPExcel->getProperties()   ->setCreator("Maarten Balliauw")
                                        ->setLastModifiedBy("Maarten Balliauw")
                                        ->setTitle("Office 2007 XLSX Test Document")
                                        ->setSubject("Office 2007 XLSX Test Document")
                                        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                        ->setKeywords("office 2007 openxml php")
                                        ->setCategory("Test result file");
        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Hello')
                    ->setCellValue('B2', 'world!')
                    ->setCellValue('C1', 'Hello')
                    ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A4', 'Miscellaneous glyphs')
                    ->setCellValue('A5', 'ทดสอบ');

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
    
    public function exportExcel() {
        $this->load->library('PHPJasperXML');
        //XXX setting connect database
        $CI = &get_instance();
        $CI->load->database();
        $server = $CI->db->hostname;
        $user = $CI->db->username;
        $pass = $CI->db->password;
        $db = $CI->db->database;
        //XXX retrive value from view into array for add parameter for report

        $param = array(
            "company" => $this->input->post('company'),
            "category" => $this->input->post('cate'),
            "month" => $this->input->post('month'),
            "year" => $this->input->post('year')
        );      

        echo $param;
        $PHPJasperXML = new PHPJasperXML("en","XLS");
        //$PHPJasperXML->debugsql=true;
        $PHPJasperXML->arrayParameter=$param;
        $PHPJasperXML->load_xml_file("C:/xampp/htdocs/ss-das/assets/report/project.jrxml");

        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db); //* use this line if you want to connect with mysql   
        $PHPJasperXML->outpage(I,"./report/jasper.xls");
    }

}
 
