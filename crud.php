<?php


function bacaKomentarByPertandingan($id) {
    include ("conn.php");
    $data = array();
    $sql = "SELECT komentar.*, user.* FROM `komentar` INNER JOIN user ON komentar.user_id = user.id WHERE match_id = $id";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['komen_id'];
        $data[$i]['match_id'] = $baris['match_id'];
        $data[$i]['user_id'] = $baris['id'];
        $data[$i]['komentar'] = $baris['komen_text'];
        $data[$i]['username'] = $baris['username'];
        $data[$i]['created_at'] = $baris['created_at'];
        $i++;
    }
    return $data;
}

function tambahKomentar($desc, $match_id, $user_id, $date) {
    include ("conn.php");
    $sql = "INSERT INTO komentar VALUES('', '$match_id', '$user_id', '$desc', '$date')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{ 
        return false;
    }
}

function hapusKomentar($id) {
    include ("conn.php");
    $sql = "DELETE FROM komentar WHERE komen_id = $id";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{ 
        return false;
    }
}

// Liga

function cariLiga($i){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM liga WHERE liga_id = $i";
    $hasil = mysqli_query($conn, $sql);
    if(mysqli_num_rows($hasil) > 0){
        $baris = mysqli_fetch_assoc($hasil);
        $data['id'] = $baris['liga_id'];
        $data['nama'] = $baris['liga'];
        return $data;
    }
}

function bacaLiga(){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM liga";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['liga_id'];
        $data[$i]['nama'] = $baris['liga'];
        $i++;
    }
    return $data;
}

// Tim

function bacaTimByLiga($id){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM tim WHERE liga = $id";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['tim_id'];
        $data[$i]['nama'] = $baris['nama_tim'];
        $data[$i]['liga_id'] = $baris['liga'];
        $data[$i]['stadion'] = $baris['stadion'];
        $i++;
    }
    return $data;
}

function bacaTim(){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM tim";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['tim_id'];
        $data[$i]['nama'] = $baris['nama_tim'];
        $data[$i]['liga_id'] = $baris['liga'];
        $data[$i]['stadion'] = $baris['stadion'];
        $i++;
    }
    return $data;
}

function cariTim($i){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM tim WHERE tim_id = $i";
    $hasil = mysqli_query($conn, $sql);
    if(mysqli_num_rows($hasil) > 0){
        $baris = mysqli_fetch_assoc($hasil);
        $data['id'] = $baris['tim_id'];
        $data['nama'] = $baris['nama_tim'];
        $data['liga_id'] = $baris['liga'];
        $data['stadion'] = $baris['stadion'];
        return $data;
    }
}

function cariTimByLiga($i){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM tim WHERE liga = $i";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['tim_id'];
        $data[$i]['nama'] = $baris['nama_tim'];
        $data[$i]['liga_id'] = $baris['liga'];
        $data[$i]['stadion'] = $baris['stadion'];
        $i++;
    }
    return $data;
}

function cariTimByNama($key){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM tim WHERE nama_tim LIKE '%$key%'";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['tim_id'];
        $data[$i]['nama'] = $baris['nama_tim'];
        $data[$i]['liga_id'] = $baris['liga'];
        $data[$i]['stadion'] = $baris['stadion'];
        $i++;
    }
    return $data;
}

function tambahTim($name, $liga_id, $stadion){
    include ("conn.php");
    $sql = "INSERT INTO tim VALUES('', '$name', '$liga_id', '$stadion')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{ 
        return false;
    }
}

function hapusTim($id){
    include ("conn.php");
    $tim = cariTim($id);
    $file = "../../image/tim/".$tim['nama'].".png";
    if(file_exists($file)){
        if(unlink($file)){
            $sql = "DELETE FROM tim WHERE tim_id=$id";
            if(mysqli_query($conn, $sql)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}

// Pemain

function bacaPemain(){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM pemain ORDER BY nama ASC";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['pemain_id'];
        $data[$i]['nama'] = $baris['nama'];
        $data[$i]['tim_id'] = $baris['tim_id'];
        $i++;
    }
    return $data;
}

function cariPemainByTimId($id){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM pemain WHERE tim_id = $id";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['pemain_id'];
        $data[$i]['nama'] = $baris['nama'];
        $data[$i]['tim_id'] = $baris['tim_id'];
        $i++;
    }
    return $data;
}

function cariPemain($i){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM pemain WHERE pemain_id = $i";
    $hasil = mysqli_query($conn, $sql);
    if(mysqli_num_rows($hasil) > 0){
        $baris = mysqli_fetch_assoc($hasil);
        $data['id'] = $baris['pemain_id'];
        $data['nama'] = $baris['nama'];
        $data['tim_id'] = $baris['tim_id'];
        return $data;
    }else{
        return null;
    }
}

function cariPemainByName($key){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM pemain WHERE nama LIKE '%$key%'";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['pemain_id'];
        $data[$i]['nama'] = $baris['nama'];
        $data[$i]['tim_id'] = $baris['tim_id'];
        $i++;
    }
    return $data;
}

