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
                <a href="../../" style="color: darkslateblue;" class="nav-link fw-bold fs-4 mb-3">DASHBOARD</a>
                <a href="../" style="color: darkslateblue;" class="nav-link fw-bold fs-5 mb-2">Pertandingan</a>
                <a href="../../tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Tim</a>
                <a href="../../pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Pemain</a>
                <a href="../../statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="d-flex flex-wrap ms-2 my-5" style="width: 75vw;">
                    <div class="mb-3 w-100">
                        <label class="form-label">Liga</label>
                        <select class="form-select" aria-label="Default select example" name="liga" id="selectLiga">
                            <option selected disabled>Select Liga</option>
                            <?php
                            foreach($liga as $l) :
                            ?>
                            <option value="<?= $l['id']?>"><?= $l['nama']?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <!-- Liga 1 -->
                    <form action="./proses.php" method="post" class="w-100" id="liga_1" style="display: none;">
                    <input type="hidden" name="liga_id" value="1">
                        <div class="mb-3">
                            <label class="form-label">Match Date</label>
                            <input type="date" name="match_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Home Tim</label>
                            <select class="form-select" aria-label="Default select example" name="home_tim" required>
                                <option selected disabled>Choose Home Tim</option>
                                <?php
                                foreach($tim as $t) :
                                    if($t['liga_id'] == 1) :
                                ?>
                                <option value="<?= $t['id']?>"><?= $t['nama']?></option>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Home Score</label>
                            <input type="number" min="0" name="home_score" class="form-control" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Away Tim</label>
                            <select class="form-select" aria-label="Default select example" name="away_tim" required>
                                <option selected disabled>Choose Away Tim</option>
                                <?php
                                foreach($tim as $t) :
                                    if($t['liga_id'] == 1) :
                                ?>
                                <option value="<?= $t['id']?>"><?= $t['nama']?></option>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Away Score</label>
                            <input type="number" min="0" name="away_score" class="form-control" value="0" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-secondary float-end">Send</button>
                        </div>
                    </form>
                    <!-- Liga 2 -->
                    <form action="./proses.php" method="post" class="w-100" id="liga_2" style="display: none;">
                        <input type="hidden" name="liga_id" value="2">
                        <div class="mb-3">
                            <label class="form-label">Match Date</label>
                            <input type="date" name="match_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Home Tim</label>
                            <select class="form-select" aria-label="Default select example" name="home_tim" required>
                                <option selected disabled>Choose Home Tim</option>
                                <?php
                                foreach($tim as $t) :
                                    if($t['liga_id'] == 2) :
                                ?>
                                <option value="<?= $t['id']?>"><?= $t['nama']?></option>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Home Score</label>
                            <input type="number" min="0" name="home_score" class="form-control" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Away Tim</label>
                            <select class="form-select" aria-label="Default select example" name="away_tim" required>
                                <option selected disabled>Choose Away Tim</option>
                                <?php
                                foreach($tim as $t) :
                                    if($t['liga_id'] == 2) :
                                ?>
                                <option value="<?= $t['id']?>"><?= $t['nama']?></option>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Away Score</label>
                            <input type="number" min="0" name="away_score" class="form-control" value="0" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-secondary float-end">Send</button>
                        </div>
                    </form>
                    <!-- Liga 3 -->
                    <form action="./proses.php" method="post" class="w-100" id="liga_3" style="display: none;">
                        <input type="hidden" name="liga_id" value="3">
                        <div class="mb-3">
                            <label class="form-label">Match Date</label>
                            <input type="date" name="match_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Home Tim</label>
                            <select class="form-select" aria-label="Default select example" name="home_tim" required>
                                <option selected disabled>Choose Home Tim</option>
                                <?php
                                foreach($tim as $t) :
                                    if($t['liga_id'] == 3) :
                                ?>
                                <option value="<?= $t['id']?>"><?= $t['nama']?></option>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Home Score</label>
                            <input type="number" min="0" name="home_score" class="form-control" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Away Tim</label>
                            <select class="form-select" aria-label="Default select example" name="away_tim" required>
                                <option selected disabled>Choose Away Tim</option>
                                <?php
                                foreach($tim as $t) :
                                    if($t['liga_id'] == 3) :
                                ?>
                                <option value="<?= $t['id']?>"><?= $t['nama']?></option>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Away Score</label>
                            <input type="number" min="0" name="away_score" class="form-control" value="0" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-secondary float-end">Send</button>
                        </div>
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