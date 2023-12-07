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
    $liga = bacaLiga();
    ?>
</head>
<body>
    <div class="continer-fluid vh-100">
        <div class="row h-100">
            <div class="col-2 px-4 pt-4" style="background-color: lightgray;">
                <a href="../" style="color: darkslateblue;" class="nav-link fw-bold fs-4 mb-3">DASHBOARD</a>
                <a href="#" style="color: darkslateblue;" class="nav-link fw-bold fs-5 mb-2">Pertandingan</a>
                <a href="../tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Tim</a>
                <a href="../pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pemain</a>
                <a href="../statistik-tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Tim</a>
                <a href="../statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="m-3">
                    <label class="form-label">Liga</label>
                    <select class="form-select mb-2" aria-label="Default select example" name="liga" id="selectLiga">
                        <option selected disabled>Select Liga</option>
                        <?php
                        foreach($liga as $l) :
                        ?>
                        <option value="<?= $l['id']?>"><?= $l['nama']?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                    <!-- Liga 1 -->
                    <table class="table table-hover w-100" id="liga_1" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Liga</th>
                                <th scope="col">Home Tim</th>
                                <th scope="col">Home Score</th>
                                <th scope="col">Away Tim</th>
                                <th scope="col">Away Score</th>
                                <th scope="col">Match Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pertandingan = cariPertandinganByLiga(1);
                        $i = 1;
                        foreach($pertandingan as $data) :
                        ?>
                            <tr>
                                <th scope="row"><?= $i?></th>
                                <td><?= $data['liga']?></td>
                                <td><?= $data['tim_home']?></td>
                                <td><?= $data['score_home']?></td>
                                <td><?= $data['tim_away']?></td>
                                <td><?= $data['score_away']?></td>
                                <td><?= $data['date']?></td>
                                <td><a href="./add/?pertandingan_id=<?=$data['id']?>" class="btn btn-primary m-1">Add</a></td>
                            </tr>
                        <?php
                        $i++;
                        endforeach;
                        ?>
                        </tbody>
                        
                    </table>
                    <!-- Liga 2 -->
                    <table class="table table-hover w-100" id="liga_2" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Liga</th>
                                <th scope="col">Home Tim</th>
                                <th scope="col">Home Score</th>
                                <th scope="col">Away Tim</th>
                                <th scope="col">Away Score</th>
                                <th scope="col">Match Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pertandingan = cariPertandinganByLiga(2);
                        $i = 1;
                        foreach($pertandingan as $data) :
                        ?>
                            <tr>
                                <th scope="row"><?= $i?></th>
                                <td><?= $data['liga']?></td>
                                <td><?= $data['tim_home']?></td>
                                <td><?= $data['score_home']?></td>
                                <td><?= $data['tim_away']?></td>
                                <td><?= $data['score_away']?></td>
                                <td><?= $data['date']?></td>
                                <td><a href="./add/?pertandingan_id=<?=$data['id']?>" class="btn btn-primary m-1">Add</a></td>
                            </tr>
                        <?php
                        $i++;
                        endforeach;
                        ?>
                        </tbody>
                        
                    </table>
                    <!-- Liga 3 -->
                    <table class="table table-hover" id="liga_3" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Liga</th>
                                <th scope="col">Home Tim</th>
                                <th scope="col">Home Score</th>
                                <th scope="col">Away Tim</th>
                                <th scope="col">Away Score</th>
                                <th scope="col">Match Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pertandingan = cariPertandinganByLiga(3);
                        $i = 1;
                        foreach($pertandingan as $data) :
                        ?>
                            <tr>
                                <th scope="row"><?= $i?></th>
                                <td><?= $data['liga']?></td>
                                <td><?= $data['tim_home']?></td>
                                <td><?= $data['score_home']?></td>
                                <td><?= $data['tim_away']?></td>
                                <td><?= $data['score_away']?></td>
                                <td><?= $data['date']?></td>
                                <td><a href="./add/?pertandingan_id=<?=$data['id']?>" class="btn btn-primary m-1">Add</a></td>
                            </tr>
                        <?php
                        $i++;
                        endforeach;
                        ?>
                        </tbody>
                        
                    </table>
                    <a href="./add/" class="btn btn-secondary float-end">Create Data</a>
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
            $('#liga_1').css('display', 'inline-table')
            $('#liga_2').css('display', 'none')
            $('#liga_3').css('display', 'none')
        }
        if(this.value == 2){
            $('#liga_1').css('display', 'none')
            $('#liga_2').css('display', 'inline-table')
            $('#liga_3').css('display', 'none')
        }
        if(this.value == 3){
            $('#liga_1').css('display', 'none')
            $('#liga_2').css('display', 'none')
            $('#liga_3').css('display', 'inline-table')
        }
      });
    });
</script>