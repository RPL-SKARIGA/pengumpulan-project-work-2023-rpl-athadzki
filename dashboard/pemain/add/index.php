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
        $liga = bacaLiga();
        $tim =  bacaTim();
    ?>
</head>
<body>
    <div class="continer-fluid vh-100">
        <div class="row h-100">
            <div class="col-2 px-4 pt-4" style="background-color: lightgray;">
                <a href="/FootyStats/dashboard" style="color: darkslateblue;" class="nav-link fw-bold fs-4 mb-3">DASHBOARD</a>
                <a href="/FootyStats/dashboard/pertandingan/" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pertandingan</a>
                <a href="/FootyStats/dashboard/tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Tim</a>
                <a href="/FootyStats/dashboard/pemain" style="color: darkslateblue;" class="nav-link fw-bold fs-5 mb-2">Pemain</a>
                <a href="/FootyStats/dashboard/statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="d-flex flex-wrap ms-2 my-5" style="width: 75vw;">
                    <!-- Tambah Pemain -->
                    <img src="" id="previewImg" class="img-thumbnail w-50" alt="" style="display: none;" accept="image/*">
                    <form action="./proses.php" method="post" enctype="multipart/form-data" class="w-100" id="liga_1">
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="fileInput" id="fileInput" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <label class="form-label">Tim</label>
                        <div class="mb-3 overflow-y-auto border p-2 rounded" style="height: 300px;">
                            <?php
                            $tim = bacaTim();
                            foreach($tim as $t) :
                            ?>
                            <div class="form-check my-1 align-items-center d-flex">
                                <input class="form-check-input border-2" type="radio" value="<?=$t['id']?>" name="tim_id">
                                <label class="form-check-label ms-2">
                                    <img src="../../../image/tim/<?= $t['nama']?>.png" alt="" class="object-fit-cover p-1 me-2 bg-dark rounded" style="width: 50px; height: 50px;"><?= $t['nama']?>
                                </label>
                            </div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                        <div class="mb-3">
                            <div class="float-end">
                                <button type="submit" name="submit" class="btn btn-outline-secondary me-2">Send</button>
                                <button onclick="history.back()" class="btn btn-outline-danger float-end me-2">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
$(document).ready(function () {
    $("#fileInput").on("change", function() {
        var fileInput = $(this)[0];
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImg').attr('src', e.target.result);
                $('#previewImg').css('display', 'block');
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });
});
</script>