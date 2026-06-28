<!DOCTYPE html>
<html>
<head>
    <title>SkillStore</title>
</head>
<body>

    <h1>SkillStore</h1>

    <p>Tempat publikasi karya siswa.</p>

    <a href="/projects">
        Lihat Project
    </a>

    <hr>

    <h2>⭐ Project Unggulan</h2>

    @forelse($featuredProjects as $project)
        <div>
            <a href="/projects/{{ $project->slug }}">
                {{ $project->title }}
            </a>
        </div>
    @empty
        <p>Belum ada project unggulan.</p>
    @endforelse

    <hr>

    <h2>Project Terbaru</h2>

    @foreach($latestProjects as $project)
        <div>
            <h3>{{ $project->title }}</h3>
            {{-- <p>{{ $project->siswa->nama }}</p> --}}
        </div>
    @endforeach

</body>
</html>