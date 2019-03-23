<?php 
header("Content-type: application/csv-tab-delimited-table" );
           header("Content-Disposition: attachment filename=\"export.csv\"" );
           header("Content-Description: fichier binaire" );
           header("Content-Transfer-Encoding: binary" );
           
           echo $csv; 
           
?>