@extends('templates.site')
@section('content')
    <div class="bg-light p-4 rounded">
        <h3>تفاصيل الدور : </h3>
        <div class="lead">

        </div>

        <div class="container mt-4">

            <h5>إسم الدور : {{ ucfirst($role->name) }} </h5>

            <table class="table table-striped">
                <thead>
                    <th scope="col" width="20%">لائحة الصلاحيات</th>
                    <th scope="col" width="20%"> إسم الروت</th>

                </thead>

                @foreach($rolePermissions as $permission)
                    <tr>
                        <td>{{ $permission->name_ar }}</td>
                        <td>{{ $permission->name }}</td>

                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">تعديل</a>
        <a href="{{ route('roles.index') }}" class="btn btn-success">عودة</a>
    </div>
@endsection