function cariPemainBertanding($id, $match_id){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM statistik_pemain WHERE pemain_id = $id && pertandingan_id = '$match_id'";
    $hasil = mysqli_query($conn, $sql);
    if(mysqli_num_rows($hasil) > 0){
        $baris = mysqli_fetch_assoc($hasil);
        $data['id'] = $baris['pemain_id'];
        $pemain = cariPemain($data['id']);
        $data['nama'] = $pemain['nama'];
        $data['tim_id'] = $pemain['tim_id'];
        $data['gol'] = $baris['gol'];
        $data['assist'] = $baris['assist'];
        $data['tackle'] = $baris['tackle'];
        $data['kunci'] = $baris['kunci'];
        $data['rating'] = $baris['rating'];
        $data['merah'] = $baris['merah'];
        $data['kuning'] = $baris['kuning'];
        return $data;
    }else{
        return null;
    }
}

function tambahPemain($tim_id, $name){
    include ("conn.php");
    $sql = "INSERT INTO pemain VALUES('', '$name', '$tim_id')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{ 
        return false;
    }
}

function editPemain($id, $tim_id, $name){
    include ("conn.php");
    $sql = "UPDATE pemain SET nama = '$name', tim_id = $tim_id WHERE pemain_id = $id";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{ 
        return false;
    }
}

