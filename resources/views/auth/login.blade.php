<x-layouts.home>
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">ورود</div>
              <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                      @csrf

                      <div class="mb-3">
                          <label for="email" class="form-label">ایمیل</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="password" class="form-label">رمز عبور</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="mb-3 form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label class="form-check-label" for="remember">فراموش نکن</label>
                      </div>

                      <button type="submit" class="btn btn-primary">ورود</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-layouts.home>