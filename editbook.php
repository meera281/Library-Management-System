<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconnect.php';
    $sno = $_POST["sno"];
    $bookname = $_POST["bookname"];
    $bookauthor = $_POST["bookauthor"];
   
    $sql = "UPDATE `books` SET `bookname` = '$bookname', `bookauthor` = '$bookauthor' WHERE `books`.`sno` = '$sno' ";
    $result = mysqli_query($conn, $sql);
    echo '<script> alert("Book updated successfully")</script>';

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
           <!-- <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
           <h1 class="h3 mb-3 fw-bold">Edit Book</h1>
       
           <div class="form-floating">
             <input type="text" class="form-control" id="bookname" name="bookname" placeholder="name@example.com" required>
             <label for="bookname">Book Name</label>
           </div>
           <div class="form-floating mt-3">
             <input type="text" class="form-control" id="bookauthor" name="bookauthor" placeholder="bookauthor" required>
             <label for="bookauthor">Book Author</label>
           </div>

           <input type ="hidden" name= "sno" value= "<?php echo $_GET["sno"]; ?>" /> 
           <!-- it convert GET method into POST method -->
                
           <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Submit</button>
           
         </form>
       </main>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>