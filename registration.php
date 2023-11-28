<?php
$page_title = "Create new user";

include ('includes/header.php');
?>
<style>
    .form-section {
    background: linear-gradient(to left, #4b6cb7, #182848);
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    color: #fff;
}

.form-control {
    border: 1px solid #ccc;
    transition: border-color 0.3s ease;
    position: relative;
}

.form-control:focus {
    border-color: #5cb85c;
    box-shadow: 0 0 5px rgba(75, 108, 183, 0.5);
}

.input-group-addon {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 8px;
    border-radius: 4px;
}

.input-group-addon i {
    color: #555;
}

.btn-rounded {
    border-radius: 20px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-success {
    background-image: linear-gradient(to bottom, #4FACFE, #00F2FE);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    color: #fff;
    border: none;
}

.form-horizontal label {
    opacity: 0%;
    transform: translateY(20px);
    transition: opacity 3s ease, transform 3s ease;
}

.form-group.focus label {
    opacity: 100%;
    transform: translateY(0);
}

.btn-success:hover {
    background-image: linear-gradient(to bottom, #0099FF, #0066CC);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.profile-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    text-align: center;
}

.profile-card {
    position: relative;
    perspective: 1000px;
    width: 100%;
    text-align: center;
}

.profile-card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}

.username {
    margin-top: 10px;
}

.breadcrumb {
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.breadcrumb li {
    list-style: none;
    display: inline;
    font-size: 16px;
}

.breadcrumb a {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s ease-in-out;
}

.breadcrumb a:hover {
    color: #0056b3;
}

.breadcrumb .separator {
    margin: 0 10px;
    color: #6c757d;
}

.breadcrumb .active {
    color: #495057;
}
</style>

<div class="container wrapper">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li class="active">Register</li>
	</ul>

    <h1 class="text-center">REGISTER</h1>
    <p class="lead text-center">Please register your account</p>
	<div class="col-xs-8 col-xs-offset-2">
		<form class="form-horizontal" role="form" action="register.php" method="get" enctype="text/plain">
			<div class="form-group focus form-section" >
				<label for="newUserName" class="col-sm-2 control-label" >Username</label>
				<div class="col-sm-10 input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" id="newUserName" name="username" placeholder="Username" required>
				</div>
			</div>
			<div class="form-group focus form-section">
				<label for="newName" class="col-sm-2 control-label" >Name</label>
				<div class="col-sm-10 input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" id="newName" name="name" placeholder="Name" required>
				</div>
			</div>
			<div class="form-group focus form-section">
				<label for="newEmail" class="col-sm-2 control-label" >Email</label>
				<div class="col-sm-10 input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="email" class="form-control" id="newEmail" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group focus form-section">
				<label for="newPassword" class="col-sm-2 control-label" >Password</label>
				<div class="col-sm-10 input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
				</div>
			</div>
			<div class="form-group focus form-section">
   				 <label for="profileImage" class="col-sm-2 control-label" >Choose Profile Image:</label>
   				 <div class="col-sm-10" >
					<select class="form-control " id="profileImage" name="profile_image">
                			<option value="usera.jpg">user a </option>
                			<option value="userb.jpg">user b </option>
                			<option value="userc.jpg">user c </option>
                			<option value="userd.jpg">user d </option>
                			<option value="usere.jpg">user e </option>
                			<option value="userf.jpg">user f </option>
			        </select>
				 </div>
			</div>
			
<style>
.profile-image-option {
       width: 100px; 
       height: 100px; 
       border-radius: 50%;
       margin-left: 40px; 
       cursor: pointer;
   }
</style>
   			<br>
			<div class="form-group ">
				<div class="col-sm-12 ">
					<button type="submit" class="btn btn-success btn-rounded">Register</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="profile-grid">
    <div class="profile-card">
        <h4 class="username">User A</h4>
        <img src="assets/userimg/usera.jpg" alt="User A">
    </div>
    <div class="profile-card">
        <h4 class="username">User B</h4>
        <img src="assets/userimg/userb.jpg" alt="User B">
    </div>
    <div class="profile-card">
        <h4 class="username">User C</h4>
        <img src="assets/userimg/userc.jpg" alt="User C">
    </div>
 
    <!-- Repeat -->
    <div class="profile-card">
        <h4 class="username">User D</h4>
        <img src="assets/userimg/userd.jpg" alt="User D">
    </div>
    <div class="profile-card">
        <h4 class="username">User E</h4>
        <img src="assets/userimg/usere.jpg" alt="User E">
    </div>
    <div class="profile-card">
        <h4 class="username">User F</h4>
        <img src="assets/userimg/userf.jpg" alt="User F">
    </div>
</div>



<?php
include('includes/footer.php');
?>