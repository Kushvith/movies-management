<?php
if(!empty($_FILES['csv_file']['name']))
{
    $file_data = fopen($_FILES['csv_file']['tmp_name'],'r');
    $column = fgetcsv($file_data);
    while($row = fgetcsv($file_data))
    {
        $row_data[] = array(
            'name' => $row[0],
            'place'  => $row[1],
            'totalcapacity' => $row[2],
        );
    }
    
    $output = array(
        'column'   => $column,
        'row_data' => $row_data
    );
    echo json_encode($output);
}
else{
    echo 'no csv file found';
}
?>