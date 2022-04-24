<?php
	
	require 'vendor/autoload.php';
	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	//  Configuracion de AWS
	$bucketName = 'umg-documentos-jorge';
	$IAM_KEY = 'key';
	$IAM_SECRET = 'secret';

	// Nos conectamos a AWS con el sdk
	try {
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-1'
			)
		);
	} catch (Exception $e) {
		// Si no nos conectamos a la instancia, el programa se para.
		die("Error: " . $e->getMessage());
	}

	
	//  config del path
	$keyName = 'Progra3/' . basename($_FILES["fileToUpload"]['name']);
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;

	//  lo subimos a S3
	try {
		// subido
		$file = $_FILES["fileToUpload"]['tmp_name'];

		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);

	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}


	echo 'Se ha subido el archivo ;)';

	// Falta agregar prerequisitos para los archivos
?>
