<?php
$filename = '/var/www/public_html/resourcespace/filestore/test.txt';
echo "testing read write access in file $filename<br />";
echo "testing is_writable: ";
echo is_writable($filename) ? 'yes' : 'no';
echo "<br />";
echo 'testing is_readable ';
echo is_readable($filename) ? 'yes' : 'no';
echo "<br />end of test<br /><br />";
