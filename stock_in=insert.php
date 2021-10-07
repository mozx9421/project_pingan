<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "backend_db");
date_default_timezone_set('Asia/Bangkok');



// if(isset($_POST["product_id"]))
// {
    
    $query2 = "SELECT * FROM stock WHERE stock_id LIKE 'R%' ORDER BY runid DESC LIMIT 1";
    $result2 = mysqli_query($connect, $query2);
    $rs = mysqli_fetch_array($result2);
    $time = date("Y-m-d");

    //runid
    if($rs['stock_id'] != ""){   
        $check = substr($rs['stock_id'], 1,2);
        $date =  date("y")+43;

        if( $check == $date){
            $sub = substr($rs['stock_id'], 3,6)+1;
            $name = sprintf('R'.$date.sprintf("%'.003d\n", $sub)); 
        }else{
            $name = "R".$date."001";
        }
    }else{
        $date =  date("y")+43;
        $name = "R".$date."001"; 
    }
    

    foreach($_POST["data"] as $item){
        $sql = "INSERT INTO stock (stock_id, stock_status, stock_datetime, emp_id, product_id, product_count , product_exp)
        VALUE ('$name','$item[stock_status]','$time','$item[emp_id]','$item[product_id]','$item[product_qty]','$item[product_exp]')"; 
        if(mysqli_query($connect,$sql)){ 
            $sql2 = "SELECT * FROM product WHERE product_id = '$item[product_id]'";
            $result_sql2 = mysqli_query($connect, $sql2);
            $rs_2 = mysqli_fetch_array($result_sql2);
    
            $qty = $rs_2['product_qty'] + $item['product_qty'];
    //update qty
            $sql3 = "UPDATE product SET product_qty = '$qty' WHERE product_id ='$item[product_id]'";
            mysqli_query($connect,$sql3);
        }

    }



//  $product_id = $_POST["product_id"];
//  $product_qty = $_POST["product_qty"];
//  $stock_status = $_POST["stock_status"];
//  $stock_datetime = $_POST["stock_datetime"];
//  $product_exp = $_POST["product_exp"];
//  $emp_id = $_POST["emp_id"];
//  $query = '';
//  for($count = 0; $count<count($product_id); $count++)
//  {
//   $product_id_clean = mysqli_real_escape_string($connect, $product_id[$count]);
//   $product_qty_clean = mysqli_real_escape_string($connect, $product_qty[$count]);
//   $product_exp_clean = mysqli_real_escape_string($connect, $product_exp[$count]);
//   if($product_id_clean != '' && $product_qty_clean != ''&& $stock_status_clean != ''&& $product_exp_clean != ''&& $stock_id != ''&& $stock_datetime != ''&& $emp_id != '')
//   {
   
//    $query .= '
//    INSERT INTO stock(stock_id,stock_status,stock_datetime,emp_id,product_id,product_exp,product_count) 
//    VALUES("'.$stock_id.'","'.$stock_status.'","'.$stock_datetime.'","'.$emp_id.'","'.$product_id_clean.'","'.$product_exp_clean.'","'.$product_qty_clean.'"); 
//    ';
//   }
//  }
//  if($query != '')
//  {
//   if(mysqli_multi_query($connect, $query))
//   {
//    echo 'Item Data Inserted';
//   }
//   else
//   {
//    echo 'Error';
//   }
//  }
//  else
//  {
//   echo 'All Fields are Required';
//  }
// }
?>
