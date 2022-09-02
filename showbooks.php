<?php
session_start();
include "dbconnect.php";
$sql = "SELECT * FROM `books`";
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

    <title>Show Books</title>
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

<div class= "container mt-3">
<table class="table table-bordered border-dark text-center" >
  <thead>
    <tr scope="row">
      <th scope="col">S.No</th>
      <th scope="col">Book Name</th>
      <th scope="col">Book Author</th>
      <th scope="col">Issued to</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($array= mysqli_fetch_assoc($result)){

      echo "<tr>";
      echo "<td>" . $array["sno"] . "</td>";
      echo "<td>" . $array["bookname"] . "</td>";
      echo "<td>" . $array["bookauthor"] . "</td>";
      echo "<td>" . $array["issueto"] . "</td>";
      echo "<td>";
      ?>
       <a href= "editbook.php/?sno=<?php echo $array["sno"] ?>"> <button type="button" class="btn btn-primary" name="edit">Edit</button> </a>
       <a href= "deletebook.php/?sno=<?php echo $array["sno"] ?>"> <button type="button" class="btn btn-danger" name="delete">Delete</button> </a>
       <a href= "issuebook.php/?sno=<?php echo $array["sno"] ?>"> <button type="button" class="btn btn-warning" name="issue">Issue</button> </a>
        <!-- /? refers to get method -->
      <?php
      echo "</td>";
      echo"</tr>";
    }
    ?>
  </tbody>
</table>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   

  </body>
</html>