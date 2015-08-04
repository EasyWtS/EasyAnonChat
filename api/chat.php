<?php
error_reporting(E_ALL ^ E_NOTICE);

$dbfile = "../db/chat.db";
$maximum_messages = 100;
$maximum_message_length = 250;
$ip_address = $_SERVER["REMOTE_ADDR"];
$name = substr(md5($_SERVER["REMOTE_ADDR"] . "|" . session_id()), 0, 6);

if (($_POST["action"] == "getMessages") || ($_POST["action"] == "getNewMessages") || ($_POST["action"] == "sendMessage"))
{
  session_start();
  $db = unserialize(file_get_contents($dbfile));

  if ($db == false)
  {
    $dbcount = 0;
  }
  else
  {
    $dbcount = count($db);
  }

  if ($_POST["action"] == "getMessages")
  {
    for ($i = 1; $i <= $dbcount; $i++)
    {
      unset($db[$i]["ip_address"]);
    }

    echo json_encode($db);
    $_SESSION["get_time"] = microtime(true);
  }
  else if ($_POST["action"] == "getNewMessages")
  {
    for ($i = 1; $i <= $dbcount; $i++)
    {
      if ($db[$i]["date"] > $_SESSION["get_time"])
      {
        $dbcount_new = $i - 1;
        break;
      }
    }

    if (isset($dbcount_new))
    {
      for ($i = 1; $i <= $dbcount - $dbcount_new; $i++)
      {
        $first_new_message = $i + $dbcount_new;
        $db_new[$i] = array("date" => $db[$first_new_message]["date"], "name" => $db[$first_new_message]["name"], "message" => $db[$first_new_message]["name"]);
      }

      echo json_encode($db_new);
    }

    $_SESSION["get_time"] = microtime(true);
  }
  else if ($_POST["action"] == "sendMessage")
  {
    if ($_POST["message"] == "")
    {
      echo "{\"error\":2}";
    }
    else if (mb_strlen($_POST["message"], "UTF-8") > $maximum_message_length)
    {
      echo "{\"error\":3}";
    }
    else
    {
      if ($dbcount > $maximum_messages - 1)
      {
        for ($i = 1; $i <= $maximum_messages - 1; $i++)
        {
          $db_new[$i] = $db[$dbcount - $maximum_messages + 1 + $i];
        }

        $db = $db_new;
        $dbcount = $maximum_messages - 1;
      }

      $db[$dbcount + 1] = array("date" => microtime(true), "ip_address" => $ip_address, "name" => $name, "message" => $_POST["message"]);

      $fp = fopen($dbfile, "w");
      fputs($fp, serialize($db));
      fclose($fp);

      $post[1] = $db[$dbcount + 1];
      echo json_encode($post);

      $_SESSION["get_time"] = microtime(true);
    }
  }
}
else
{
  echo "{\"error\":1}";
}
?>
