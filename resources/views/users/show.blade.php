@extends('templates.site')
@section('content')
    <div class="bg-light p-4 rounded col-6 mx-auto">
        <h3>تفاصيل المستخدم </h3>
        <div class="lead">

        </div>

        <div class="container mt-4 fs-4 ">
            <div>
                الإسم: {{ $user->name }}
            </div>
            <div>
                البريد الإلكتروني: {{ $user->email }}
            </div>
            <div>
                إسم المستخدم: {{ $user->username }}
            </div>
            <div>
                الدور:

                @foreach($user->roles as $role)
                    <span class="border">{{ $role->name }}</span> .
                @endforeach
            </div>

        </div>
        <div class="mt-4 mx-auto">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">تعديل</a>
            <a href="{{ route('users.index') }}" class="btn btn-success">عودة</a>
        </div>
    </div>

@endsection
