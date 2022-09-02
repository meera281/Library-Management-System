<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "dbconnect.php";
$issueto = $_POST["issueto"];
$sno = $_POST["sno"];

$sql = "SELECT * FROM `login` WHERE username = '$issueto'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0){
     echo '<script> alert("You are not a registered user") </script>';
}
else{
$sql2 = "UPDATE `books` SET `issueto` = '$issueto' WHERE `books`.`sno` = '$sno'";
$result2 = mysqli_query($conn, $sql2);
echo '<script> alert("Book has been issued successfully")</script>';
}

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>edit book</title>
  </head>
  <body>

 
   
  <div class="container mt-4 col-lg-6 bg-light">
       
       <main class="form-signin text-center">
         <form method="post" action="">
         <!-- < ?php echo htmlspecialchars($_SERVER["PHP_SELF"])?> -->

           <h1 class="h3 mb-3 fw-bold">Issue Book</h1>
       
           <div class="form-floating">
             <input type="text" class="form-control" id="issueto" name="issueto" placeholder="name@example.com" required>
             <label for="issueto">Issue to</label>
           </div>
                
           <input type="hidden" name="sno" value="<?php echo $_GET["sno"]?>">
           <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Submit</button>
           
         </form>
       </main>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>