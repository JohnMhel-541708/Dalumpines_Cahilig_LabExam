<?php
session_start();
$old = $_SESSION['old'] ?? []; // Get previously inputted username to repopulate after error
unset($_SESSION['old']); // Clear after use
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>CS15 Exam</title>
  <link rel="stylesheet" href="login_style.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
      <link href="https://fonts.googleapis.com/css2?family=Calistoga&family=Caprasimo&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up">
      <form action="actions/db_register.php" method="POST">
        <span>Register Account</span><br>

        <input type="text" name="firstname" placeholder="First Name" id="fullname"
          value="<?php echo htmlspecialchars($old['firstname'] ?? ''); ?>" required />

        <input type="text" name="lastname" placeholder="Last Name" id="fullname"
          value="<?php echo htmlspecialchars($old['lastname'] ?? ''); ?>" required />

        <input type="email" name="email" placeholder="Email" id="email"
          value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>" required />

        <input type="text" name="username" placeholder="Username" id="username"
          value="<?php echo htmlspecialchars($old['username'] ?? ''); ?>" required />

        <div class="password-container">
          <input type="password" name="password" placeholder="Password" id="register_password"
            value="<?php echo htmlspecialchars($old['password'] ?? ''); ?>" required />
          <i class="fa fa-eye" id="toggleRegisterPassword"></i>
        </div>

        <div class="password-container">
          <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password"
            value="<?php echo htmlspecialchars($old['confirm_password'] ?? ''); ?>" required />
          <i class="fa fa-eye" id="toggleConfirmPassword"></i>
        </div>

        <div class="form-section">
          <label>Gender:</label>
          <input type="radio" name="gender" value="Male"
            <?php echo (isset($old['gender']) && $old['gender'] === 'Male') ? 'checked' : ''; ?> /> Male

          <input type="radio" name="gender" value="Female"
            <?php echo (isset($old['gender']) && $old['gender'] === 'Female') ? 'checked' : ''; ?> /> Female

          <input type="radio" name="gender" value="Female"
            <?php echo (isset($old['gender']) && $old['gender'] === 'Non-binary') ? 'checked' : ''; ?> /> Non-binary
        </div>

        <div class="form-section">
          <label>Hobbies:</label>
          <input type="checkbox" name="hobbies[]" value="Reading"
            <?php echo (!empty($old['hobbies']) && in_array('Reading', $old['hobbies'])) ? 'checked' : ''; ?> /> Reading

          <input type="checkbox" name="hobbies[]" value="Sports"
            <?php echo (!empty($old['hobbies']) && in_array('Sports', $old['hobbies'])) ? 'checked' : ''; ?> /> Sports

          <input type="checkbox" name="hobbies[]" value="Music"
            <?php echo (!empty($old['hobbies']) && in_array('Music', $old['hobbies'])) ? 'checked' : ''; ?> /> Music
        </div>

        <div class="form-section">
          <label>Country:</label>
          <select name="country" required>
            <option value="">-- Select --</option>
            <option value="USA" <?php echo (!empty($old['country']) && $old['country'] === 'USA') ? 'selected' : ''; ?>>USA</option>
            <option value="Philippines" <?php echo (!empty($old['country']) && $old['country'] === 'Philippines') ? 'selected' : ''; ?>>Philippines</option>
            <option value="UK" <?php echo (!empty($old['country']) && $old['country'] === 'UK') ? 'selected' : ''; ?>>UK</option>
          </select>
        </div>

        <button type="submit" class="button">Register</button>
        <p id="error"></p>
      </form>

    </div>
    <div class="form-container sign-in">
      <form action="actions/db_login.php" method="POST">
        <img src="assets/CCE.png" class="logo-login" alt="" />
        <span>Log In</span><br>

        <input type="text" name="username" placeholder="Username" id="login_username" value="<?php echo htmlspecialchars($old['username'] ?? '') ?>" required />

        <div class="password-container">
          <input type="password" name="password" placeholder="Password" id="login_password" required />
          <i class="fa fa-eye" id="toggleLoginPassword"></i>
        </div>

        <button type="submit" class="button">Sign In</button>
        <p id="loginError"></p>
      </form>

    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Already have an account?</h1>
          <p>Login to use all of the site features.</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Don't have an account?</h1>
          <p>Register a new account to use all of the site features.</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <?php include 'includes/modals.php'; ?>
  <p id="serverError" style="display: none">
    <?php echo isset($_GET['error']) ? htmlspecialchars($_GET['error']) : ''; ?>
  </p>

</body>

<!-- ANIMATIONS -->
<script>
  const container = document.getElementById('container');
  const registerBtn = document.getElementById('register');
  const loginBtn = document.getElementById('login');

  registerBtn.addEventListener('click', () => {
    container.classList.add("active");
  })

  loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
  })
</script>

<script src="scripts.js"></script>

</html>