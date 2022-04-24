<?php
// Bucket Name
$bucket="umg-documentos-jorge";
require_once('S3.php');
//AWS config
$awsAccessKey = 'AWS-KEY';
$awsSecretKey = 'AWS-SECRET';
//inicializamos la clase
$s3 = new S3($awsAccessKey, $awsSecretKey);
$s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
?>
