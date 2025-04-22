<div class="brainster_nav">
    <nav class="width-90 ">
        <a class="text-white fs-4" href=" index.php">
            <img class="logo" src="./images/Logo.png" alt="">
            Brainster Library
        </a>
        <ul>
            <?php
            if (isset($_SESSION['username']) && $_SESSION['username']) {
                if ($_SESSION['username'] === "Admin") {
                    echo "<li><a class='nav-button' href='dashboard.php'>Dashboard</a></li>";
                }
                echo "<li><a class='nav-button' href='bookshelf.php'>Bookshelf</a></li>";
                echo "<li><a class='nav-button' href='logout.php'>Logout</a></li>";
            } else {
                echo "<li><a class='nav-button' href='bookshelf.php'>Bookshelf</a></li>";
                echo "<li><a class='nav-button' href='register.php'>Sign Up</a></li>";
                echo "<li><a class='nav-button' href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>