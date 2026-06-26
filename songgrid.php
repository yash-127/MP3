<script>
    const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('playlist')) {
          $('.song-space').each(function() {
            $(this).removeClass('song-space').addClass('song-space2');
          });
        }
</script>


<?php
 $conn = mysqli_connect("127.0.0.1", "root", "", "mp3");
if (!isset($_COOKIE["login"])) return;

    $email = $conn->real_escape_string($_COOKIE["login"]);

    

    // ✅ Echo JS alert before the HTML loop to avoid syntax errors
   

    $sql = "
        SELECT clientalb.code AS album_code, clientalb.title AS album_title
        FROM clients
        INNER JOIN clientalb ON clients.code = clientalb.clcode
        WHERE clients.email = '$email'
    ";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $albumCode = htmlspecialchars($row["album_code"]);
        $albumTitle = htmlspecialchars($row["album_title"]);

        // 🔁 Use correct class name based on isPlaylist
       

        echo <<<HTML
        <div class="song-space" id="{$albumCode}">
            <img src="song3.jpg" alt="Song Image" class="song-image">
            <div class="song-info">
                <div class="song-title">{$albumTitle}</div>
            </div>
        </div>
HTML;
    }

?>