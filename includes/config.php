<?php

$ptr = fopen('.env', 'r');

while(!feof($ptr)) {
    $line = fgets($ptr);
    putenv($line);
} 
fclose($ptr);