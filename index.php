<?php
if ($_FILES) {
    $fileName = $_FILES['zip']['tmp_name'];
    $name = $_FILES['zip']['name'];
    $zip = new ZipArchive();
    if ($zip->open($fileName)) {
        echo "<h3> Name: " . $name . "<h3>";
        echo '<h4>File size: ' . filesize($fileName) . '</h4>';
        echo '<h4>Total files: ' . $zip->numFiles . '</h4>';
        echo "<h4>File Contents: </h4>";
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            echo basename($stat['name']) . "<br>";
        }
        $zip->close();
    }

}

?>
<form method='post' action='' enctype='multipart/form-data'>
 <input type='file' name='zip'><br/>
 <input type='submit' name='upload' value='upload' />
</form>