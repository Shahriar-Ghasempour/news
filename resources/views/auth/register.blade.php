<x-layouts.home>
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">عضویت</div>
              <div class="card-body">
                  <form method="POST" action="{{ route('register') }}">
                      @csrf

                      <div class="mb-3">
                          <label for="name" class="form-label">نام</label>
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="email" class="form-label">ایمیل</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="password" class="form-label">رمز عبور</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="password-confirm" class="form-label">تایید رمز عبور</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>

                      <button type="submit" class="btn btn-primary">ثبت نام</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-layouts.home>