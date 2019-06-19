<?php
 require_once('db.php');
echo $dbLink ? 'conected'.'<br>' : 'not conected'.'<br>';

$file_ending = "csv";

$output         = "";
$table          = ""; // Enter Your Table Name

exportMysqlToCsv('product');

// Get The Field Name


$output .="\n";

// Get Records from the table

// Download the file

//$filename =  "myFile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
//header('Location : index.php?cmd=75');
exit();

function exportMysqlToCsv($table,$filename = 'product-ex.csv')
{
    $csv_terminated = "\n";
    $csv_separator = ",";
    $csv_separator_new_line = ",";
    $csv_enclosed = '"';
    $csv_escaped = "\\";
    $sql_query = "select * from $table";
    echo $sql_query;
 //exit();
    // Gets the data from the database
$result = mysqli_query($dbLink,"select * from $table");
    $fields_cnt = mysqli_num_fields($result);
 
 
    $schema_insert = '';
 
    for ($i = 0; $i < $fields_cnt; $i++)
    {
        $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
            stripslashes(mysql_field_name($result, $i))) . $csv_enclosed;
        $schema_insert .= $l;
        $schema_insert .= $csv_separator;
    } // end for
 
    $out = trim(substr($schema_insert, 0, -1));
    $out .= $csv_terminated;

    // Format the data
    while ($row = mysql_fetch_array($result))
    {
        $schema_insert = '';
        for ($j = 0; $j < $fields_cnt; $j++)
        {
            if ($row[$j] == '0' || $row[$j] != '')
            {
 

                if ($csv_enclosed == '')
                {
                    $schema_insert .= $row[$j];
                     
                } else
                {
                    $schema_insert .= $csv_enclosed .
                    str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
                    
                }
            } else
            {
                $schema_insert .= '';
            }
 
            if ($j < $fields_cnt - 1)
            {
                $schema_insert .= $csv_separator;
            }
            
        } // end for
        //$sql="select product_id,product_name,qty,unit_price,price_paid from $subtable where order_id=".$row['id'];
//      $res=mysql_query($sql);
//      if(mysql_num_rows($res) > 0)
//      {
//          $sub_field_count=mysql_num_fields($res);
//          $schema_insert .= $csv_terminated;
//          $schema_insert .= $csv_separator;
//          for ($i = 0; $i < $sub_field_count; $i++)
//          {   
//              $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
//                  stripslashes(mysql_field_name($res, 1))) . $csv_enclosed;
//              $schema_insert .= $l;
//              $schema_insert .= $csv_separator;
//          } 
//          $schema_insert .= $csv_terminated;
//          $schema_insert .= $csv_separator;
//          $ii=0;
//          while($data=mysql_fetch_array($res))
//              {
//                  for ($j = 0; $j < $sub_field_count; $j++)
//                  {
//                      if ($data[$j] == '0' || $data[$j] != '')
//                      {
//           
//                          if ($csv_enclosed == '')
//                          {
//                              $schema_insert .= $data[$j];
//                          } else
//                          {
//                              $schema_insert .= $csv_enclosed .
//                              str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $data[$j]) . $csv_enclosed;
//                          }
//                      } else
//                      {
//                          $schema_insert .= '';
//                      }
//           
//                      if ($j < $sub_field_count - 1)
//                      {
//                          $schema_insert .= $csv_separator;
//                      }
//                      
//                  } // end for
//                  $ii++;
//                  if(mysql_num_rows($res) > $ii)
//                  {
//                  $schema_insert.=$csv_terminated ;       
//                  }
//                  $schema_insert .= $csv_separator;
//                  
//                  
//              }
//      }


        
        $out .= $schema_insert;
        $out .= $csv_terminated;
    } // end while

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Length: " . strlen($out));
    // Output to browser with appropriate mime type, you choose ;)
    header("Content-type: text/x-csv");
    //header("Content-type: text/csv");
    //header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=$filename");
    echo $out;
    exit;
 
}
?>