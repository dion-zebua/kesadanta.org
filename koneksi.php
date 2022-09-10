<?php
    // konek
    $konek = mysqli_connect("sql200.epizy.com","epiz_32439731","WILynRN9K5Ds","epiz_32439731_kesadanta_db");

    function query($query) {

        global $konek;

        $result = mysqli_query($konek, $query);
        $rows = [];

        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }
?>