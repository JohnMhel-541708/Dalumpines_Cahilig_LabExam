<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/x-icon" href="assets/icon/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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
                <li class="active"><a>Home</a></li>
                <li><a>About</a></li>
                <li><a>Programs</a></li>
                <li><a>Gallery</a></li>
            </ul>
        </nav>
        <div class="link-area user-area">
            <form id="logoutForm" action="actions/db_logout.php" method="post">
                <a href="user.php"><i class="fa fa-user" id="toggleLoginPassword"></i></a>
                <button type="button" class="button-alt button-logout actionBtn" data-href="login.php">
                    Logout
                </button>
            </form>
        </div>
    </header>
    <div class="wrapper">
        <section class="section showcase" id="showcase">
            <div class=" panel left-panel">
                <div class="heading-area">
                    <h1>College of Computing Education</h1>
                </div>
                <h2>Welcome to the landing page!</h2>
                <p>
                    Discover the warmth and charm of handcrafted crochet
                    creations! From keychain amigurumis to headbands,
                    buckethats, and bandanas. Each piece is made with care and
                    creativity. Whether you're looking for a special gift or a
                    unique addition to your collection, we have something just
                    for you.
                </p>
                <div class="button-area">
                    <a id="askConfirm" class="button-default">View Programs</a>
                    <a href="request.php" class="button-alt">Go to Gallery</a>
                </div>
            </div>
            <div class="panel right-panel showcase-img">
                <div class="right-content">
                    <div class="img-cont">
                        <img src="assets/CCE.png" alt="" />
                    </div>
                </div>
            </div>
        </section>

        <section class="section strip" id="about">
            <div class="panel center-panel">
                <h2>ABOUT THE COLLEGE</h2>
                <p>
                    The College of Computing Education upholds its status as a premier computer school in the region with PACUCOA Level IV accredited programs and Center of Development certification. The college boasts a distinguished faculty with updated skills in various computer study fields. The Computer Science and Information Technology program holds Center of Development (COD) status from CHED and has established noteworthy collaborations with industry leaders such as Apple, Google, Microsoft, and IBM.
                </p>
            </div>
        </section>
        
        <section class="section strip" id="programs">
            <div class="panel center-panel">
                <div class="box-container">
                    <div class="box">
                        <p>
                            Bachelor of Science
                        </p>
                        <h5>Computer Science</h5>
                    </div>
                    <div class="box">
                        <p>
                            Bachelor of Science
                        </p>
                        <h5>Information Technology</h5>
                    </div>
                    <div class="box">
                        <p>
                            Bachelor of 
                        </p>
                        <h5>Multimedia Arts</h5>
                    </div>
                </div>
            </div>
        </section>
        <section class="section feature" id="gallery">
            <h3>GALLERY</h3>
            <div class="feature-grid-container">
                <button class="nav-btn left-btn">&#10094;</button>
                <div class="feature-grid">
                    <div class="grid-grp">
                        <div class="card-img">
                            <img src="assets/1.jpg" alt="pic1" class="clickable-img">
                        </div>
                        <div class="card-img">
                            <img src="assets/2.jpg" alt="pic2" class="clickable-img">
                        </div>
                        <div class="card-img">
                            <img src="assets/3.jpg" alt="pic3" class="clickable-img">
                        </div>
                    </div>
                    <div class="grid-grp">
                        <div class="card-img">
                            <img src="assets/4.jpg" alt="pic4" class="clickable-img">
                        </div>
                        <div class="card-img">
                            <img src="assets/5.jpg" alt="pic5" class="clickable-img">
                        </div>
                        <div class="card-img">
                            <img src="assets/6.jpg" alt="pic6" class="clickable-img">
                        </div>
                    </div>
                </div>
                <button class="nav-btn right-btn">&#10095;</button>
            </div>
            <div class="button-area">
                <a href="shop.php" class="button-default">Go to Gallery</a>
            </div>
    </div>
    </section>
    </div>
    <footer class="footer-bar">
        <div class="footer-content">
            <a href="index.php"><img src="assets/CCE.png" alt="" /></a>
            <div class="social-area">
                <a target="_blank" class="fa fa-facebook"></a>
                <a target="_blank" class="fa fa-instagram"></a>
            </div>
            <p>© All Rights Reserved.</p>
        </div>
    </footer>

    <!-- GALLERY SLIDER BUTTON -->
    <script>
        let currentIndex = 0;
        const featureGrid = document.querySelector('.feature-grid');
        const gridGroups = document.querySelectorAll('.grid-grp');

        document.querySelector('.left-btn').addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                featureGrid.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
        });

        document.querySelector('.right-btn').addEventListener('click', () => {
            if (currentIndex < gridGroups.length - 1) {
                currentIndex++;
                featureGrid.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
        });
    </script>

    <?php include 'includes/modals.php'; ?>
    <script src="scripts.js"></script>
</body>

</html>