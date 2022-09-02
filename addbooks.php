<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "dbconnect.php";
    $bookname = $_POST["bookname"];
    $bookauthor = $_POST["bookauthor"];

    $sql = "SELECT * FROM `books` WHERE bookname ='$bookname' AND bookauthor = '$bookauthor' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      echo '<script> alert("A book of the same name is already existed")</script>';
    }
    else{
         $sql2 = "INSERT INTO `books` (`bookname`, `bookauthor`) VALUES ('$bookname', '$bookauthor')";
        $result2 = mysqli_query($conn, $sql2);
        echo '<script> alert("Book added successfully")</script>';

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

    <title>Welcome</title>
  </head>
  <body>

  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adminpage.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addbooks.php" >Add Books</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="showbooks.php">Show Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav> 


<div class="container mt-4 col-lg-6 bg-light">
       
       <main class="form-signin text-center">
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
           <!-- <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
           <h1 class="h3 mb-3 fw-bold">Add Books</h1>
       
           <div class="form-floating">
             <input type="text" class="form-control" id="bookname" name="bookname" placeholder="name@example.com" required>
             <label for="bookname">Book Name</label>
           </div>
           <div class="form-floating mt-3">
             <input type="text" class="form-control" id="bookauthor" name="bookauthor" placeholder="bookauthor" required>
             <label for="bookauthor">Book Author</label>
           </div>
                
           <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Submit</button>
           
         </form>
       </main>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   

  </body>
</html>