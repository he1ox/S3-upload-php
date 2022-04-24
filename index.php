<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP File Upload Example - Tutsmake.com</title>
</head>
<body>
    <form action="s3-upload.php" method="post" enctype="multipart/form-data">
        <h2>Subida de archivos S3</h2>
        <label for="file_name">Archivo:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="submit" value="Upload Image">
        <p><strong>PD: Falta probar implementaciones + cambiar UI</p>
    </form>
</body>
</html>
