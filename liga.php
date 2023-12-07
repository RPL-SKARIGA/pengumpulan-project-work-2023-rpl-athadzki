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
                            <a href="./" class="text-decoration-none fs-3 align-middle ms-3" style="color: white;">FootyStats</a>
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
        <!-- Main -->
        <?php
            require_once('crud.php');
            $liga = cariLiga($_GET['liga_id']);
        ?>
        <div class="row my-3 h-100">
            <div class="col-md-8 mt-3">
                <div class="rounded rounded-4 px-5 py-3" style="background-color: #404258; color: white;">
                    <div class="d-flex py-2 mb-1 rounded rounded-4 ">
                        <div class="text-center">
                            <img class="h-auto" src="image/liga/<?=$liga['nama']?>.png" alt="" style="width: 100px;">
                        </div>
                        <div class="d-flex align-items-center ms-5">    
                            <h1 style="color: white;"><?=$liga['nama']?></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-3">
                        <div class="rounded rounded-4 px-3 py-3" style="background-color: #404258; color: white;">
                            <div class="py-2 mb-1 rounded rounded-4">
                                <div class="text-center d-flex flex-wrap justify-content-center">
                                    <a class="mx-3 text-decoration-none" href="liga.php?liga_id=1">
                                        <img src="image/liga/inggris - Premier League.png" alt="" style="width: 40px;">
                                    </a>
                                    <a class="mx-3 my-4 text-decoration-none" href="liga.php?liga_id=2">
                                        <img src="image/liga/Jerman - Bundesliga.png" alt="" style="width: 40px;">
                                    </a>
                                    <a class="mx-3 text-decoration-none" href="liga.php?liga_id=3">
                                        <img src="image/liga/Spanyol - Laliga.png" alt="" style="width: 40px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $liga = cariPertandinganByLiga($_GET['liga_id'])
                    ?>
                    <div class="col-md-10 mt-3">
                        <div class="rounded rounded-4 px-3 py-3" style="background-color: #404258; color: white;">
                            <!-- Liga -->
                            <div class="d-flex flex-column fw-medium">
                                <!-- Pertandingan -->
                                <?php
                                foreach($liga as $pertandingan) :
                                ?>
                                <div class="py-2 row">
                                    <div class="mx-2 col align-self-center text-end">
                                        <a href="" class="text-decoration-none align-self-center" style="color: white;"><?=$pertandingan['tim_home']?></a>
                                        <img src="image/tim/<?=$pertandingan['tim_home']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                                    </div>
                                    <div class="text-center fw-bold col-2"><a href="./statistik?match=<?= $pertandingan['id']?>" class="text-decoration-none" style="color: white;"><?=$pertandingan['score_home']?> - <?=$pertandingan['score_away']?></a><br><small style="color: var(--bs-border-color);" class="fw-semibold">FT</small></div>
                                    <div class="mx-2 col align-self-center">
                                        <img src="image/tim/<?=$pertandingan['tim_away']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                                        <a href="" class="text-decoration-none align-self-center" style="color: white;"><?=$pertandingan['tim_away']?></a>
                                    </div>
                                </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                            <!-- /Liga -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="rounded rounded-4 px-3 py-3 mt-3" style="background-color: #404258; color: white;">
                    <?php
                    if($_GET['liga_id'] == 1) :
                    ?>
                    <iframe id="sofa-totw-embed-17-52186-10561" width="100%" height="500" style="display:block;max-width:440px" src="https://widgets.sofascore.com/embed/unique-tournament/17/season/52186/round/10561/teamOfTheWeek?widgetBackground=Gray&showCompetitionLogo=true&widgetTitle=Premier%20League" frameBorder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                    <?php
                    if($_GET['liga_id'] == 2) :
                    ?>
                    <iframe id="sofa-totw-embed-35-52608-10565" width="100%" height="500" style="display:block;max-width:440px" src="https://widgets.sofascore.com/embed/unique-tournament/35/season/52608/round/10565/teamOfTheWeek?widgetBackground=Gray&showCompetitionLogo=true&widgetTitle=Bundesliga" frameBorder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                    <?php
                    if($_GET['liga_id'] == 3) :
                    ?>
                    <iframe id="sofa-totw-embed-8-52376-10558" width="100%" height="500" style="display:block;max-width:440px" src="https://widgets.sofascore.com/embed/unique-tournament/8/season/52376/round/10558/teamOfTheWeek?widgetBackground=Gray&showCompetitionLogo=true&widgetTitle=LaLiga" frameBorder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="rounded rounded-4 px-3 py-3 mt-3" style="background-color: #404258; color: white;">
                    <?php
                    if($_GET['liga_id'] == 1) :
                    ?>
                    <iframe id="sofa-standings-embed-1-52186" src="https://widgets.sofascore.com/embed/tournament/1/season/52186/standings/Premier%20League?widgetTitle=Premier League&showCompetitionLogo=true" style=height:794px!important;max-width:620px!important;width:100%!important; frameborder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                    <?php
                    if($_GET['liga_id'] == 2) :
                    ?>
                    <iframe id="sofa-standings-embed-42-52608" src="https://widgets.sofascore.com/embed/tournament/42/season/52608/standings/Bundesliga?widgetTitle=Bundesliga&showCompetitionLogo=true" style=height:738px!important;max-width:620px!important;width:100%!important; frameborder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                    <?php
                    if($_GET['liga_id'] == 3) :
                    ?>
                   <iframe id="sofa-standings-embed-36-52376" src="https://widgets.sofascore.com/embed/tournament/36/season/52376/standings/LaLiga?widgetTitle=LaLiga&showCompetitionLogo=true" style=height:794px!important;max-width:620px!important;width:100%!important; frameborder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <!-- footer -->
            <div class="col-12 p-3 my-5" style="background-color: #404258; color: white; height: 30vh;">
                <div class="d-flex justify-content-between mx-5 h-100 align-items-center">
                    <p class="fs-5">about us</p>
                    <p class="fs-5">contact us</p>
                </div>
            </div>
        </div>
    </div>
</body>
