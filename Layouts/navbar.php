<?php
session_start();

if(isset($_SESSION['username'])){
    $login = true;
}else{
    $login = false;
}
?>

<div class="row" style="height: 10vh;">
    <div class="col">
        <div class="rounded rounded-4 px-3 py-3 mh-100" style="background-color: #404258;">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <a class="text-decoration-none fs-3 align-middle ms-3" style="color: white;">FootyStats</a>
                    <div class="ms-auto">
                        <?php
                        if($login == true){
                        ?>
                        <a href="proses/logout.php" class="text-decoration-none fs-5 align-middle ms-3" style="color: white;">Logout</a>
                        <?php
                        }else{
                        ?>
                        <a href="Login" class="text-decoration-none fs-5 align-middle ms-3" style="color: white;">Login</a>
                        <?php
                        }
                        ?>
                        <!-- Search bar -->
                        <form class="d-flex ms-3">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
