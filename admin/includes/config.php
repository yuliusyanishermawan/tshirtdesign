<?php
$Host="localhost";
$User="root";
$Pass="";
$Db="dopewild";
$koneksidb = mysqli_connect( $Host, $User, $Pass, $Db);
if (! $koneksidb) {
  echo "Failed Connection !";
}
