<?php

    include "config/config.php";
    include "include/header.php";
    include "tcpdf/fpdf.php";

?>

<div class="table-body mt-5">
    <h1 class="m-5 text-center" style="text-decoration: underline;">LIVE DATA SEARCH</h1>
    <div class="m-3">
        <div class="d-flex justify-content-between">
            <div class="col-md-6">
                <select name="search_filter" id="search_filter" class="form-control selectpicker">
                    <option value=''>Select Stock Owner</option>
                    <?php
                    $query = "SELECT * FROM stock_mobile";
                    $data = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($data)) {
                        echo '<option value="' . $row["store_owner"] . '">' . $row["store_owner"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
<!-- ===============================================To generate the pdf =========================================== -->
                <a href="generate_pdf.php" class="btn btn-primary btn-sm">Generate Pdf</a>
            </div>
            <div>
<!-- ===============================================To generate the excel ========================================= -->
                <form action="excel.php" method="post">
                    <input type="submit" name="export_excel" value="Export to Excel" class="btn btn-primary btn-sm" />
                </form>
                
            </div>
        </div>
    </div>
    <input type="hidden" name="store_owner" id="store_owner" />
    <div style="clear:both"></div>
    <?php
    if (isset($_SESSION['danger'])) {
        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['danger']  . "</div>";
        unset($_SESSION['danger']);
    }
    ?>
    <?php
    if (isset($_SESSION['success'])) {
        echo "<div class='alert alert-success' role='alert'>" . $_SESSION['success']  . "</div>";
        unset($_SESSION['success']);
    }
    ?>
    <div class="table100 ver1 m-b-110 table-responsive">
        <div class="table100-head mb-4">
            <table>
                <thead>
                    <tr class="row100 head">
                        <th class="cell100 column1">id</th>
                        <th class="cell100 column2">Store Owner</th>
                        <th class="cell100 column3">Product</th>
                        <th class="cell100 column4">Quantity Available</th>
                        <th class="cell100 column5">Sold</th>
                        <th class="cell100 column6">Date</th>
                        <th class="cell100 column7">Clear status</th>
                        <th class="cell100 column8">Edit</th>
                        <th class="cell100 column9">Delete</th>
                    </tr>
                </thead>
            </table>
        </div>
    

        <div class="table100-body js-pscroll mt-3">
            <table>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "include/footer.php" ?>