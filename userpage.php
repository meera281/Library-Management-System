<?php
session_start();
include "dbconnect.php";
$name= $_SESSION['username'];
$sql = "SELECT * FROM `books` WHERE issueto='$name'";
$result = mysqli_query($conn, $sql);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>User Page</title>
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
          <a class="nav-link active" aria-current="page" href="userpage.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<h1 class= "text-center">Welcome <?php echo $_SESSION["username"] ?><h1>

<div class= "container mt-3">
<table class="table table-bordered border-dark text-center" >
  <thead>
    <tr scope="row">
      <th scope="col">S.No</th>
      <th scope="col">Book Name</th>
      <th scope="col">Book Author</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($array= mysqli_fetch_assoc($result)){

      echo "<tr>";
      echo "<td>" . $array["sno"] . "</td>";
      echo "<td>" . $array["bookname"] . "</td>";
      echo "<td>" . $array["bookauthor"] . "</td>";
      echo"</tr>";
    }
    ?>
  </tbody>
</table>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
  </body>
</html>