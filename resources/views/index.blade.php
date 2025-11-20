<!DOCTYPE html>
<html>
<head>
    <title>Smart Resume Analyzer</title>
</head>
<body>
<h1>Smart Resume Analyzer</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="/upload-resume" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Select Resume (PDF/DOCX)</label>
    <input type="file" name="resume" required>
    <button type="submit">Upload & Analyze</button>
</form>

<h2>Analyzed Resumes</h2>

<table border="1" width="100%">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Skills</th>
    <th>Score</th>
</tr>

@foreach($resumes as $r)
<tr>
    <td>{{ $r->name }}</td>
    <td>{{ $r->email }}</td>
    <td>{{ $r->skills }}</td>
    <td>{{ $r->score }}</td>
</tr>
@endforeach
</table>

</body>
</html>
