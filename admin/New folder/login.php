<?php 
session_start();
        if(isset($_REQUEST['Username'])){
				//connection
                  include("dbconfig.php");
				//รับค่า user & password
                  $Username = $_REQUEST['Username'];
                  $Password = md5($_REQUEST['Password']);
				//query 
                  $sql="SELECT * FROM customers Where Username='".$Username."' and Password='".$Password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"] = $row["cid"];
                      $_SESSION["fullname"] = $row["fullname"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];

                      if($_SESSION["Userlevel"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: admin/indexadmin.php");

                      }

                      if ($_SESSION["Userlevel"]==""){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        Header("Location: index.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: form_login.php"); //user & password incorrect back to login again

        }
?>