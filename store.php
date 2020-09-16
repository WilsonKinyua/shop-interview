<?php

    include "config/config.php";

    if($_POST["query"] != '') {

            $search_array       = explode(",", $_POST["query"]);
            $store_owner        = "'" . implode("', '", $search_array) . "'";
            $query              = "SELECT * FROM stock_mobile WHERE store_owner = " . $store_owner;

    } else {

             $query   = "SELECT * FROM stock_mobile";
    }

            $data       = mysqli_query($connection, $query);

     while($row = mysqli_fetch_assoc($data)) {

            $date_create = date_create($row['date']);
            $date = date_format($date_create, 'g:ia \o\n l jS F Y');
            $id = $row['id'];
            echo '<tr class="row100 body">';
            echo "<td class='column1'>"                             . $id                           . "</td>";
            echo "<td class='column2'>"                             . $row['store_owner']           . "</td>";
            echo "<td class='column3'>"                             . $row['product']               . "</td>";
            echo "<td class='column4'>"                             . $row['quantity_available']    . "</td>";
            echo "<td class='column5'><a href='sold.php?sold=$id'>" . $row['sold']  . "</a></td>";
            echo "<td class='column6'>"                             . $date                         . "</td>";
            echo "<td class='column7'>"                             . $row['clear_status']          . "</td>";
            echo "<td class='column8'><a class='btn btn-primary btn-sm' href='edit.php?edit=$id'>Edit</a></td>";
            echo "<td class='column9'><a class='btn btn-danger btn-sm' href='delete.php?delete=$id'>Delete</a></td>";
            echo "</tr>";

         }
