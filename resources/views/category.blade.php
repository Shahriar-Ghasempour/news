<x-layouts.home title="home">
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-5">{{ $name }}</h2>
      <div class="row">
        @if(count($posts) > 0)
          @foreach($posts as $post)
            <x-post-card :post="$post" />
          @endforeach
        @else
          <div class="col-12 text-center">
            <p>هنوز خبری برای این بخش ثبت نشده.</p>
          </div>
        @endif
      </div>
    </div>
  </section>
</x-layouts.home>