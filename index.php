<?php
require 'vendor/autoload.php';
require 'DB.php';
print_r(DB:: getInstance()->getTableData(Img));
print_r(DB:: getInstance()->getById('Img', id 1));

$loader = new \Twig\Loader\FilesystemLoader('/path/to/templates');
$twig = new \Twig\Environment($loader);
if(
    isset($_GET['id'])
    && $data = DB::getInstance()->getTableData(DB::TABLE_IMAGES,$_GET['id'])){
    $mode = 'one';
}
else{
    $mode = 'all';
    $data = DB::getInstance()->getTableData(DB::TABLE_IMAGES);
}
echo $twig->render('index.twig', [
    'mode' => 'one',
    'data' => 'data']);

