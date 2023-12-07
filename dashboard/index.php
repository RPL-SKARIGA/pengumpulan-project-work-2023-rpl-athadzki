<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Dashboard</title>
    <style>
        html, body {
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 0;
        }
    </style>
    <?php
    require_once('../crud.php');
    ?>
</head>
<body>
    <div class="continer-fluid vh-100">
        <div class="row h-100">
            <div class="col-2 px-4 pt-4" style="background-color: lightgray;">
                <a href="" style="color: darkslateblue;" class="nav-link fw-bold fs-4 mb-3">DASHBOARD</a>
                <a href="./pertandingan" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pertandingan</a>
                <a href="./tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Tim</a>
                <a href="./pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pemain</a>
                <a href="./statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="d-flex flex-wrap ms-2 my-3" style="width: 75vw;">
                    <a href="./pertandingan" class="nav-link m-3">    
                        <div class="card shadow" style="width: 30vw; height: 13vw; background-color: lightseagreen; border: none;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <p class="fs-3 fw-bold" style="color: white;">PERTANDINGAN</p>
                                <p class="fw-bold" style="color: white; font-size: 50px;"><?= jumlahPertandingan()?></p>
                            </div>
                        </div>
                    </a>
                    <a href="./pertandingan" class="nav-link m-3">    
                        <div class="card shadow" style="width: 30vw; height: 13vw; background-color: lightcoral; border: none;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <p class="fs-3 fw-bold" style="color: white;">TIM</p>
                                <p class="fw-bold" style="color: white; font-size: 50px;">0</p>
                            </div>
                        </div>
                    </a>
                    <a href="./pemain" class="nav-link m-3">    
                        <div class="card shadow" style="width: 30vw; height: 13vw; background-color: lightgreen; border: none;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <p class="fs-3 fw-bold" style="color: white;">PEMAIN</p>
                                <p class="fw-bold" style="color: white; font-size: 50px;">0</p>
                            </div>
                        </div>
                    </a>
                    <a href="./pertandingan" class="nav-link m-3">    
                        <div class="card shadow" style="width: 30vw; height: 13vw; background-color: lightpink; border: none;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <p class="fs-3 fw-bold" style="color: white;">STATISTIK PEMAIN</p>
                                <p class="fw-bold" style="color: white; font-size: 50px;">0</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div> 
                    <div class="card shadow mx-4 mb-4" style="width: 62.5vw; background-color: lightslategray; border: none;">
                        <div class="card-body">
                            <p class="fs-3 fw-bold text-center" style="color: white;">HISTORY PEMINDAHAN PEMAIN</p>
                            <div class="container">
                                <?php
                                $history = bacaHistory();
                                foreach ($history as $i):
                                ?>
                                <div class="py-2 mb-1 row">
                                    <!-- Pemain -->
                                    <div class="col">
                                        <?php
                                        $p = cariPemain($i['id']);
                                        ?>
                                        <img src="../image/pemain/<?=$p['nama']?>.png" alt="" class="rounded rounded-circle mx-2" style="width: 40px;">
                                        <a href="#" class="text-decoration-none align-self-center" style="color: white;"><?=$p['nama']?></a>
                                    </div>
                                    <!-- Old Tim -->
                                    <div class="col-2 text-end">
                                        <?php
                                        $tim = cariTim($i['old_tim']);
                                        ?>
                                        <img src="../image/tim/<?=$tim['nama']?>.png" alt="" class="mx-2" style="width: 40px;">
                                    </div>
                                    <div class="text-center col-1 text-white pt-2"><i class="fa-solid fa-arrow-right"></i></div>
                                    <!-- New Tim -->
                                    <div class="col-2">
                                        <?php
                                        $tim = cariTim($i['new_tim']);
                                        ?>
                                        <img src="../image/tim/<?=$tim['nama']?>.png" alt="" class="mx-2" style="width: 40px;">
                                    </div>
                                    <!-- Date -->
                                    <div class="col text-end">
                                        <p class="pt-2" style="color: white;"><?=date("F jS, Y", strtotime($i['date']));?></p>
                                    </div>
                                </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>