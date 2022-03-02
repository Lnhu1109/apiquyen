<?php
function getRandomFromArray($ar) {
mt_srand( (double)microtime() * 1000000 );
$num = array_rand($ar);
return $ar[$num];
}

function getImagesFromDir($path) {
$images = array();
if ( $img_dir = @opendir($path) ) {
while ( false !== ($img_file = readdir($img_dir)) ) {
// checks for gif, jpg, png
if ( preg_match("/(\.gif|\.jpg|\.mp4|\.png|\.jpeg)$/", $img_file) ) {
$images[] = $img_file;
}
}
closedir($img_dir);
}
return $images;
}

$root = '';
$path = 'api/spar/';
$imgList = getImagesFromDir($root . $path);
$img = getRandomFromArray($imgList);
?>
<?php
$pipi = array(
"data" => "https://imgapicongquyen.herokuapp.com/api/spar/".$img,
"author" => "Lê Công Quyền",
);
$json = json_encode($pipi, JSON_UNESCAPED_UNICODE);
print($json);
?>
