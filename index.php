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
            <form action="s3-upload.php" method="post" enctype="multipart/form-data">
                <h2 class="text-center">SUBE TUS ARCHIVOS A S3</h2>
                <div class="mb-3">
                    <label for="carnet_text" class="form-label">Carnet</label>
                    <input type="text" class="form-control" id="carnet" name="carnet"/>
                    <div id="carnetAyuda" class="form-text">Ingresa tu carnet de la Universidad Ej. 0905-20-xxx</div>
                </div>


                <div class="mb-3">
                    <label for="file_name">Selecciona un archivo <strong>.CSV</strong></label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                    <div id="carnetAyuda" class="form-text">Solamente archivos .CSV de máx. 5MB aceptados</div>
                </div>
                
                <input type="submit" name="submit" value="Subir a S3" class="btn btn-primary d-block mt-4">
            </form>
        </div>
    </div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

