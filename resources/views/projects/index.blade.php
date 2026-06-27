<!DOCTYPE html>
<html>
<head>
    <title>Katalog Project - SkillStore</title>
</head>
<body>

    <h1>Katalog Project</h1>

    <a href="/">Kembali ke Home</a>

    <hr>

    <form method="GET">

        <input
            type="text"
            name="search"
            placeholder="Cari project..."
            value="{{ request('search') }}"
        >

        <select name="category">
            <option value="">Semua Kategori</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(request('category') == $category->id)
                >
                    {{ $category->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit">
            Filter
        </button>

    </form>

    <hr>


    @foreach($projects as $project)
        <div style="margin-bottom: 15px;">
            <h3>
                <a href="/projects/{{ $project->slug }}">
                    {{ $project->title }}
                </a>
            </h3>

            <p>{{ $project->deskripsi }}</p>

            <p>
                Category:
                {{ $project->category?->nama }}
            </p>

            <p>
                <strong>Total Download:</strong>
                {{ $project->download_count }}
            </p>
            
            <p>
                <strong>Total Dilihat:</strong>
                {{ $project->view_count }}
            </p>
            <p>⬇ {{ $project->download_count }} download</p>
        </div>
    @endforeach

    <div>
        {{ $projects->withQueryString()->links() }}
    </div>

</body>
</html>