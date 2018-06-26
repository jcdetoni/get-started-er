<?php
echo '<pre>';
$content = file_get_contents("access-5000.log");

//Filtre os acessoes ao servidor pelo ip 10.0.2.2 no dia 22 e 23 das 08:00 até as 11:59 somente oque for método POST
$regex = '/[\n \t]*10.0.2.2 - - \[(2[2-3]\/Jun\/2018:(0[89]|1[01]):[0-5][0-9]:[0-5][0-9]) -0300\] "(POST) (.*)/';
preg_match_all($regex ,$content, $matches);
//print_r($matches);
foreach ($matches[1] as $key => $match) {
    echo "Acesso as {$match}  Method: {$matches[3][$key]} Target: {$matches[4][$key]} " . PHP_EOL ;
}
//echo $content;