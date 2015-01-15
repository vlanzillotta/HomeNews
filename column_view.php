<?php
echo "<div class='vhp_columns_wrapper'>";
foreach ($column_tables as $column) {
    
    
           echo" <div class='vhp_column'>";
    foreach ($column as  $column_table) {
        echo $column_table;
    }
    echo "</div>";
}
echo "</div>";
?>  