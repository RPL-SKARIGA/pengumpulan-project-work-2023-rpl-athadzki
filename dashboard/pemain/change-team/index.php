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
                <a href="../../statistik-tim" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Tim</a>
                <a href="../../statistik-pemain" style="color: slateblue;" class="nav-link fw-bold fs-5 mb-2">Statistik Pemain</a>
            </div>
            <div class="col">
                <div class="d-flex flex-wrap ms-2 my-5" style="width: 75vw;">
                    <!-- Liga 1 -->
                    <form action="./proses.php" method="post" class="w-100" id="liga">
                        <div class="mb-3 w-100">
                            <label class="form-label">Liga</label>
                            <select class="form-select" aria-label="Default select example" name="liga" id="liga_home">
                                <option selected disabled>Select Liga</option>
                                <?php
                                foreach($liga as $l) :
                                ?>
                                <option value="<?= htmlspecialchars(json_encode(cariTimByLiga($l['id'])))?>"><?= $l['nama']?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Current Tim</label>
                            <select class="form-select" aria-label="Default select example" id="home_tim" name="home_tim" required>
                                <option selected disabled>Choose Home Tim</option>\
                            </select>
                        </div>
                        <div class="overflow-y-scroll border rounded p-2 mb-3" id="pemain_list" style="height: 200px;">
                            <!-- Pemain -->
                        </div>
                        <div class="mb-3 w-100">
                            <label class="form-label">Liga</label>
                            <select class="form-select" aria-label="Default select example" name="liga" id="liga_away">
                                <option selected disabled>Select Liga</option>
                                <?php
                                foreach($liga as $l) :
                                ?>
                                <option value="<?= htmlspecialchars(json_encode(cariTimByLiga($l['id'])))?>"><?= $l['nama']?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Tim</label>
                            <select class="form-select" aria-label="Default select example" name="away_tim" id="away_tim" required>
                                <option selected disabled>Choose Away Tim</option>
                            </select>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#liga_home').on('change', function() {
            var tim_json = $(this).val();
            var tim = JSON.parse(tim_json);
            var nama = '';
            
            for (var i = 0; i < tim.length; i++) {
                var id = tim[i]['id'];
                var nama = tim[i]['nama'];
                $('#home_tim').append(`
                <option value="${id}">${nama}</option>
                `)
            }
        });

        $('#liga_away').on('change', function() {
            var tim_json = $(this).val();
            var tim = JSON.parse(tim_json);
            var nama = '';
            
            for (var i = 0; i < tim.length; i++) {
                var id = tim[i]['id'];
                var nama = tim[i]['nama'];
                $('#away_tim').append(`
                <option value="${id}">${nama}</option>
                `)
            }
        });

        $('#home_tim').on('change', function() {
            $('#pemain_list').html('');
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: './get_pemain_json_data.php',
                data: {
                    id: id,
                },
                success: function(data) {
                    $.each(data, function(index, item) {
                        $('#pemain_list').append(`
                            <div class="form-check my-2">
                                <input class="form-check-input" type="checkbox" name="pemain[]" value="${item['id']}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <img src="../../../image/pemain/${item['nama']}.png" alt="" class="border rounded-circle h-100 me-2" style="width: 30px;">${item['nama']}
                                </label>
                            </div>
                        `);
                    });
                }
            });
        });
    });
</script>