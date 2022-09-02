<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'dbconnect.php';

  $username = $_POST["username"];
  $password = $_POST["password"];
  
 // $sql ="SELECT * FROM `login` WHERE username ='$username' AND password = '$password' ";
  $sql  = "SELECT * FROM `login` WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  
  if($num == 1){
    while($row = mysqli_fetch_assoc($result)){
    //  echo $row["password"];
    // $pw = $row["password"];
    if(password_verify($password, $row["password"])){

    // echo $row["role"];

    if( $row["role"] == "Admin" ){
      session_start();
      $_SESSION["username"]= $username;
      header("location: adminpage.php");
    }
    else if($row["role"] == "User")
    {
      session_start();
      $_SESSION["username"]= $username;
      header("location: userpage.php");
    }
  }
  else{
    echo '<script> alert("Please enter a valid password")</script>';
  }
}
  }
  else
  {
      echo '<script> alert("You have not signed up")</script>';
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

    <title>Signup</title>
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
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Signup</a>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<div class="container mt-4 col-lg-6 bg-light">
       
       <main class="form-signin text-center">
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
           <!-- <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
           <h1 class="h3 mb-3 fw-bold">Login</h1>
       
           <div class="form-floating">
             <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com" required>
             <label for="username">Username</label>
           </div>
           <div class="form-floating mt-3">
             <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
             <label for="password">Password</label>
           </div>
                
           <!-- <button class="w-100 btn btn-lg btn-link mb-3" type="submit">Forgot Password</button> -->
           <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
           <a href = "forgetpw.php"><button class="w-100 btn btn-lg btn-primary mt-3" type="button" >Forgot Password</button></a>
           
         </form>
       </main>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    
  </body>
</html>