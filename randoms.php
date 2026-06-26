<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "mp3");

// Get client code if logged in
$ccode = null;
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $rsClient = mysqli_query($conn, "SELECT code FROM clients WHERE email='$email'");
    if ($row = mysqli_fetch_assoc($rsClient)) {
        $ccode = $row["code"];
    }
}

$rsp = mysqli_query($conn, "SELECT * FROM category LIMIT 3");

while ($rp = mysqli_fetch_array($rsp)) {
    $catcode = $rp["code"];
?>
    <br>
    <div class="col-12">
        <h3 class="hi"><?= $rp["category"] ?></h3>
    </div>
    <br><br>

    <?php
    $rs = mysqli_query($conn, "SELECT * FROM album WHERE ccode='$catcode' LIMIT 4");
    while ($r = mysqli_fetch_array($rs)) {
        $acode = $r["code"];

        // Default like icon
        $likeIcon = "bi-heart";
        $likeStyle = "";

        // Check if this album is liked by user
        if ($ccode) {
            $check = mysqli_query($conn, "SELECT 1 FROM clalbliked WHERE client='$ccode' AND code='$acode' LIMIT 1");
            if (mysqli_num_rows($check) > 0) {
                $likeIcon = "bi-heart-fill";
                $likeStyle = "style='color:red'";
            }
        }
    ?>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="song-card3">
                <div class="song-card3-img" style="border-radius: 7px;">
                    <img src="album/<?= $acode ?>.jpg" style="border-radius: 7px;" alt="Song cover">
                    <div class="play-overlay">
                        <button class="play-btn" id="<?= $acode ?>">
                            <i class="bi bi-play-fill"></i>
                        </button>
                    </div>
                </div>
                <div class="song-card3-content">
                    <div class="song-card3-meta">
                        <h3 class="song-card3-title"><?= $r["title"] ?></h3>
                        <div class="song-card3-actions">
                            <button class="action-btn">
                                <i onclick="likeAlbum(this)" acode="<?= $acode ?>" class="bi <?= $likeIcon ?>" <?= $likeStyle ?>></i>
                            </button>
                            <button class="action-btn"><i class="bi bi-three-dots-vertical"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}
?>
