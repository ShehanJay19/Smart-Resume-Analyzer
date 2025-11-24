<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Resume Analyzer</title>
</head>
<body>
    <form action="/analyze" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="resume" required>
    <button type="submit">Analyze Resume</button>
</form>

</body>
</html>
