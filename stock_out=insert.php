<?php
//insert
$connect = mysqli_connect("localhost", "root", "", "backend_db");
date_default_timezone_set('Asia/Bangkok');

    $query2 = "SELECT * FROM stock WHERE stock_id LIKE 'T%' ORDER BY runid DESC LIMIT 1";
    $result2 = mysqli_query($connect, $query2);
    $rs = mysqli_fetch_array($result2);
    $time = date("Y-m-d H:i:s");

    //runid
    if($rs['stock_id'] != ""){   
        $check = substr($rs['stock_id'], 1,2);
        $date =  date("y")+43;

        if( $check == $date){
            $sub = substr($rs['stock_id'], 3,6)+1;
            $name = sprintf('T'.$date.sprintf("%'.003d\n", $sub)); 
        }else{
            $name = "T".$date."001";
        }
    }else{
        $date =  date("y")+43;
        $name = "T".$date."001"; 
    }
    
// insert data
    foreach($_POST["data"] as $item){
        $sql = "INSERT INTO stock (stock_id, stock_status, stock_datetime, emp_id, product_id, product_count)
        VALUE ('$name','$item[stock_status]','$time','$item[emp_id]','$item[product_id]','$item[product_qty]')"; 
        if(mysqli_query($connect,$sql)){ 
            $sql2 = "SELECT * FROM product WHERE product_id = '$item[product_id]'";
            $result_sql2 = mysqli_query($connect, $sql2);
            $rs_2 = mysqli_fetch_array($result_sql2);
            $qty = $rs_2['product_qty'] - $item['product_qty'];

            // while($row = $result_sql2->fetch_assoc()):
            //     $db_qty = $row['product_qty'];
            //   endwhile;
            
            // $result_qty = $db_qty - $qty;
    //update qty
            $sql3 = "UPDATE product SET product_qty = '$qty' WHERE product_id ='$item[product_id]'";
            mysqli_query($connect,$sql3);
        }

    }


