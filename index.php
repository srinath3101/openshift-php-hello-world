<html>

<head>
<title>SUCCESSFUL TESTING OF SOURCE CODE AND DOCKER IMAGE </title>
</head>

<body>

<?php echo "This is test box - Modifiyed the Index file by DILEEP"; ?>
<?php if($_ENV["HOSTNAME"]) {?><h3>My hostname is <?php echo $_ENV["HOSTNAME"]; ?><br /><br />

<?php $links = [];
  foreach($_ENV as $key => $value) {
    if(preg_match("/^(.*)_PORT_([0-9]*)_(TCP|UDP)$/", $key, $matches)) {
      $links[] = [
        "name"  => $matches[1],
        "port"  => $matches[2],
        "proto" => $matches[3],
        "value" => $value
      ];
    }
  }

  if($links) {
    foreach($links as $link) {
      echo $link["name"]; ?>  listening on port <?php echo $link["port"]."/".$link["proto"]; ?> available at <?php echo $link["value"]; ?><br /><?php
    }
  }

}
?>

</body>
</html>
