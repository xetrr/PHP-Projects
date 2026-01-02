<?php
ob_start();
session_start();
$pageTitle = "Login";

if (isset($_SESSION["user"])) {
    header("location: dashboard.php"); //if logged in >> go to dashboard
    exit();
}

// Process POST data BEFORE including init.php (which outputs HTML)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include connect.php for database connection
    include 'admin/connect.php';

    $user = $_POST["user"];
    $pass = $_POST["password"];
    $hashedpass = sha1($pass);

    $stmt = $con->prepare("SELECT * FROM users WHERE Username= ? AND Password = ?");
    $stmt->execute(array($user, $hashedpass));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    if ($count > 0) {
        $_SESSION["user"] = $user;
        $_SESSION["ID"]   = $row['user_id'];
        header("location: dashboard.php");
        exit();
    }
}

include 'init.php';

// compare the variables with the one in the DB

?>

<div class="container-sm login-page">
    <h3 class="text-center">
        <span class="selected" data-class="login">Login</span> |
        <span class="" data-class="signup">Signup</span>
    </h3>

    <!-- start login form  -->
    <form class="login-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">user name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="user" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" value="login">Submit</button>
    </form>

    <!-- start signup form -->
    <form class="signup-form">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" value="login">Submit</button>
    </form>
</div>
<?php

include '../eCommerce/includes/templates/footer.php';
ob_end_flush();
?>
ss