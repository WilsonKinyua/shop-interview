    <?php

        include "config/config.php";
        include "tcpdf/fpdf.php";

            $pdf = new FPDF('P','mm','A4');

            $pdf->AddPage();

            $pdf->SetFont('Arial','B',18);

            $pdf->Cell(130	,5,'AUTO-GENERATED DATA FROM THE DATABASE: PDF',0,0);
            $pdf->Cell(59	,5,'',0,1);

            $pdf->SetFont('Arial','B',10);
            
            $pdf->Cell(20	,5,'Id',1,0);
            $pdf->Cell(25	,5,'Store Owner',1,0);
            $pdf->Cell(25	,5,'Product',1,0);
            $pdf->Cell(34	,5,'Quantiy Available',1,0);
            $pdf->Cell(20	,5,'Sold',1,0);
            $pdf->Cell(37	,5,'Date',1,0);
            $pdf->Cell(30	,5,'Clear Status',1,1);

            $pdf->SetFont('Arial','',10);

            $query = "SELECT * FROM stock_mobile";
            $all_data = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($all_data)){

                $pdf->Cell(20	,5,$row['id'],1,0);
                $pdf->Cell(25	,5,$row['store_owner'],1,0);
                $pdf->Cell(25	,5,$row['product'],1,0);
                $pdf->Cell(34	,5,$row['quantity_available'],1,0);
                $pdf->Cell(20	,5,$row['sold'],1,0);
                $pdf->Cell(37	,5,$row['date'],1,0);
                $pdf->Cell(30	,5,$row['clear_status'],1,1,'R');
            }


            $pdf->Output();
    ?>