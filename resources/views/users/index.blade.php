@extends('templates.site')
@section('content')



    <div class="bg-light p-4 rounded">
        <h3>إدارة المستخدمين</h3>
        <div class="lead">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm  " style="float: left">إضافة مستخدم جديد</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped text-center">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">الإسم</th>
                <th scope="col">البريد الإلكتروني</th>
                <th scope="col" width="10%">إسم المستخدم</th>
                <th scope="col" width="10%">الدور</th>
                <th scope="col" width="1%" colspan="3">إعدادات</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge bg-dark">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i class="ti ti-eye"></i></a></td>
                        <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="ti ti-edit"></i></a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm','onclick' => "return confirm('هل تريد إزالة هذا المستخدم من قاعدة البيانات ؟')"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $users->links() !!}
        </div>

    </div>
@endsection
