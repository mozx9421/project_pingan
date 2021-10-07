<?php
//insert
$connect = mysqli_connect("localhost", "root", "", "backend_db");
date_default_timezone_set('Asia/Bangkok');

    $query2 = "SELECT * FROM stock WHERE stock_id LIKE 'I%' ORDER BY runid DESC LIMIT 1";
    $result2 = mysqli_query($connect, $query2);
    $rs = mysqli_fetch_array($result2);
    $time = date("Y-m-d H:i:s");

    $query3 = "SELECT * FROM stock WHERE stock_id LIKE 'D%' ORDER BY runid DESC LIMIT 1";
    $result3 = mysqli_query($connect, $query3);
    $rs1 = mysqli_fetch_array($result3);

    //runid
   
    
// insert data
    foreach($_POST["data"] as $item){
      if($item["stock_status"] == "ปรับเพิ่มสินค้า"){

        if($rs['stock_id'] != ""){   
          $check = substr($rs['stock_id'], 1,2);
          $date =  date("y")+43;
  
          if( $check == $date){
              $sub = substr($rs['stock_id'], 3,6)+1;
              $name = sprintf('I'.$date.sprintf("%'.003d\n", $sub)); 
          }else{
              $name = "I".$date."001";
          }
      }else{
          $date =  date("y")+43;
          $name = "I".$date."001"; 
      }

        $sql = "INSERT INTO stock (stock_id, stock_status, stock_datetime, emp_id, product_id, product_count , product_exp,stock_comment)
        VALUE ('$name','$item[stock_status]','$time','$item[emp_id]','$item[product_id]','$item[product_qty]','$item[product_exp]','$item[stock_comment]')"; 
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
        //---------------------------------------------------------------------------------------------------------------------------------------
        else{ 
          if($rs1['stock_id'] != ""){   
            $check = substr($rs1['stock_id'], 1,2);
            $date =  date("y")+43;
    
            if( $check == $date){
                $sub = substr($rs1['stock_id'], 3,6)+1;
                $name = sprintf('D'.$date.sprintf("%'.003d\n", $sub)); 
            }else{
                $name = "D".$date."001";
            }
        }else{
            $date =  date("y")+43;
            $name = "D".$date."001"; 
        }
          $sql = "INSERT INTO stock (stock_id, stock_status, stock_datetime, emp_id, product_id, product_count , product_exp,stock_comment)
        VALUE ('$name','$item[stock_status]','$time','$item[emp_id]','$item[product_id]','$item[product_qty]','$item[product_exp]','$item[stock_comment]')"; 
        if(mysqli_query($connect,$sql)){ 
            $sql2 = "SELECT * FROM product WHERE product_id = '$item[product_id]'";
            $result_sql2 = mysqli_query($connect, $sql2);
            $rs_2 = mysqli_fetch_array($result_sql2);
    
            $qty = $rs_2['product_qty'] - $item['product_qty'];
          } 
           $sql3 = "UPDATE product SET product_qty = '$qty' WHERE product_id ='$item[product_id]'";
            mysqli_query($connect,$sql3);
        }
    //update qty
           
       


    }


