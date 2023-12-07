<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Document</title>
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
                            <a href="../" class="text-decoration-none fs-3 align-middle ms-3" style="color: white;">FootyStats</a>
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
        <?php
        if (!isset($_SESSION['username'])) {
            header('Location: ../Login');
        }
        ?>
        <!-- Sidebar -->
        <div class="row my-3 h-100">
            <?php
            require_once('../crud.php');
            $id = $_GET['match'];
            $tim_home_id = 0;
            $tim_away_id = 0;
            $pertandingan = cariPertandingan($id);
            ?>

            <!-- Main -->
            <div class="col-md-9 mt-3">
                <div class="rounded rounded-4 px-3 pt-3 h-100" style="background-color: #404258; color: white;">
                    <!-- Pertandingan -->
                    <div class="d-flex flex-column fw-medium my-3 mb-4">
                        <?php
                        foreach ($pertandingan as $p) :
                            $tim_home_id = $p['tim_home_id'];
                            $tim_away_id = $p['tim_away_id'];
                        ?>
                            <div class="py-2 mb-1 row">
                                <div class="col-5 justify-content-end d-flex">
                                    <a href="" class="text-decoration-none align-self-center fs-4" style="color: white;"><?= $p['tim_home'] ?></a>
                                    <img src="../image/tim/<?= $p['tim_home'] ?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 70px;">
                                </div>
                                <div class="text-center fw-bold col-2"><a class="text-decoration-none fs-3" style="color: white;"><?= $p['score_home'] ?> - <?= $p['score_away'] ?></a><br><small style="color: var(--bs-border-color);" class="fw-semibold">Full Time</small></div>
                                <div class="col-5 d-flex">
                                    <img src="../image/tim/<?= $p['tim_away'] ?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 70px;">
                                    <a href="" class="text-decoration-none align-self-center fs-4" style="color: white;"><?= $p['tim_away'] ?></a>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                        <div class="row">
                            <div class="col-5 text-end">
                            <?php
                            $p = cariPemainByPertandingan($id);
                            foreach($p as $pemain) :
                                if($pemain['gol'] > 0 && $pemain['tim_id'] == $tim_home_id){
                            ?>
                                <?= $pemain['nama']?><br>
                            <?php
                                }
                            endforeach;
                            ?>
                            </div>
                            <div class="col-2 text-center">
                                <img src="../image/icon/bola.png" alt="" class="h-auto mx-5" width="25px">
                            </div>
                            <div class="col-5">
                            <?php
                            $p = cariPemainByPertandingan($id);
                            foreach($p as $pemain) :
                                if($pemain['gol'] > 0 && $pemain['tim_id'] == $tim_away_id){
                            ?>
                                <?= $pemain['nama']?><br>
                            <?php
                                }
                            endforeach;
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center h-25 border-top border-3 mb-2">
                        <?php
                        foreach ($pertandingan as $p) :
                        ?>
                            <div class="mt-2 d-flex">
                                <div class="mx-3">
                                    <p>Date - <?= date('F d, Y', strtotime($p['date'])) ?></p>
                                </div>
                                <div class="mx-3">
                                    <p>Stadion - <?= $p['stadion'] ?></p>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <!-- /Pertandingan -->
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="rounded rounded-4 px-3 py-3 h-100" style="background-color: #404258; color: white;">
                    <!-- Tim Home -->
                    <div class="row py-2 mb-1 rounded rounded-4 ">
                        <div class="col-12 mb-3">
                            <div class="w-100 border-bottom pb-3 border-3">
                                <a href="" class="text-decoration-none fs-5 align-self-center" style="color: white;">Pemain Kunci</a>
                            </div>
                        </div>
                        <!-- Pemain -->
                        <?php
                        $p = cariPemainByPertandingan($id);
                        foreach($p as $pemain) :
                            if($pemain['kunci'] != 0){
                        ?>
                        <div class="col-12 d-flex align-items-center">
                            <img src="../image/pemain/<?= $pemain['nama']?>.png" alt="" class="border rounded-circle h-100" style="width: 35px;">
                            <a href="" class="text-decoration-none fs-5 ms-2" style="color: white;"><?= $pemain['nama']?></a>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-evenly">
                            <p class="text-center" style="color: white;">Gol<br><?= $pemain['gol']?></p>
                            <p class="text-center" style="color: white;">Assist<br><?= $pemain['assist']?></p>
                            <p class="text-center" style="color: white;">Tackle<br><?= $pemain['tackle']?></p>
                        </div>
                        <?php
                            }
                        endforeach;
                        ?>
                        <!-- /Pemain -->
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="rounded rounded-4 px-3 pt-3" style="background-color: #404258; color: white;">
                    <!-- Statistik Pemain -->
                    <div class="row row-cols-2" style="height: 820px;">
                        <!-- Home -->
                        <div class="col p-2 px-3">
                            <div class="row row-cols-1">
                                <div class="d-flex justify-content-between align-items-center pb-1 mb-2 border-bottom border-3">
                                    <div class="fs-5">
                                        Name
                                    </div>
                                    <div class="fs-5">
                                        Rating
                                    </div>
                                </div>
                            </div>
                            <!-- Pemain -->
                            <?php
                            $p = cariPemainByPertandingan($id);
                            foreach($p as $pemain) :
                                if($pemain['tim_id'] == $tim_home_id){
                            ?>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <img src="../image/pemain/<?= $pemain['nama']?>.png" alt="" class="border rounded-circle h-100" style="width: 35px;">
                                    <a href="" class="text-decoration-none fs-5 ms-2" style="color: white;"><?= $pemain['nama']?></a>
                                    <?php
                                    for ($i=0; $i < $pemain['gol']; $i++) { 
                                    ?>
                                    <img src="../image/icon/bola.png" alt="" class="h-100" style="width: 20px;">
                                    <?php
                                    }
                                    for ($i=0; $i < $pemain['assist']; $i++) { 
                                    ?>
                                    <img src="../image/icon/assist.png" alt="" class="h-100" style="width: 20px;">
                                    <?php
                                    }
                                    ?>       
                                   
                                    
                                </div>

                                <div class="mx-4 fs-5 d-flex">
                                <?php
                                    for ($i=0; $i < $pemain['merah']; $i++) { 
                                    ?>
                                    <img src="../image/icon/redcard.png" alt="" style="width: 20px; height: fit-content;">
                                    <?php
                                    }
                                    for ($i=0; $i < $pemain['kuning']; $i++) { 
                                    ?>
                                    <img src="../image/icon/yellowcard.png" alt="" style="width: 20px; height: fit-content;">
                                    <?php
                                    }
                                    ?>   
                                    <p><?= $pemain['rating']?></p>
                                </div>
                            </div>
                            <?php
                                }
                            endforeach;
                            ?>
                            <!-- /Pemain -->
                        </div>
                        <!-- Away -->
                        <div class="col p-2 px-3">
                            <div class="row row-cols-1">
                                <div class="d-flex justify-content-between align-items-center pb-1 mb-2 border-bottom border-3">
                                    <div class="fs-5">
                                        Name
                                    </div>
                                    <div class="fs-5">
                                        Rating
                                    </div>
                                </div>
                            </div>
                            <?php
                            $p = cariPemainByPertandingan($id);
                            foreach($p as $pemain) :
                                if($pemain['tim_id'] == $tim_away_id){
                            ?>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <img src="../image/pemain/<?= $pemain['nama']?>.png" alt="" class="border rounded-circle h-100" style="width: 35px;">
                                    <a href="" class="text-decoration-none fs-5 ms-2 me-1" style="color: white;"><?= $pemain['nama']?></a>
                                    <?php
                                    for ($i=0; $i < $pemain['gol']; $i++) { 
                                    ?>
                                    <img src="../image/icon/bola.png" alt="" class="h-100" style="width: 20px;">
                                    <?php
                                    }
                                    for ($i=0; $i < $pemain['assist']; $i++) { 
                                    ?>
                                    <img src="../image/icon/assist.png" alt="" class="h-100" style="width: 20px;">
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="mx-4 fs-5 d-flex">
                                <?php
                                    for ($i=0; $i < $pemain['merah']; $i++) { 
                                    ?>
                                    <img src="../image/icon/redcard.png" alt="" style="width: 20px; height: fit-content;">
                                    <?php
                                    }
                                    for ($i=0; $i < $pemain['kuning']; $i++) { 
                                    ?>
                                    <img src="../image/icon/yellowcard.png" alt="" style="width: 20px; height: fit-content;">
                                    <?php
                                    }
                                    ?>   
                                    <p class="ms-1"><?= $pemain['rating']?></p>
                                </div>
                            </div>
                            <?php
                                }
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /Statistik Pemain -->
            </div>
            <div class="col-md-4 mt-3">
                <div class="rounded rounded-4 px-3 py-3 h-100" style="background-color: #404258; color: white;">
                    <!-- Standings -->
                    <?php
                    foreach($pertandingan as $p) :
                    ?>
                    <?php
                    if($p['liga_id'] == 1) :
                    ?>
                    <iframe id="sofa-standings-embed-1-52186" src="https://widgets.sofascore.com/embed/tournament/1/season/52186/standings/Premier%20League?widgetTitle=Premier League&showCompetitionLogo=true" style=height:794px!important;max-width:620px!important;width:100%!important; frameborder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                    <?php
                    if($p['liga_id'] == 2) :
                    ?>
                    <iframe id="sofa-standings-embed-42-52608" src="https://widgets.sofascore.com/embed/tournament/42/season/52608/standings/Bundesliga?widgetTitle=Bundesliga&showCompetitionLogo=true" style=height:738px!important;max-width:620px!important;width:100%!important; frameborder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                    <?php
                    if($p['liga_id'] == 3) :
                    ?>
                   <iframe id="sofa-standings-embed-36-52376" src="https://widgets.sofascore.com/embed/tournament/36/season/52376/standings/LaLiga?widgetTitle=LaLiga&showCompetitionLogo=true" style=height:794px!important;max-width:620px!important;width:100%!important; frameborder="0" scrolling="no"></iframe>
                    <?php
                    endif;
                    ?>
                    <?php
                    endforeach;    
                    ?>
                </div>
            </div>
            <div class="col-12 p-3 mt-5 px-4 pt-4" style="background-color: #404258; color: white;">
            <?php
                $komen = bacaKomentarByPertandingan($_GET['match']);
                foreach($komen as $k):
            ?>
                <div class="py-2 px-3 mb-3 rounded" style="background-color: #474E68;">
                <?php
                    if($k['user_id'] == $_SESSION['id']):
                ?>
                    <a href="./remove.php?id=<?=$k['id']?>" class="float-end text-decoration-none text-danger">remove</a>
                <?php
                    endif;
                ?>
                    <p class="fs-5" style="margin-bottom: 0px;"><?= $k['username']?></p>
                    <p class="fs-6"><?= $k['komentar']?></p>
                    <div class="d-flex justify-content-end">
                        <small><?= $k['created_at']?></small>
                    </div>
                </div>
            <?php
                endforeach;
            ?>
                <form action="./comment.php" class="my-3" method="POST">
                    <input type="hidden" name="match_id" value="<?= $_GET['match']?>">
                    <textarea type="text" name="comment" class="form-control" placeholder="comment in here" require></textarea>
                    <button type="submit" class="btn btn-secondary mt-2 float-end">Send</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>