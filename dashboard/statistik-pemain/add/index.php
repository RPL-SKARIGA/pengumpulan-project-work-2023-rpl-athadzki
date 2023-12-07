<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
        require_once('../../../crud.php');
        $liga = cariPertandingan($_GET['pertandingan_id']);
        foreach($liga as $liga){
            $home_tim = cariTim($liga['tim_home_id']);   
            $away_tim = cariTim($liga['tim_away_id']);
        }

        $pemain_home = cariPemainByTimId($home_tim['id']);
        $pemain_away = cariPemainByTimId($away_tim['id']);
    ?>
</head>
<body>
    <div class="continer-fluid vh-100">
        <div class="row h-100">
            <div class="col-2 px-4 pt-4" style="background-color: lightgray;">
                <a href="../../" style="color: darkslateblue;" class="nav-link fw-bold fs-4 mb-3">DASHBOARD</a>
                <a href="../" style="color: darkslateblue;" class="nav-link fw-bold fs-5 mb-2">Pertandingan</a>
                <a href="../../tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Tim</a>
                <a href="../../pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pemain</a>
                <a href="../../statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="d-flex flex-wrap ms-2 my-5" style="width: 75vw;">
                    <!-- Home_tim -->
                    <label class="form-label"><?= $home_tim['nama']?></label>
                    <table class="table table-hover w-100" id="liga_1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Tim</th>
                                <th scope="col">Score</th>
                                <th scope="col">Assist</th>
                                <th scope="col">Tackle</th>
                                <th scope="col">Kunci</th>
                                <th scope="col">Merah</th>
                                <th scope="col">Kuning</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $p = cariPemainByPertandingan($_GET['pertandingan_id']);
                        $i = 1;
                        foreach($p as $pemain) :
                            if($pemain['tim_id'] == $home_tim['id']){
                        ?>
                            <tr>
                                <th scope="row"><?= $i?></th>
                                <td> 
                                    <img src="../../../image/pemain/<?= $pemain['nama']?>.png" alt="" class="border rounded-circle h-100" style="width: 35px;">
                                    <?= $pemain['nama']?></td>
                                <td><?= $home_tim['nama']?></td>
                                <td><?= $pemain['gol']?></td>
                                <td><?= $pemain['assist']?></td>
                                <td><?= $pemain['tackle']?></td>
                                <td><?= $pemain['kunci']?></td>
                                <td><?= $pemain['merah']?></td>
                                <td><?= $pemain['kuning']?></td>
                                <td><?= $pemain['rating']?></td>
                                <td><a href="../update/?id=<?=$pemain['id']?>" class="btn btn-primary m-1">Edit</a><a href="./drop.php?id=<?=$pemain['id']?>&match_id=<?=$_GET['pertandingan_id']?>" class="btn btn-danger m-1">Drop</a></td>
                            </tr>
                        <?php
                            }
                            $i++;
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                    <form action="./add.php" method="post" class="w-100 mb-5" id="liga_1">
                        <p>Tambah Pemain</p>
                        <div class="overflow-y-scroll border rounded p-2" style="height: 200px;">
                            <?php
                            foreach($pemain_home as $item) :
                                if(cariPemainBertanding($item['id'], $_GET['pertandingan_id']) == null) :
                                ?>
                            <div class="form-check my-2">
                                <input class="form-check-input" type="checkbox" name="pemain[]" value="<?= $item['id']?>" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                <img src="../../../image/pemain/<?= $item['nama']?>.png" alt="" class="border rounded-circle h-100 me-2" style="width: 30px;"><?= $item['nama']?>
                                </label>
                            </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                        <input type="hidden" name="match_id" value="<?= $_GET['pertandingan_id']?>">
                        <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
                    </form>
                    <!-- Away_tim -->
                    <label class="form-label"><?= $away_tim['nama']?></label>
                    <table class="table table-hover w-100" id="liga_1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Tim</th>
                                <th scope="col">Score</th>
                                <th scope="col">Assist</th>
                                <th scope="col">Tackle</th>
                                <th scope="col">Kunci</th>
                                <th scope="col">Merah</th>
                                <th scope="col">Kuning</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $p = cariPemainByPertandingan($_GET['pertandingan_id']);
                        $i = 1;
                        foreach($p as $pemain) :
                            if($pemain['tim_id'] == $away_tim['id']){
                        ?>
                            <tr>
                                <th scope="row"><?= $i?></th>
                                <td> 
                                    <img src="../../../image/pemain/<?= $pemain['nama']?>.png" alt="" class="border rounded-circle h-100" style="width: 35px;">
                                    <?= $pemain['nama']?></td>
                                <td><?= $away_tim['nama']?></td>
                                <td><?= $pemain['gol']?></td>
                                <td><?= $pemain['assist']?></td>
                                <td><?= $pemain['tackle']?></td>
                                <td><?= $pemain['kunci']?></td>
                                <td><?= $pemain['merah']?></td>
                                <td><?= $pemain['kuning']?></td>
                                <td><?= $pemain['rating']?></td>
                                <td><a href="../update/?id=<?=$pemain['id']?>" class="btn btn-primary m-1">Edit</a><a href="./drop.php?id=<?=$pemain['id']?>&match_id=<?=$_GET['pertandingan_id']?>" class="btn btn-danger m-1">Drop</a></td>
                            </tr>
                        <?php
                            }
                            $i++;
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                    <form action="./add.php" method="post" class="w-100 mb-5" id="liga_1">
                        <p>Tambah Pemain</p>
                        <div class="overflow-y-scroll border rounded p-2" style="height: 200px;">
                            <?php
                            foreach($pemain_away as $item) :
                                if(cariPemainBertanding($item['id'], $_GET['pertandingan_id']) == null) :
                                ?>
                            <div class="form-check my-2">
                                <input class="form-check-input" type="checkbox" name="pemain[]" value="<?= $item['id']?>" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                <img src="../../../image/pemain/<?= $item['nama']?>.png" alt="" class="border rounded-circle h-100 me-2" style="width: 30px;"><?= $item['nama']?>
                                </label>
                            </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                        <input type="hidden" name="match_id" value="<?= $_GET['pertandingan_id']?>">
                        <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
      $('#selectLiga').on('change', function() {
        if(this.value == 1){
            $('#liga_1').css('display', 'block')
            $('#liga_2').css('display', 'none')
            $('#liga_3').css('display', 'none')
        }
        if(this.value == 2){
            $('#liga_1').css('display', 'none')
            $('#liga_2').css('display', 'block')
            $('#liga_3').css('display', 'none')
        }
        if(this.value == 3){
            $('#liga_1').css('display', 'none')
            $('#liga_2').css('display', 'none')
            $('#liga_3').css('display', 'block')
        }
      });
    });
</script>