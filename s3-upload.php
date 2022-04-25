<?php
	
	require 'vendor/autoload.php';
	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	//  Configuracion de AWS
	$bucketName = 'NOMBRE_BUCKET';
	$IAM_KEY = 'TU_KEY';
	$IAM_SECRET = 'TU_SECRET';

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

	
	//Obtenemos el año actual
	$year = date('Y');
	//Obtenemos el mes actual
	$month = date('m');
	//Obtenemos el carnet del usuario
	$carnet = $_POST['carnet'];
	
	//  config del path
	$keyName = 'Progra3/' . $year .'/'. $month . '/' . $carnet . '/' . basename($_FILES["fileToUpload"]['name']);
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName  . '/' . $keyName;

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


	// Falta agregar prerequisitos para los archivos
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP S3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 	
</head>
<body>

    <div class="row">
        <div class="w-50 mx-auto mt-4">
                <h2 class="text-center alert-primary">Tu archivo se ha subido a S3 AWS.</h2>
            </form>
        </div>
    </div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
