<?php

// ====================code to convert data from the database to excel==================
include "config/config.php";
$output = "";

    if(isset($_POST['export_excel'])) {

        $query = "SELECT * FROM stock_mobile";
        $all_data = mysqli_query($connection,$query);
        if(mysqli_num_rows($all_data) > 0) {
            $output .= '
            <table class="table" bordered="1">
                <tr>
                    <th>id</th>
                    <th>Store Owner</th>
                    <th>Product</th>
                    <th>Quantity Available</th>
                    <th>Sold</th>
                    <th>Date</th>
                    <th>Clear status</th>
                </tr>
            ';
            while($row = mysqli_fetch_array($all_data)) {

                $output .= '
                <tr>
                    <td>' . $row["id"]                  . '</td>
                    <td>' . $row["store_owner"]         . '</td>
                    <td>' . $row["product"]             . '</td>
                    <td>' . $row["quantity_available"]  .'</td>
                    <td>' . $row["sold"]                .'</td>
                    <td>' . $row["date"]                .'</td>
                    <td>' . $row["clear_status"]        .'</td>
                </tr>
                ';
            }
            $output .= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=shop.xls");
            echo $output;
        }
    }



?>