<html>
<body>

Name: <?php echo $_POST["last_name"]; ?>
<br>

<?php

   //  This function reads the form "query string"
   //  
   // This function handles both an http "get".
   echo "Confirmation Page";
   //$title = $_GET['apr']; 
   //$heading = $_GET['term'];
   $fname = $_GET['first_name'];
   $lname = $_GET['last_name'];
   $address = $_GET['address'];
   $phone = $_GET['phone'];
   $items = $_GET['amount'];//verificar esta parte
   $totalCost = $_GET['total'];
   $cType = $_GET['card'];
   $eDate = $_GET['exp_date'];
   
   echo "$fname";
?>
</body>
</html>