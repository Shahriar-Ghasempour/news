<x-layouts.home>
    @foreach ( $posts as $index => $cat )
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">{{ $index }}</h2>
            <div class="row">
                @foreach ( $cat as $post )
                    <x-post-card :post="$post" />
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
</x-layouts.home>
