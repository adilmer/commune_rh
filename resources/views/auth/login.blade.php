@extends('templates.vide')

@section('content')
<body class="text-center">
<form class="form-signin" method="POST" action="{{ route('login') }}">
       @csrf
      <img class="mb-4" src="{{asset('assets/images/logo.png')}}" alt="" width="80" height="120">
      <h1 class="h3 mb-3 font-weight-normal">تسجيل الدخول</h1>
      <label for="inputEmail" class="sr-only">بيانات الدخول</label>
      <input id="email" type="email" placeholder="البريد الالكتروني" class="form-control text-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="اسم المستخدم" autofocus>
      @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
      <label for="inputPassword" class="sr-only">الرمز السري</label>
      <input id="password" type="password" class="form-control text-left @error('password') is-invalid @enderror" placeholder="الرمز السري" name="password" required autocomplete="الرمز السري">
      @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
       </span>
      @enderror
      <div class="checkbox mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label class="form-check-label" for="remember">
        {{ __('حفظ الدخول') }}
      </label>
      </div>


      <div class="divlogin">
        <button type="submit" class="btn btn-lg btn-primary btn-block">
            {{ __('دخول') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('نسيت كلمة السر ؟') }}
            </a>
        @endif
    </div>




      <p class="mt-5 mb-3 text-muted">© 2023 بلدية طانطان</p>
    </form>
</body>



@endsection
