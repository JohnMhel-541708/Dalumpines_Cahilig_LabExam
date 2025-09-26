<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: index.php");
  exit;
}

include 'actions/db_fetchUserInfo.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Calistoga&family=Caprasimo&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <title>CS15 Exam</title>
</head>

<body>
  <header class="nav-bar">
    <div class="logo-area">
          <a href="landing.php" class="logo"><img src="assets/CCE.png" alt="" /></a>
    </div>
    <nav class="link-area">
      <ul>
        <li><a href="landing.php">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Reviews</a></li>
        <li><a href="request.php">Request</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
    <div class="link-area user-area">
      <form id="logoutForm" action="actions/db_logout.php" method="post">
        <a href="#"><i class="fa fa-user" id="toggleLoginPassword"></i></a>
        <button type="button" class="button-alt button-logout actionBtn" data-href="index.php">
          Logout
        </button>
      </form>
    </div>
  </header>
  <div class="wrapper user">
    <section class="section user-info">
      <div class="user-info-nav">
        <a class="fa fa-address-book-o active"><span>&nbsp Personal Details</span></a>
        <a class="fa fa-shopping-basket"><span>&nbsp Orders History</span></a>
        <a class="fa fa-file-text"><span>&nbsp Requests History</span></a>
      </div>
      <div class="user-info-main">
        <div class="user-main-area heading">
          <h3>Personal Information</h3>
        </div>
        <!--<div class="user-main-area">
          <div class="img-cont">
            <img id="profileImage" src="<?= htmlspecialchars($profileImage) ?>" alt="Profile Photo">
          </div>
           Form for uploading profile picture 
          <form action="actions/db_uploadProfile.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="profile_pic" id="fileInput" accept="image/*" hidden>
            <button type="button" class="table-button upload-btn" onclick="document.getElementById('fileInput').click();">Choose File</button>
            <button type="submit" class=" table-button save-btn">Upload</button>
          </form>
        </div>-->
        <div class="user-main-area">
          <div class="part-container">
            <div class="part">
              <h6>Username</h6>
              <div>
                <form action="actions/db_updateUserInfo.php" method="POST">
                  <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
                  <input class="table-input" type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                  <button class="table-button table-alt" type="submit">Update</button>
                </form>
              </div>

              <h6>First Name</h6>
              <p><?php echo htmlspecialchars($user['first_name']); ?></p>

              <h6>Last Name</h6>
              <p><?php echo htmlspecialchars($user['last_name']); ?></p>

              <h6>Gender</h6>
              <p><?php echo htmlspecialchars($user['gender']); ?></p>
            </div>

            <div class="part">
              <h6>Email</h6>
              <p><?php echo htmlspecialchars($user['email']); ?></p>

              <h6>Hobbies</h6>
              <p><?php
                  if (is_array($user['hobbies'])) {
                    echo htmlspecialchars(implode(", ", $user['hobbies']));
                  } else {
                    echo htmlspecialchars($user['hobbies']);
                  }
                  ?></p>

              <h6>Country</h6>
              <p><?php echo htmlspecialchars($user['country']); ?></p>

              <!--
              <h6>Password</h6>
              <p><?php echo isset($user['Password']) ? str_repeat('*', strlen($user['Password'])) : 'N/A'; ?></p>
              -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="footer-bar">
    <div class="footer-content">
      <a href="index.php"><img src="assets/logo-big.png" alt="" /></a>
      <div class="social-area">
        <a href="https://www.facebook.com/profile.php?id=61557911686578" target="_blank" class="fa fa-facebook"></a>
        <a href="https://www.instagram.com/hazey.crochet/" target="_blank" class="fa fa-instagram"></a>
      </div>
      <p>© All Rights Reserved.</p>
    </div>
  </footer>

  <?php include 'includes/modals.php'; ?>

  <script src="scripts.js"></script>
</body>

</html>