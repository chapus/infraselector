<?php

require_once('config/lang/eng.php');
require_once('tcpdf.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	
	protected $infra = "";

    //Page header
    public function Header() {
        // Logo
        $image_file = 'img/header/logo.jpg';
        $this->Image($image_file, 10, 5, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 11);
        // Title
		
		$html = '
				<p>Para consultas técnicas, aclaraciones y sugerencias llame sin costo al:  01 800 712 25 25 <br /> ó escríbanos a <u><span style="color:#0000FF;">servicioalcliente@infra.com.mx</span></u></p>
				';

        $this->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='R', $autopadding=true);
		$this->Line(10, 17, 285, 17);
		
    }
	
	
	public function SetInfra($type = null) {
		$this->infra = $type;
	}

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
		
		$html = 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages();
		$html2 = $this->infra;
				
        // Page number
        $this->writeHTMLCell($w=0, $h=0, $x='', $y=200, $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='R', $autopadding=true);
		$this->writeHTMLCell($w=0, $h=0, $x='', $y=200, $html2, $border=0, $ln=1, $fill=0, $reseth=true, $align='L', $autopadding=true);
		$this->Line(10, 198, 285, 198);
    }
}

?>