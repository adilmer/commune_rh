@extends('templates.site')
@section('content')
    <div class="bg-light p-4 rounded">
        <h3>إضافة مستخدم جديد</h3>


        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">الإسم</label>
                    <input value="{{ old('name') }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input value="{{ old('email') }}"
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">إسم المستخدم</label>
                    <input value="{{ old('username') }}"
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">كلمة السر</label>
                    <input value="{{ old('password') }}"
                        type="text"
                        class="form-control"
                        name="password"
                        placeholder="" required>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">حفظ المستخدم</button>
                <a href="{{ route('users.index') }}" class="btn btn-success">عودة</a>
            </form>
        </div>

    </div>
@endsection
