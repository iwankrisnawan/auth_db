<?php
  $conn = new mysqli('localhost', '3_admin_jancok', '123456', '3_database_pinjaman_barang');

  if($conn){
    echo "berhasil";
  }else{
    echo "gagal";
  }
  // $db_user = 'maman';
  // $dbName = 'mamangabus';
  // $privilege_passwd = 'maman';

  // $data_array = ['aaa'=>'makus','ddd'=>'john','ccc'=>'asasas'];
  // print_r($data_array);
  // print_r(array_keys($data_array));
  // $sql = "CREATE USER '".$db_user."'@'localhost' IDENTIFIED BY '" . $privilege_passwd . "' ";
  // $result = $conn->query($sql);
  //
  // if ($result) {
  //   $sql3 = "ALTER USER '".$db_user."'@'localhost' WITH MAX_QUERIES_PER_HOUR 100";
  //   $result3 = $conn->query($sql3);
  //   echo $sql3;
  //   if (!$result3) {
  //     echo "gagal 2";
  //   }
  // }

  // $sql = "ALTER USER 'maman'@'localhost' WITH MAX_QUERIES_PER_HOUR 100";
  // $sql3 = "GRANT USAGE ON *.* TO 'kadekiwan'@'localhost'
  // WITH MAX_QUERIES_PER_HOUR 50
  // MAX_UPDATES_PER_HOUR 10
  // MAX_CONNECTIONS_PER_HOUR 5
  // MAX_USER_CONNECTIONS 2";
  //
  // $result3 = $conn->query($sql3);
  // if ($result3) {
  //   echo "berhasil";
  // }
  // if($result){
  //   // $sql2 = "GRANT SELECT , INSERT , UPDATE , DELETE ON " . $dbName . " . * TO '" . $db_user . "'@'localhost' IDENTIFIED BY '" . $privilege_passwd . "'";
  //   // $result2 = $conn->query($sql2);
  //   //
  //   // if (!$result2) {
  //   //   echo '<br>';
  //   //   echo 'gagal';
  //   // }
  //   $sql3 = "ALTER USER '".$db_user."'@'localhost' WITH MAX_QUERIES_PER_HOUR 500 MAX_UPDATES_PER_HOUR 100";
  //   echo $sql3;
  //   $result3 = $conn->query($sql3);
  //   if (!$result3) {
  //     echo "gagal 2";
  //   }
  // }
  // else{
  //   echo "gagal";
  // }

?>
