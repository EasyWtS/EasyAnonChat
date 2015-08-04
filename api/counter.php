<?php
error_reporting(E_ALL ^ E_NOTICE);

$dbfile = "../db/online.db";
$expire = 5;
$current_ip = $_SERVER['REMOTE_ADDR'];
$current_time = time();
$db = unserialize(file_get_contents($dbfile));

if (($_POST["action"] == "setOnline") || ($_POST["action"] == "getOnline"))
{
  if ($_POST["action"] == "setOnline")
  {
    if (is_array($db))
    {
      while (list($user_ip, $user_time) = each($db))
      {
        if (($user_ip != $current_ip) && (($user_time + $expire) > $current_time))
        {
          $db_new[$user_ip] = $user_time;
        }
      }
    }

    $db_new[$current_ip] = $current_time;

    $fp = fopen($dbfile, "w");
    fputs($fp, serialize($db_new));
    fclose($fp);

    $online = count($db_new);
  }
  else if ($_POST["action"] == "getOnline")
  {
    $out = count($db);
  }

  echo "{\"response\":" . $online . "}";
}
else
{
  echo "{\"error\":1}";
}
?>
