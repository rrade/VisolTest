<?php
if (isset($_POST['submit']) && !empty($_POST['submit'])){

$ime=$_POST['ime'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$prioritet=$_POST['prioritet'];
$datum=$_POST['datum'];
$attachment=$_FILES['attachment'];

// print_r(dirname($attachment['name']));
// die();

$username = 'testuser';
$password = 'Test123';

$url = "https://visoldev.ddns.net:8888/rest/api/latest/issue/";

//"self" => "xxxx",
//"id" => "xxxx",
//"iconUrl" => "xxxxx",
//"subtask" => false
$data = array(

'fields' => array(

'project' => array(

'key' => 'TEST',

),

'summary' => $ime,

'description' => $email."; ".$tel,
"issuetype" => array(

    "name" => "Task",
    "description" => "A task that needs to be done.",

),
"priority" => array(
  "name"=> $prioritet
),
"duedate" => $datum,
"assignee" => array(
  "name"=> 'testuser'
),
),

);

$ch = curl_init();

$headers = array(

    'Accept: application/json',

    'Content-Type: application/json'

);




curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_VERBOSE, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");



$result = curl_exec($ch);

$ch_error = curl_error($ch);



if ($ch_error) {

    echo "cURL Error: $ch_error";

} else {
    $decodedResult = json_decode($result);

    if(!empty($attachment)){

      $attachment_tmp = $attachment['tmp_name'];
      $attachment_name = $attachment["name"];
      $path_move = __DIR__ . "/" . $attachment_name;
      move_uploaded_file($attachment_tmp, $path_move);


      $data = array(
        'file' => curl_file_create($path_move)
        );
      $ch = curl_init();
      curl_setopt_array($ch, array(
        CURLOPT_POST => 1,
        CURLOPT_URL => $url . $decodedResult->key . '/attachments',
        CURLOPT_USERPWD => $username . ':' . $password,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_VERBOSE => 0,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('X-Atlassian-Token: nocheck')
    ));
    $result = curl_exec($ch);
    unlink($path_move);
    echo $decodedResult->key;
    }

    else {
      echo $decodedResult->key;
    }

}



curl_close($ch);


}
?>
