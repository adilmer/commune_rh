@extends('templates.site')
@section('content')



    <div class="bg-light p-4 rounded">
        <h3 class="mb-3">إدارة الأدوار</h3>
        <div class="lead">
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm my-2" style="float: left">إضافة دور جديد </a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered text-center">
          <tr>
             <th width="1%">#</th>
             <th>إسم الدور</th>
             <th width="3%" colspan="3">إعدادات</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}"><i class="ti ti-eye"></i></a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}"><i class="ti ti-edit"></i></a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm','onclick' => "return confirm('هل تريد إزالة هذا الدور من قاعدة البيانات ؟')"]) !!}
                    {!! Form::close() !!}
                </td>


            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection
