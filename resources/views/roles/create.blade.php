@extends('templates.site')
@section('content')
<div class="bg-light p-4 rounded">
    <h3>إضافة دور جديد</h3>


    <div class="container mt-4">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">إسم الدور</label>
                <input value="{{ old('name') }}"
                    type="text"
                    class="form-control"
                    name="name"
                    placeholder="" required>
            </div>

            <label for="permissions" class="form-label">تحديد الصلاحيات</label>

            <table class="table table-striped">
                <thead>
                    <th scope="col" width="1%"><input type="checkbox" id="all_permission"></th>
                    <th scope="col" width="20%">إسم الصلاحية</th>
                    <th scope="col" width="1%">إسم الروت</th>
                </thead>

                @foreach($permissions as $permission)
                    <tr>
                        <td>
                            <input type="checkbox"
                            name="permission[{{ $permission->name }}]"
                            value="{{ $permission->name }}"
                            class='permission'>
                        </td>
                        <td>{{ $permission->name_ar }}</td>
                        <td>{{ $permission->name }}</td>
                    </tr>
                @endforeach
            </table>

            <button type="submit" class="btn btn-primary">حفظ الدور</button>
            <a href="{{ route('users.index') }}" class="btn btn-success">عودة</a>
        </form>
    </div>

</div>
@endsection

@section('script')

        $('#all_permission').on('click', function() {
            if($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked',true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked',false);
                });
            }

        });

@endsection
