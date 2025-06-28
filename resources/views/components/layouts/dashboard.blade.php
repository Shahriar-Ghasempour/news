<!DOCTYPE html>
<html lang="fa" dir="rtl">
    @include('partials.head')
    <body>
        <x-sidebar>
        </x-sidebar>
        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @endif
        {{ $slot }}
    </body>
</html>
