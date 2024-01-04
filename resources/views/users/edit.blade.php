@extends('templates.site')
@section('content')
    <div class="bg-light p-4 rounded">
        <h3>تعديل المستخدم</h3>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">الإسم</label>
                    <input value="{{ $user->name }}"
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
                    <input value="{{ $user->email }}"
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
                    <input value="{{ $user->username }}"
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">إعادة تعيين كلمة السر </label>
                    <input value="{{ old('password') }}"
                        type="text"
                        class="form-control"
                        name="password"
                        placeholder="فارغة تعني بدون تغيير
                        " >
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">الدور</label>
                    <select class="form-control"
                        name="role" required>
                        <option value="">إختيار الدور ...</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ in_array($role->name, $userRole)
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">تأكيد التعديلات</button>
                <a href="{{ route('users.index') }}" class="btn btn-success">عودة</a>
            </form>
        </div>

    </div>
@endsection
