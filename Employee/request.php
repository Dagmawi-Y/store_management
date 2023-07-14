<?php
require_once("connection.php");
$error_code=$error_msg="";
if(isset($_POST["submit"]))
{
    $name=$_POST['name'];
    $itemname=$_POST['itemname'];
    $idno=$_POST['idno'];
    $category=$_POST['category'];
    $date=$_POST['date'];
    $number=$_POST['number'];
    $remark=$_POST["remark"];
    $Status=$_POST["status"];

if(empty($name)){
     $error_code=6;
     $error_msg="*please enter your name ";
 }
 elseif(empty($itemname)){
    $error_code=1;
    $error_msg="*please enter item name ";
}
 elseif(empty($idno)){
     $error_code=2;
     $error_msg="*please enter item code";
 } 
 elseif(empty($category)){
     $error_code=3;
     $error_msg="*please enter category";
 } 
 elseif(empty($date)){
     $error_code=4;
     $error_msg="Select course";
 } 
 elseif(empty($number)){
    $error_code=5;
    $error_msg="*please enter ";
} 
 
 else{
// //    mysql_connect(servername,username,password);
// //    mysql_query();
// //    mysql_select_db();
// //    mysql_close();

    $query="INSERT INTO request(id,Name,Itemname,Code,Category,Date,Quantity,Remark,Status)VALUES('','$name','$itemname', '$idno', '$category', '$date', '$number', '$remark','$Status')";
     $result=mysqli_query($con,$query);
     if($result==1){
        header('location: myrequest.php?registered');
     }
 }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="dashboards.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
    <title>Register Asset</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
   
            background-position: center;
            background-size: cover;
            font-family: 'Times New Roman', Times, serif;
            background-attachment: fixed;
        }
        .container{
            margin-top:10px;
        }
        .header{
            color: #e7a33c;
            padding: 20px 10px 10px 0;
            margin-left:5%;
            box-shadow: 2px 5px 30px rgba(0,0,0,0.3);
            
          
        }
        form{
            box-shadow: 2px 5px 30px rgba(0,0,0,0.3);
            width: 600px;
            max-width: 100%;
            min-width: 50%;
            margin-left:33%;
            overflow: hidden;
            padding:20px 20px 20px 100px;
            margin-top:20px;
           
        }
        .name{

            display: grid;
            grid-template-columns: 100px 3fr 1fr;
            column-gap: 20px;
            margin-bottom: 30px;
            position: relative;
            padding-top: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            text-transform: uppercase;
            color: #000;
            vertical-align: bottom;
            
        }
        .kinds{
            position: relative;
            display: grid;
            grid-template-columns: 100px 50px  50px 50px 50px 50px;
            padding-top: 20px;
            padding-bottom:30px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            text-transform: uppercase;
            color: #000;
        }
        .msg{
            color:red;
            padding-left:150px;
        }
        .h1{
            margin: 0;
             
        }
          .form{
 
            padding: 20px 20px;
        }

          input, #category{
            border: none;
            padding: 5px 10px;
            box-shadow: 2px 5px 30px rgba(0,0,0,0.3);
            background: transparent;
            outline: none;
            color: rgb(35, 135, 236);
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;


        }
        #category{
            width: 105%;
        }
        input:focus{
        border: 2px solid #3a7eec ;
      }
        ::placeholder{
          color: rgb(172, 158, 158);
     
      }
       .button{
            background-color:#e7a33c; 
            background-attachment: fixed;
            border: 2px solid #e7a33c;
            color: #fff;
            display: block;
            font-family: inherit;
            font-size: 16px;
            padding: 10px;
            width: 78%;
            margin-bottom:10px;
        }
        .button:hover{
            background-color: #3a7eec;
            border: 2px solid #3a7eec;
        }
        .side-menu{
            top:0
        }
        a{
			text-decoration:none !important;
		}
    </style>
</head>
<body>
<div class="side-menu" style="margin-left:0 !important">
        <div class="logo">
            <h1 style="color:rgb(245, 127, 17);   height: 10vh; display: flex;  margin: 10px auto 0px 10px;" >LINE BEZA</h1>
        </div>
        <ul>
            <li><a href="category.php"><img src="category.png" alt="">&nbsp;<span>Category</span></a> </li>
            <li> <a href="view.php"><img src="view.png" alt="">&nbsp;<span>View Item</span></a> </li>
            <li style="background-color:white"><a href="#"><img src="request.png" alt="">&nbsp;<span>Request Item</span> </a></li>
            <li> <a href="myrequest.php"><img src="request.png" alt="">&nbsp;<span>My Request</span></a> </li>
            <li><a href="login.php"><img src="logout.png" alt="">&nbsp;<span>Logout</span> </a></li>
        </ul>
    </div> 


	<div class="header">
		<h1 style="font-size:300%;" align="center">Request Asset</h1>
	</div>
    <form  method="POST" action="" >
    <div class="name">
        Requested By:   
        <input type="text" placeholder="Enter your name" id="name" name="name" >
        </div>
        <div class="msg">
            <?php if($error_code==6) echo $error_msg; ?>
        </div>
        <div class="name">
        Item Name:   
        <input type="text" placeholder="Enter item name" id="itemname" name="itemname" >
        </div>
        <div class="msg">
            <?php if($error_code==1) echo $error_msg; ?>
        </div>
        <div class="name">
        Item Code:
        <input type="text" placeholder="Enter new ID" id="idno" name="idno" >
        </div>
        <div class="msg">
            <?php if($error_code==2) echo $error_msg; ?>
        </div>
        <div class="name">
        Category:     
        <select name="category" id="category">
            <option value="-1">--select--</option>
            <option value="Drill">Drill</option>
            <option value="Grinder">Grinder</option>
            <option value="Screwdriver">Screwdriver</option>
            <option value="WeldingMachine">Welding Machine</option>
            <option value="Morsa">Morsa</option>
            <option value="Mord">Mord</option> 
            <option value="Pinsa">Pinsa</option> 
            <option value="Furniture">Furniture</option> 
            <option value="Other">Other</option> 
        </select>
        <div class="msg">
        <?php if($error_code==3) echo $error_msg; ?>
        </div>
        </div>
        <div class="name">
        Request Date:
        <input type="date" placeholder="" id="date" name="date" >
        </div>
        <div class="msg">
            <?php if($error_code==4) echo $error_msg; ?>
        </div>
        <div class="name">
        Quantity:
        <input type="number" placeholder="Enter no. of item" id="number" name="number" >
        </div>
        <div class="msg">
            <?php if($error_code==5) echo $error_msg; ?>
        </div>
        <div class="name">
        Remark:
        <input type="text" placeholder="Enter request description" id="remark" name="remark" >
        </div>
        <input type="hidden" placeholder="" id="status" name="status" value="Pending" >
        <input class="button" type="submit" name="submit" value="Submit">

   
    </form>
</div>
</body>
</html>