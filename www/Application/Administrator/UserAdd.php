<?php 
    require_once('Application/Administrator/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?link=AdminUserList">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add</li>
    </ol>
</nav>

<?php
    if (!isset($_POST['submit'])) 
    {
?>
    <form class="container" id="needs-validation" method="post" action="?link=AdminUserAdd" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
                <div class="invalid-feedback">
                    Provide your first name.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" required>
                <div class="invalid-feedback">
                    Provide your last name.
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                <div class="invalid-feedback">
                    Provide a valid phone.
                </div>
            </div>
            <div class="col-md-6 mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                <div class="invalid-feedback">
                    Provide a valid address.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <div class="invalid-feedback">
                    Provide a valid email.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <div class="invalid-feedback">
                    Provide a valid username.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div class="invalid-feedback">
                    Provide a valid password.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="confirm_password">Access Permission</label>
                <select class="custom-select col-md-3" id="admin" name="admin">
                    <option selected>Select one option</option>
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
                <div class="invalid-feedback">
                    Provide a valid access permission.
                </div>
            </div> 
        </div>

        <p class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="Insert">
            <a class="btn btn-secondary" href="?link=AdminUserList" role="button">Back</a>
        </p>
    </form>

<?php } else { 

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin = $_POST['admin'];

        //inset
        $sSQL = "INSERT INTO Users (first_name, last_name, email, phone, address, username, password, admin) VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', '$username', '$password', '$admin')";
        $isInserted = mysqli_query($conn, $sSQL);

        if($isInserted)
        {
            header("Location: ?link=AdminUserList&msg=InsertSuccess");
        } else {
            header("Location: ?link=AdminUserList&msg=InsertError");
        }
    } ?>
