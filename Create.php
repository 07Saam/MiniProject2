<?php  
    session_start();
    include "../inc/dbinfo.inc"; 
    if(!$conn)
    {
        die ("Error error".mysql_error());                
    }     
    if(isset($_POST['submit']))
    {
        $FName =$_POST['fname'];
        $LName=$_POST['lname'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $Utype=$_POST['utype'];
        $password=$_POST['password'];
        if( $Utype=="Student")
        {
            $sql="Insert into student Values('$FName','$LName','$mobile','$email','$password');";
                    }
        else{
            $sql="Insert into faculty Values('$FName','$LName','$mobile','$email','$password');";
        }
       if(mysqli_query($conn,$sql))
       {
            echo "<script>alert('Inserted Succssesfully ..! ')</script>";
            $_SESSION['id'] = $conn->insert_id;
            echo "Please Wait........";
       }
       else
       {
        echo "Error: " . $sql . "<br>" . mysql_error();
       }
    }  
    header("Location:Login.php");
?>