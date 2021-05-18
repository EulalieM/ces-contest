<?php

$ptr = fopen('.env', 'r');

while(!feof($ptr)) {
    $line = trim(fgets($ptr));
    putenv($line);
} 
fclose($ptr);