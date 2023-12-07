<?php

require_once('../../../crud.php');

?>

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
</head>
<body>
    <div class="continer-fluid vh-100">
        <div class="row h-100">
            <div class="col-2 px-4 pt-4" style="background-color: lightgray;">
                <a href="../../" style="color: darkslateblue;" class="nav-link fw-bold fs-4 mb-3">DASHBOARD</a>
                <a href="../" style="color: darkslateblue;" class="nav-link fw-bold fs-5 mb-2">Pertandingan</a>
                <a href="../../tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Tim</a>
                <a href="../../pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pemain</a>
                <a href="../../statistik-tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Tim</a>
                <a href="../../statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="d-flex flex-wrap ms-2 my-5" style="width: 75vw;">
                <input type="hidden" id="match_id" value="<?= $_POST['match_id']?>">
                <?php
                if(isset($_POST['pemain'])) :
                    $i = 0;
                    foreach ($_POST['pemain'] as $p) :
                        $pemain = cariPemain($p);
                ?>
                    <div class="border rounded w-100 p-2 mb-4" id="pemain-<?= $i ?>" style="display: block;">
                        <input type="hidden" value="<?= $p ?>" id="id-<?= $i ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pemain</label>
                            <input type="text" class="form-control" id="nama-<?= $i?>" value="<?= $pemain['nama']?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Gol</label>
                            <input type="number" class="form-control" id="gol-<?= $i?>" min="0" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Assist</label>
                            <input type="number" class="form-control" id="assist-<?= $i?>" min="0" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Teckle</label>
                            <input type="number" class="form-control" id="tackle-<?= $i?>" min="0" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Rating</label>
                            <input type="number" class="form-control" id="rating-<?= $i?>" min="0" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Merah</label>
                            <input type="number" class="form-control" id="merah-<?= $i?>" min="0" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kuning</label>
                            <input type="number" class="form-control" id="kuning-<?= $i?>" min="0" value="0">
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" id="kunci-<?= $i?>" value="1" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Kunci
                            </label>
                        </div>
                    </div>
                    <?php
                        $i++;
                    endforeach;
                endif;
                ?>
                    <button class="btn btn-primary w-100 float-end addPemain" data-count="<?= $i?>">Go</button>
                    <button class="btn btn-success w-100 mt-2" onclick="history.back()">Kembali ke Pemain</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
$(document).ready(function() {
    $('.addPemain').click(function() {
        var count = $(this).data('count');
        for (let i = 0; i < count; i++) {
            var id = $('#id-'+i).val();
            var gol = $('#gol-'+i).val();
            var match_id = $('#match_id').val();
            var assist = $('#assist-'+i).val();    
            var tackle = $('#tackle-'+i).val();    
            var kunci = '0';
            if($('#kunci-'+i).
            is(':checked')){
                var kunci = '1'
            }
            var rating = $('#rating-'+i).val();
            if (rating == 0) {
                alert('Terdapat Data Rating yang Kosong!');
                break;
            }
            var merah = $('#merah-'+i).val();
            var kuning = $('#kuning-'+i).val();
    
            $.ajax({
                type: 'POST',
                url: './proses.php',
                data: {
                    id: id,
                    match_id: match_id,
                    gol: gol,    
                    assist: assist,    
                    tackle: tackle,    
                    kunci: kunci,
                    rating: rating,
                    merah: merah,
                    kuning: kuning,
                },
                success: function(data) {
                    if(data == 'true'){
                        $('#pemain-'+i).css('display', 'none');
                        alert('Berhasil di tambah!');
                    }else{
                        alert('Gagal di tambah!');
                    }
                }
            });
        }
        // history.back();
    });
});
</script>