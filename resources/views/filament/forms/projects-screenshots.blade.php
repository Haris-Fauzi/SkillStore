<div class="grid grid-cols-2 md:grid-cols-3 gap-4">

    @foreach($getRecord()?->screenshots ?? [] as $shot)

        <img
            src="{{ asset('storage/'.$shot->image) }}"
            class="rounded-xl border shadow">

    @endforeach

</div>