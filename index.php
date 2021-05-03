<?php

if ($_FILES) {
    $fileName = $_FILES['zip']['tmp_name'];
    $name = $_FILES['zip']['name'];
    $zip = new ZipArchive();
    if ($zip->open($fileName)) {
        echo "<h3> Nama: " . $name . "<h3>";
        echo '<h4>File size: ' . filesize($fileName) . '</h4>';
        echo '<h4>Total files: ' . $zip->numFiles . '</h4>';
        echo "<h4>Isi Dalam File: </h4>";
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            echo basename($stat['name']) . "<br>";
        }
        $zip->close();
    } 
}
?>
<form method='post' action='' enctype='multipart/form-data'>
 <input type='file' name='zip' value='pilih file'><br/>
 <input type='submit' name='upload' value='upload' />
</form>

<form method='post' action='aksi' id='forms' >
 <input type='hidden' name='name' value='<?phpecho basename($stat['name']);?>'>
 <input type='submit' name='aksi' value='SAVE TO SQLite' />
</form>
<?php

?>

<?php
class AsyncOperation extends Thread {

    public function __construct($arg) {
        $this->arg = $arg;
    }

    public function run() {
        if ($this->arg) {
            $sleep = mt_rand(1, 10);
            printf('%s: %s  -start -sleeps %d' . "\n", date("g:i:sa"), $this->arg, $sleep);
            sleep($sleep);
            printf('%s: %s  -finish' . "\n", date("g:i:sa"), $this->arg);
        }
    }
}

// Create a array
$stack = array();

//Initiate Multiple Thread
foreach ( range($fileName) as $i ) {
    $stack[] = new AsyncOperation($i);
}

// Start The Threads
foreach ( $stack as $t ) {
    $t->start();
}

?>