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
    require_once('../../crud.php');
    ?>
</head>
<body>
    <div class="continer-fluid vh-100">
        <div class="row h-100">
            <div class="col-2 px-4 pt-4" style="background-color: lightgray;">
                <a href="../" style="color: darkslateblue;" class="nav-link fw-bold fs-4 mb-3">DASHBOARD</a>
                <a href="../pertandingan" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pertandingan</a>
                <a href="../tim" style="color: darkslateblue;" class="nav-link fw-bold fs-5 mb-2">Tim</a>
                <a href="../pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pemain</a>
                <a href="../statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="m-3">
                    <form class="d-flex my-2" method="get">
                        <input type="text" name="search" class="form-control">
                        <button class="btn btn-secondary ms-2 px-5">Search</button>
                        <a href="./add/" class="btn btn-secondary float-end px-3 ms-2 text-nowrap">Create Data</a>
                    </form>
                    <!-- Tim -->
                    <table class="table table-hover w-100" id="liga_1">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 20px;">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(isset($_GET['search'])):
                            $i = 1;
                            $tim = cariTimByNama($_GET['search']);
                            foreach($tim as $tim) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i?></th>
                                    <td> 
                                        <img src="../../image/tim/<?= $tim['nama']?>.png" alt="" class="h-100" style="width: 35px;">
                                        <?= $tim['nama']?>
                                    </td>
                                    <td><a href="./update/?id=<?=$tim['id']?>" class="btn btn-primary m-1">Edit</a><button class="btn btn-danger m-1 drop" data-id="<?=$tim['id']?>">Drop</button></td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                        ?>
                        <?php
                        else:
                            $i = 1;
                            $tim = bacaTim();
                            foreach($tim as $tim) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i?></th>
                                    <td> 
                                        <img src="../../image/tim/<?= $tim['nama']?>.png" alt="" class="h-100" style="width: 35px;">
                                        <?= $tim['nama']?>
                                    </td>
                                    <td><a href="./update/?id=<?=$tim['id']?>" class="btn btn-primary m-1">Edit</a><button class="btn btn-danger m-1 drop" data-id="<?=$tim['id']?>">Drop</button></td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function () {
        $('.drop').click(function () {
            $confirm = confirm('Drop This Tim?');
            if($confirm){
                var id = $(this).data('id');
                window.location.href = `drop.php?id=${id}`;
            }
        });
    });
</script>