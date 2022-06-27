<header class="header">
        <img class="img" src="../Images/logocrud.png" width="200px">
        <div class="ok">
            <div class="headersearch">
                <a href="index.php">Home</a>
                <a href="vluchten.php">Vluchten</a>
                <a href="overons.php">Over ons</a>
                <a href="reviews.php">Reviews</a>
                <a href="contact.php">Contact</a>
                <?php
        if (!isLoggedIn()) {
                echo "<a href='./account/login.php'>Login</a>";
            }
        ?>

                    <?php
        if (isAdmin()) {
            echo "<a href='../admin/admin.php'>Admin</a>";
            } elseif (isLoggedIn()) {
            echo "<a href='account/account.php'>Account</a>";
            }
        ?>
                        <?php
        if (isLoggedIn()) {
                echo "<a href='logout.php'>Logout</a>";
            }   
        ?>

            </div>
        </div>
    </header>
    <header>
        <div class="profile-info-container">
            <?php
        if (isLoggedIn()) {
            $userName = $_SESSION['user']['username'];
                echo "<h2 class='profile-username'>Welcome $userName!</h2>"; 
            }
            if (!isLoggedIn()) {
                echo "<h2 class='profile-username'>Welcome to corendon!</h2>"; 
            }
        ?>
        </div>
    </header>

    <header class="headerblokjes">
        <div class="wrap">
            <div class="search">
                <input type="search" class="searchTerm" placeholder="Search...">

                <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </header>