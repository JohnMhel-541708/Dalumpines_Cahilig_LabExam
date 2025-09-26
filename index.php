<?php
session_start();
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
            <a href="index.php" class="logo"><img src="assets/CCE.png" alt="" /></a>
        </div>
        <nav class="link-area">
            <ul>
                <li><a href="#showcase" class="nav-link">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#programs" class="nav-link">Programs</a></li>
                <li><a href="#gallery" class="nav-link">Gallery</a></li>
            </ul>
        </nav>
        <div class="link-area user-area">
            <?php if (isset($_SESSION["user_id"])): ?>
                <!-- Show logout if logged in -->
                <form id="logoutForm" action="actions/db_logout.php" method="post">
                    <button type="submit" class="button-alt button-user actionBtn" data-href="login.php">
                        Logout
                    </button>
                </form>
            <?php else: ?>
                <!-- Show login if not logged in -->
                <a href="login.php" class="button-alt button-user actionBtn" data-href="login.php">
                    Login
                </a>
            <?php endif; ?>
        </div>
    </header>
    <div class="wrapper">
        <section class="section showcase" id="showcase">
            <div class=" panel left-panel">
                <div class="heading-area">
                    <h1>College of <br>Computing Education</h1>
                </div>
                <h2>One of the best computer schools in the region!</h2>
                <p>
                    Technology is more than just code—it’s a tool for creativity, innovation,
                    and making a difference. Our community of students and faculty
                    work together on ideas that challenge the norm, from building
                    apps and designing games to exploring the future of data and AI.
                    Whether you’re dreaming of becoming a software developer, digital
                    artist, or IT professional, CCE is where your journey in technology
                    begins.
                </p>
                <div class="button-area">
                    <a class="button-default" href="#programs">View Programs</a>
                    <a class="button-alt" href="#gallery">Go to Gallery</a>
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
                <h3>ABOUT THE COLLEGE</h3>
                <p>
                    The College of Computing Education upholds its status as a
                    premier computer school in the region with PACUCOA Level IV
                    accredited programs and Center of Development certification.
                    The college boasts a distinguished faculty with updated skills
                    in various computer study fields. The Computer Science and Information
                    Technology program holds Center of Development (COD) status from CHED
                    and has established noteworthy collaborations with industry leaders
                    such as Apple, Google, Microsoft, and IBM.
                </p>
            </div>
        </section>

        <section class="section strip" id="programs">
            <div class="panel center-panel">
                <h3>OFFERED PROGRAMS</h3>
                <div class="box-container">
                    <button class="box cs">
                        <p>
                            Bachelor of Science in
                        </p>
                        <h5>Computer Science</h5>
                    </button>
                    <button class="box it">
                        <p>
                            Bachelor of Science in
                        </p>
                        <h5>Information Technology</h5>
                    </button>
                    <button class="box ma">
                        <p>
                            Bachelor of
                        </p>
                        <h5>Multimedia Arts</h5>
                    </button>
                </div>
                <div class="box-container">
                    <button class="box dat">
                        <p>
                            Bachelor of Science in
                        </p>
                        <h5>Entertainment and Multimedia Computing</h5>
                        <span>Digital Animation Technology</span>
                    </button>
                    <button class="box gd">
                        <p>
                            Bachelor of Science in
                        </p>
                        <h5>Entertainment and Multimedia Computing</h5>
                        <span>Game Development</span>
                    </button>
                    <button class="box is">
                        <p>
                            Bachelor of
                        </p>
                        <h5>Library and Information Science</h5>
                    </button>
                </div>
            </div>
        </section>

        <section class="section gallery" id="gallery">
            <h3>GALLERY</h3>
            <div class="gallery-grid-container">
                <button class="nav-btn left-btn">&#10094;</button>
                <div class="gallery-grid">
                    <div class="grid-grp">
                        <div class="card-img">
                            <img src="assets/1.jpg" alt="pic1" class="clickable-img">
                        </div>
                        <div class="card-img">
                            <img src="assets/7.jpg" alt="pic2" class="clickable-img">
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
                <a class="button-default">Go to Gallery</a>
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
        const galleryGrid = document.querySelector('.gallery-grid');
        const gridGroups = document.querySelectorAll('.grid-grp');

        document.querySelector('.left-btn').addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                galleryGrid.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
        });

        document.querySelector('.right-btn').addEventListener('click', () => {
            if (currentIndex < gridGroups.length - 1) {
                currentIndex++;
                galleryGrid.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
        });
    </script>

    <?php include 'includes/modals.php'; ?>
    <script src="scripts.js"></script>
</body>

</html>