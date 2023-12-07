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
        $id=$_GET['id'];
        $pemain = cariPemain($id);
        $tim =  bacaTim();
    ?>
</head>
<body>
    <div class="continer-fluid vh-100">
        <div class="row h-100">
            <div class="col-2 px-4 pt-4" style="background-color: lightgray;">
                <a href="../../" style="color: darkslateblue;" class="nav-link fw-bold fs-4 mb-3">DASHBOARD</a>
                <a href="../" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pertandingan</a>
                <a href="../../tim" style="color: darkslateblue;" class="nav-link fw-bold fs-5 mb-2">Tim</a>
                <a href="../../pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pemain</a>
                <a href="../../statistik-tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Tim</a>
                <a href="../../statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="d-flex flex-wrap ms-2 my-5" style="width: 75vw;">
                    <form action="./proses.php" method="post" class="w-100" id="liga_1">
                    <input type="hidden" name="id" value="<?= $pemain['id']?>">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $pemain['nama']?>" required>
                        </div>
                        <label class="form-label">Tim</label>
                        <div class="mb-3 overflow-y-auto border p-2 rounded" style="height: 300px;">
                            <?php
                            foreach($tim as $t) :
                                if($t['id'] == $pemain['tim_id']) {
                            ?>
                            <div class="form-check my-1 align-items-center d-flex">
                                <input class="form-check-input border-2" type="radio" value="<?=$t['id']?>" name="tim_id" checked>
                                <label class="form-check-label ms-2 fw-semibold">
                                    <img src="../../../image/tim/<?= $t['nama']?>.png" alt="" class="object-fit-cover p-1 me-2 bg-dark rounded" style="width: 50px; height: 50px;"><?= $t['nama']?>
                                </label>
                            </div>
                            <?php
                                }
                            endforeach;
                            ?>
                            <?php
                            foreach($tim as $t) :
                                if($t['id'] != $pemain['tim_id']) {
                            ?>
                            <div class="form-check my-1 align-items-center d-flex">
                                <input class="form-check-input border-2" type="radio" value="<?=$t['id']?>" name="tim_id">
                                <label class="form-check-label ms-2">
                                    <img src="../../../image/tim/<?= $t['nama']?>.png" alt="" class="object-fit-cover p-1 me-2 bg-dark rounded" style="width: 50px; height: 50px;"><?= $t['nama']?>
                                </label>
                            </div>
                            <?php
                                }
                            endforeach;
                            ?>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-secondary float-end">Update</button>
                            <button onclick="history.back()" class="btn btn-outline-danger float-end me-2">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>