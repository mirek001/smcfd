<?php
$file=$_POST['file'];
$content=$_POST['content'];




// uchwyt pliku, otwarcie do dopisania 
$fp = fopen($file, "w"); 

// blokada pliku do zapisu 
flock($fp, 2); 

// zapisanie danych do pliku 
fwrite($fp, $content); 

// odblokowanie pliku 
flock($fp, 3); 

// zamknięcie pliku 
fclose($fp);


//system("echo $content > $file");

header("Location: edit.php?file=$file&action=2");
?>