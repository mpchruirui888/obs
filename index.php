<?php
namespace test;
/**
 * Created by PhpStorm.
 * User: lrving
 * Date: 2019/9/9
 * Time: 9:55
 */

// 引入依赖库
$Postfix  = substr(strrchr($_FILES['img']['name'], "."), 1);  //获取文件的后缀名
$newFile = time().".".$Postfix;

require 'vendor/autoload.php';
use Obs\ObsClient;
$rui = new ObsClient([
    'key' => 'EDZZUHSB2YG7PNU2NQRN',
    'secret' => 'FL3knol0Oy7jUi89rsDnuhOk5Ww1Br68gOuVCEXJ',
    'endpoint' => 'obs.cn-south-1.myhuaweicloud.com'
]);

$res =  $rui->putObject([
    'Bucket' => 'obs-jkyptest',
    'Key' =>  "images/$newFile",
    'SourceFile' => $_FILES['img']['tmp_name']  // localfile为待上传的本地文件路径，需要指定到具体的文件名
]);

var_dump($res);
$result = $res->toArray();
echo "<br>";
var_dump($result['ObjectURL']);
echo "<br>";
echo json_encode($res->toArray());

//class test{
//    public function a(){
        // 创建ObsClient实例
//        $obsClient = new ObsClient([
//            'key' => 'EDZZUHSB2YG7PNU2NQRN',
//            'secret' => 'FL3knol0Oy7jUi89rsDnuhOk5Ww1Br68gOuVCEXJ',
//            'endpoint' => 'obs.cn-south-1.myhuaweicloud.com'
//        ]);
//        $resp = $obsClient->putObject([
//            'Bucket' => 'obs-jkyptest',
//            'Key' => 'images'+$_FILES['name'],
//            'SourceFile' => $_FILES['tmp_name']  // localfile为待上传的本地文件路径，需要指定到具体的文件名
//        ]);
//        return  $resp;
//    }
//}
//$rui = new test();
//$rui->a();

