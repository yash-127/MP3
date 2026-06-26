<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "mp3");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $clicked = isset($_GET["clicked"]) ? $_GET["clicked"] : "";

    if ($clicked == "playbtn") {
        // ✅ Efficient query using JOINs to fetch all needed data in one go
        $x = 0;
        $rs = mysqli_query($conn, "
            SELECT s.*, a.title as album_title 
            FROM songs s 
            JOIN album a ON s.code = a.code 
            WHERE s.code = '$id'
        ");

        while ($r = mysqli_fetch_array($rs)) {
            $scode = $r["code"];          // Use songs.code directly
            $songTitle = $r["title"];     // Use songs.title directly
            $sn = $r["sn"];               // sn from songs table
            $albumTitle = $r["album_title"];
?>

            <div class="doom2" style="position:absolute">
                <audio id="audio3<?= $x ?>" gol="<?= $scode ?>" rel="<?= $songTitle ?>" pol="<?= $albumTitle ?>" class="gana" controls>
                    <source src="album/<?= $r["code"] ?>/<?= $r["sn"] ?>.mp3" type="audio/mpeg">
                </audio>
            </div>

<?php
            $x++;
        }

    } else if ($clicked == "songspace") {
        
                // Efficient query using JOINs to fetch all needed data in one go
                $query = "
                    SELECT 
                        s.code AS song_code, 
                        s.sn, 
                        s.title AS song_title, 
                        a.title AS album_title
                    FROM clsongs c
                    JOIN songs s ON c.scode = s.code AND c.sn = s.sn
                    LEFT JOIN album a ON s.code = a.code
                    WHERE c.albcode = '$id'
                    ORDER BY c.way DESC
                ";

                $result = mysqli_query($conn, $query);
                $x = 0;
                while ($r = mysqli_fetch_array($result)) {
                    $scode = $r["song_code"];          // Use songs.code directly
                    $songTitle = $r["song_title"];     // Use songs.title directly
                    $sn = $r["sn"];               // sn from songs table
                    $albumTitle = $r["album_title"];
                 ?> 
                           <div class="doom4" style="position:absolute">
                <audio id="audio5<?= $x ?>" gol="<?= $scode ?>" rel="<?= $songTitle ?>" pol="<?= $albumTitle ?>" class="gana" controls>
                    <source src="album/<?= $r["song_code"] ?>/<?= $r["sn"] ?>.mp3" type="audio/mpeg">
                </audio>
            </div>

                    <?php
                    $x++;
                

    }
}
}
?>
