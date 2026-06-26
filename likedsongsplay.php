
<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "mp3");

// ✅ Check login via cookie
if(isset($_COOKIE["login"])){
    $email = $_COOKIE["login"];

    // ✅ Fetch client ID using email
    $ru = mysqli_query($conn, "SELECT * FROM clients WHERE email='$email'");
    if($rn = mysqli_fetch_array($ru)){
        $clientCode = $rn["code"];
    } else {
        exit("Invalid login. User not found.");
    }

} else {
    exit("Please login first to view liked songs");
}

$x = 0;

// ✅ Fetch liked songs for the client
$rst = mysqli_query($conn, "SELECT * FROM clliked WHERE client = '$clientCode'");

while($rt = mysqli_fetch_array($rst)){
    $scode = $rt["scode"];
    $sn = $rt["sn"];

    // ✅ Fetch song details
    $rs = mysqli_query($conn,"SELECT * FROM songs WHERE sn='$sn' AND code='$scode'");
    if ($r = mysqli_fetch_array($rs)) {
        $scode = $r["code"];
        $songTitle = $r["title"];

        // ✅ Fetch album title
        $ru = mysqli_query($conn, "SELECT * FROM album WHERE code='$scode'");
        if ($rn = mysqli_fetch_array($ru)) {
            $albumTitle = $rn["title"];
        }

        // ✅ Audio tag block
        ?>
        <div class="doom5" style="position:absolute">
            <audio id="audio6<?=$x?>" gol="<?=$scode?>" rel="<?=$songTitle?>" pol="<?=$albumTitle?>" class="gana" controls>
                <source src="album/<?=$scode?>/<?=$sn?>.mp3" type="audio/mpeg">
            </audio>
        </div>

           <?php
        $x++;
    }
}
?>