<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>FootyStats</title>
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>
    <?php
    session_start();

    if(isset($_SESSION['username'])){
        $login = true;
    }else{
        $login = false;
    }
    ?>

</head>
<body style="background-color: #474E68;">
    <div class="container-fluid mt-3 vh-100">
        <!-- Navbar -->
        <div class="row" style="height: 10vh;">
            <div class="col">
                <div class="rounded rounded-4 px-3 py-3 mh-100" style="background-color: #404258;">
                        <div class="container-fluid" >
                            <a href="#" class="text-decoration-none fs-3 align-middle ms-3" style="color: white;">FootyStats</a>
                            <div class="float-end">
                                <a href="" class="text-decoration-none fs-5 align-middle ms-3" style="color: white;">About Us</a>
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
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div class="row my-3 h-100">
            <div class="col-md-3 mt-3">
                <div class="rounded rounded-4 px-3 py-3" style="background-color: #404258; color: white;">
                    <div class="row py-2 mb-1 rounded rounded-4 ">
                        <div class="col-2">
                            <img src="image/liga/inggris - Premier League.png" alt="" style="width: 35px;">
                        </div>
                        <div class="col-10 d-flex">    
                            <a href="Liga.php?liga_id=1" class="text-decoration-none fs-5 align-self-center" style="color: white;">Premier league</a>
                        </div>
                    </div>
                    <div class="row py-2 mb-1 rounded rounded-4">
                        <div class="col-2">
                            <img src="image/liga/jerman - Bundesliga.png" alt="" style="width: 35px;">
                        </div>
                        <div class="col-10 d-flex">    
                            <a href="Liga.php?liga_id=2" class="text-decoration-none fs-5 align-self-center" style="color: white;">Bundesliga</a>
                        </div>
                    </div>
                    <div class="row py-2 mb-1 rounded rounded-4">
                        <div class="col-2">
                            <img src="image/liga/spanyol - Laliga.png" alt="" style="width: 35px;">
                        </div>
                        <div class="col-10 d-flex">    
                            <a href="Liga.php?liga_id=3" class="text-decoration-none fs-5 align-self-center" style="color: white;">LaLiga</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require_once('crud.php');

            $premier_league = cariPertandinganByLiga(1);
            $Bundesliga = cariPertandinganByLiga(2);
            $LaLiga = cariPertandinganByLiga(3);
            ?>
            <!-- Main -->
            <div class="col-md-9 mt-3">
                <div class="rounded rounded-4 px-3 py-3" style="background-color: #404258; color: white;">
                    <!-- Liga -->
                    <div class="d-flex flex-column fw-medium">
                        <div class="py-2 my-2 rounded rounded-4">
                            <img src="image/liga/inggris - Premier league.png" alt="" class="rounded rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                            <a href="" class="text-decoration-none fs-5 align-middle ms-2" style="color: white;">Inggris - Premier League</a>
                        </div>
                        <!-- Pertandingan -->
                        <?php
                        $i = 0;
                        foreach($premier_league as $pertandingan) :
                            $i++;
                            if($i <= 3) :
                        ?>
                        <div class="py-2 mb-1 row">
                            <div class="mx-2 col text-end">
                                <a href="" class="text-decoration-none align-self-center" style="color: white;"><?=$pertandingan['tim_home']?></a>
                                <img src="image/tim/<?=$pertandingan['tim_home']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                            </div>
                            <div class="text-center fw-bold col-1"><a href="./statistik?match=<?= $pertandingan['id']?>" class="text-decoration-none" style="color: white;"><?=$pertandingan['score_home']?> - <?=$pertandingan['score_away']?></a><br><small style="color: var(--bs-border-color);" class="fw-semibold">FT</small></div>
                            <div class="mx-2 col">
                                <img src="image/tim/<?=$pertandingan['tim_away']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                                <a href="" class="text-decoration-none align-self-center" style="color: white;"><?=$pertandingan['tim_away']?></a>
                            </div>
                        </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                    <!-- /Liga -->
                    <div class="border"></div>
                    <!-- Liga -->
                    <div class="d-flex flex-column fw-medium">
                        <div class="py-2 my-2 rounded rounded-4">
                            <img src="image/liga/jerman - Bundesliga.png" alt="" class="rounded rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                            <a href="" class="text-decoration-none fs-5 align-middle ms-2" style="color: white;">Jerman - Bundesliga</a>
                        </div>
                        <!-- Pertandingan -->
                        <?php
                        $i = 0;
                        foreach($Bundesliga as $pertandingan) :
                            $i++;
                            if($i <= 3) :
                        ?>
                        <div class="py-2 mb-1 row">
                            <div class="mx-2 col text-end">
                                <a href="" class="text-decoration-none align-self-center" style="color: white;"><?=$pertandingan['tim_home']?></a>
                                <img src="image/tim/<?=$pertandingan['tim_home']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                            </div>
                            <div class="text-center fw-bold col-1"><a href="./statistik?match=<?= $pertandingan['id']?>" class="text-decoration-none" style="color: white;"><?=$pertandingan['score_home']?> - <?=$pertandingan['score_away']?></a><br><small style="color: var(--bs-border-color);" class="fw-semibold">FT</small></div>
                            <div class="mx-2 col">
                                <img src="image/tim/<?=$pertandingan['tim_away']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                                <a href="" class="text-decoration-none align-self-center" style="color: white;"><?=$pertandingan['tim_away']?></a>
                            </div>
                        </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                    <!-- /Liga -->
                    <div class="border"></div>
                    <!-- Liga -->
                    <div class="d-flex flex-column fw-medium">
                        <div class="py-2 my-2 rounded rounded-4">
                            <img src="image/liga/spanyol - Laliga.png" alt="" class="rounded rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                            <a href="" class="text-decoration-none fs-5 align-middle ms-2" style="color: white;">Spanyol - LaLiga</a>
                        </div>
                        <!-- Pertandingan -->
                        <?php
                        $i = 0;
                        foreach($LaLiga as $pertandingan) :
                            $i++;
                            if($i <= 3) :
                        ?>
                        <div class="py-2 mb-1 row">
                            <div class="mx-2 col text-end">
                                <a href="" class="text-decoration-none align-self-center" style="color: white;"><?=$pertandingan['tim_home']?></a>
                                <img src="image/tim/<?=$pertandingan['tim_home']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                            </div>
                            <div class="text-center fw-bold col-1"><a href="./statistik?match=<?= $pertandingan['id']?>" class="text-decoration-none" style="color: white;"><?=$pertandingan['score_home']?> - <?=$pertandingan['score_away']?></a><br><small style="color: var(--bs-border-color);" class="fw-semibold">FT</small></div>
                            <div class="mx-2 col">
                                <img src="image/tim/<?=$pertandingan['tim_away']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                                <a href="" class="text-decoration-none align-self-center" style="color: white;"><?=$pertandingan['tim_away']?></a>
                            </div>
                        </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                    <!-- /Liga -->
                </div>
            </div>
            <!-- footer -->
            <div class="col-12 p-3 my-5" style="background-color: #404258; color: white; height: 30vh;">
                <div class="row px-5 mt-3">
                    <div class="col-3">
                        <h4>Contact Us</h4>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa-brands fa-instagram fs-5 me-3"></i> @footystats
                        </div>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa-regular fa-envelope fs-5 me-3"></i> footystats1212@gmail.com
                        </div>
                    </div>
                    <div class="col-9 border-start">
                        <h4>About Us</h4>
                        <div>
                            text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