function hapusPemain($id){
    include ("conn.php");
    $pemain = cariPemain($id);
    $file = "../../image/pemain/".$pemain['nama'].".png";
    if(file_exists($file)){
        if(unlink($file)){
            $sql = "DELETE FROM pemain WHERE pemain_id=$id";
            if(mysqli_query($conn, $sql)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function tambahStatistikPemain($pertandingan_id, $pemain_id, $gol, $assist, $tackle, $kunci, $rating, $merah, $kuning){
    include ("conn.php");
    $sql = "INSERT INTO statistik_pemain VALUES('', '$pertandingan_id', '$pemain_id', '$gol', '$assist', '$tackle', '$kunci', '$rating', '$merah', '$kuning')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

function hapusStatistikPemain($pertandingan_id, $pemain_id){
    include ("conn.php");
    $sql = "DELETE FROM statistik_pemain WHERE pertandingan_id = '$pertandingan_id' && pemain_id = '$pemain_id'";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

// Pertandingan

function cariPertandinganByLiga($liga){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM pertandingan WHERE liga_id = $liga";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['match_id'];
        $data[$i]['tim_home'] = $baris['tim_home_id'];
        $data[$i]['tim_away'] = $baris['tim_away_id'];
        $data[$i]['date'] = $baris['match_date'];
        $data[$i]['liga'] = $baris['liga_id'];
        $data[$i]['score_home'] = $baris['score_home'];
        $data[$i]['score_away'] = $baris['score_away'];
        $liga = cariLiga($data[$i]['liga']);
        $data[$i]['liga'] = $liga['nama'];
        $tim = cariTim($data[$i]['tim_home']);
        $data[$i]['tim_home'] = $tim['nama'];
        $tim = cariTim($data[$i]['tim_away']);
        $data[$i]['tim_away'] = $tim['nama'];
        $i++;
    }
    return $data;
}

function cariPertandingan($id){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM pertandingan WHERE match_id = $id";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['match_id'];
        $data[$i]['tim_home_id'] = $baris['tim_home_id'];
        $data[$i]['tim_away_id'] = $baris['tim_away_id'];
        $data[$i]['date'] = $baris['match_date'];
        $data[$i]['liga_id'] = $baris['liga_id'];
        $data[$i]['score_home'] = $baris['score_home'];
        $data[$i]['score_away'] = $baris['score_away'];
        $liga = cariLiga($data[$i]['liga_id']);
        $data[$i]['liga'] = $liga['nama'];
        $tim = cariTim($data[$i]['tim_home_id']);
        $data[$i]['stadion'] = $tim['stadion'];
        $data[$i]['tim_home'] = $tim['nama'];
        $tim = cariTim($data[$i]['tim_away_id']);
        $data[$i]['tim_away'] = $tim['nama'];
        $i++;
    }
    return $data;
}

function bacaPertandingan(){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM pertandingan";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['tim_home_id'] = $baris['tim_home_id'];
        $data[$i]['tim_away_id'] = $baris['tim_away_id'];
        $data[$i]['date'] = $baris['match_date'];
        $data[$i]['liga'] = $baris['liga_id'];
        $data[$i]['score_home'] = $baris['score_home'];
        $data[$i]['score_away'] = $baris['score_away'];
        $liga = cariLiga($data[$i]['liga']);
        $data[$i]['liga'] = $liga['nama'];
        $tim = cariTim($data[$i]['tim_home_id']);
        $data[$i]['stadion'] = $tim['stadion'];
        $data[$i]['tim_home'] = $tim['nama'];
        $tim = cariTim($data[$i]['tim_away_id']);
        $data[$i]['tim_away'] = $tim['nama'];
        $i++;
    }
    return $data;
}

function jumlahPertandingan() {
    include("conn.php"); // Pastikan file conn.php sudah sesuai dengan pengaturan koneksi Anda

    $sql = "SELECT count(*) as total FROM pertandingan";
    $hasil = mysqli_query($conn, $sql);

    if ($hasil) {
        $row = mysqli_fetch_assoc($hasil);
        return $row['total'];
    } else {
        return 0; // Mengembal
    }
}

function tambahPertandingan($liga_id, $match_date, $home_tim, $home_score, $away_tim, $away_score){
    include ("conn.php");
    $sql = "INSERT INTO pertandingan VALUES('', '$home_tim', '$away_tim', '$match_date', '$liga_id', '$home_score', '$away_score')";
    if(mysqli_query($conn, $sql)){
        return true;
    }
    else false;
}

function editPertandingan($match_id, $match_date, $home_tim, $home_score, $away_tim, $away_score){
    include ("conn.php");
    $sql = "UPDATE pertandingan SET tim_home_id = '$home_tim', tim_away_id = '$away_tim', match_date = '$match_date', score_home = '$home_score', score_away = '$away_score' WHERE match_id = $match_id";
    if(mysqli_query($conn, $sql)){
        return true;
    }
    return false;
}

function HapusPertandingan($id){
    include ("conn.php");

    $sql = "DELETE FROM komentar WHERE match_id = $id";
    $hasil = mysqli_query($conn, $sql);
    if ($hasil){
        $sql = "DELETE FROM statistik_pemain WHERE pertandingan_id = $id";
        $hasil = mysqli_query($conn, $sql);
        if ($hasil){
            $sql = "DELETE FROM pertandingan WHERE match_id = $id";
            $hasil = mysqli_query($conn, $sql);
            if ($hasil){
                return true;
            }
            return false;
        }
        return false;
    }
}
//Pemain
function cariPemainByPertandingan($id){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM statistik_pemain WHERE pertandingan_id = $id";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['pemain_id'];
        $pemain = cariPemain($data[$i]['id']);
        $data[$i]['nama'] = $pemain['nama'];
        $data[$i]['tim_id'] = $pemain['tim_id'];
        $data[$i]['gol'] = $baris['gol'];
        $data[$i]['assist'] = $baris['assist'];
        $data[$i]['tackle'] = $baris['tackle'];
        $data[$i]['kunci'] = $baris['kunci'];
        $data[$i]['rating'] = $baris['rating'];
        $data[$i]['merah'] = $baris['merah'];
        $data[$i]['kuning'] = $baris['kuning'];
        $i++;
    }
    return $data;
}

function editScore($id, $score_home, $score_away){
    include ("conn.php");
    
    $sql = "UPDATE pertandingan SET score_home ='$score_home', score_away ='$score_away' WHERE match_id = '$id'";

    if(mysqli_query($conn, $sql)){
        return true;
    }
    else false;
}

function bacaHistory(){
    include ("conn.php");
    $data = array();
    $sql = "SELECT * FROM history ORDER BY id DESC";
    $hasil = mysqli_query($conn, $sql);
    $i = 0;
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[$i]['id'] = $baris['pemain_id'];
        $data[$i]['old_tim'] = $baris['klub_before'];
        $data[$i]['new_tim'] = $baris['klub_after'];
        $data[$i]['date'] = $baris['created_at'];
        $i++;
    }
    return $data;
}

function tambahHistory($pemain_id, $tim_id_new, $tim_id_old){
    include ("conn.php");
    $day = date("Y-m-d");
    $sql = "INSERT INTO history VALUES('', '$pemain_id', '$tim_id_old', '$tim_id_new', '$day')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{ 
        return false;
    }
}