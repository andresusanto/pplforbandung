<?php namespace App\Utility;

use TCPDF;
use PDF;

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = public_path().'/logo.jpg';
        $this->Image($image_file, 10, 10, 30, 30, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->MultiCell(0, 15, "Laporan Bulanan Izin Angkutan\n Kota Bandung \n ATIA",0,'C');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function ColoredTable($header,$data,$w) {
        // Colors, line width and bold font
        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            for ($i=0;$i<$num_headers;++$i) {
                $this->Cell($w[$i], 6, $row[$i], 'LR', 0, 'L', $fill);
            }
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    public function PieLabel($txt, $xc, $yc, $r, $a, $b, $l, $h=0) {
        $angle = $a + $b / 2;

        if ($angle >= 270) {
          $angle = (360 - $angle) * M_PI / 180;
          $x0 = ($r + $l) * sin($angle);
          $y0 = ($r + $l) * cos($angle);

          $this->Text($xc - $x0 - strlen($txt), $yc - $y0 - $h, $txt);
        }
        else if ($angle >= 180 && $angle < 270) {
          $angle = ($angle - 180) * M_PI / 180;
          $x0 = ($r + $l) * sin($angle);
          $y0 = ($r + $l) * cos($angle);

          $this->Text($xc - $x0 - strlen($txt), $yc + $y0 - $h, $txt);
        }
        else if ($angle >= 90 && $angle < 180) {
          $angle = (180 - $angle) * M_PI / 180;
          $x0 = ($r + $l) * sin($angle);
          $y0 = ($r + $l) * cos($angle);

          $this->Text($xc + $x0, $yc + $y0 - $h, $txt);
        }
        else {
          $angle = $angle * M_PI / 180;
          $x0 = ($r + $l) * sin($angle);
          $y0 = ($r + $l) * cos($angle);

          $this->Text($xc + $x0, $yc - $y0 - $h, $txt);
        }
    }
}
