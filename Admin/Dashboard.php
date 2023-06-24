<?php
$sql = $con->query("SELECT * FROM `admin_login` WHERE ID=$id");
$data = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!-- start dashboard -->
<header class="Dashboard">
  <div class="logo">
    <i class="fa-sharp fa-solid fa-house-user"></i>
    <span class="AppName">DashBoard</span>
  </div>
  <div class="links">
    <ul>
      <!-- admin expaire -->
      <?php if ($data['Status'] == 1) { ?>
        <li><a href="Home.php?status=home" class="<?= $_GET['status'] == 'home' ? 'active' : ''; ?>"><i class="fa-sharp fa-solid fa-briefcase"></i>Home Page</a></li>
        <li><a href="AddAdmin.php?status=add" class="<?= $_GET['status'] == 'add' ? 'active' : ''; ?>"><i class="fa-solid fa-user-plus"></i>Add Admin</a></li>
        <li><a href="Users.php?status=users" class="<?= $_GET['status'] == 'users' ? 'active' : ''; ?>"><i class="fa-solid fa-users"></i>Show Users</a></li>
        <li><a href="Create_Post.php?status=posts" class="<?= $_GET['status'] == 'posts' ? 'active' : ''; ?>"><i class="fa-solid fa-plus"></i>Create Post</a></li>

      <?php } else { ?>
        <!-- sub admin  expaire-->
        <li><a href="Home.php?status=home" class="<?= $_GET['status'] == 'home' ? 'active' : ''; ?>"><i class="fa-sharp fa-solid fa-briefcase"></i>Home Page</a></li>
        <li><a href="Users.php?status=users" class="<?= $_GET['status'] == 'users' ? 'active' : ''; ?>"><i class="fa-solid fa-users"></i>Show Users</a></li>
        <li><a href="Create_Post.php?status=posts" class="<?= $_GET['status'] == 'posts' ? 'active' : ''; ?>"><i class="fa-solid fa-plus"></i> Post</a></li>
   
      <?php } ?>
      
    
         
    </ul>
  </div>


  <div class="user">
    <div class="user-img">
      <img src="Images/<?php echo $data['Img'] ?>" alt="error">
    </div>
    <div class="user-name">
      <span class="name"><?php echo $data['UserName'] ?></span>
      <br>
      <span class="phone"><a href="tel:+20<?= $data['Phone'] ?>"><?php echo $data['Phone'] ?></a></span>
      <div class="logout">
        <a href="Setting.php?status=update_profile"><i class="fa-solid fa-gear" title="Edit Profile" id="setting"></i></a>
        <a href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket" title="Logout" id="logout"></i></a>
      </div>
    </div>
  </div>
</header>