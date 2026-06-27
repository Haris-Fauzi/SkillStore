<!DOCTYPE html>
<html>
<head>
    <title>{{ $project->title }}</title>
</head>
<body>

    <a href="/projects">← Kembali</a>

    <h1>{{ $project->title }}</h1>

    <p><strong>Deskripsi:</strong></p>
    <p>{{ $project->deskripsi }}</p>

    <hr>

    <p><strong>File:</strong> {{ $project->file_project }}</p>

    <p>
        <strong>Total Download:</strong>
        {{ $project->download_count }}
    </p>

    <p>
        <strong>Total Dilihat:</strong>
        {{ $project->view_count }}
    </p>

    <hr>

    <a href="/projects/{{ $project->id }}/download">
        ⬇ Download Project
    </a>

</body>
</html>