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
   $email = $_GET['email'];
   $phone = $_GET['phone'];
   
   echo "$fname";
?>
</body>
</html>