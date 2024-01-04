@extends('templates.site')
@section('content')


<div class="bg-light p-4 rounded">
    <h2>إدارة الصلاحيات</h2>
    <div class="lead">
        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm my-2" style="float: left">إضافة صلاحية جديدة</a>
    </div>

    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">إسم الصلاحية</th>
            <th scope="col">إسم الروت</th>
            <th scope="col">رابط الروت</th>
            <th scope="col" colspan="3" width="1%">إعدادات</th>
        </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td class="{{str_contains($permission->name_ar,'قائمة') ? ' text-bold text-dark border-0 border-bottom border-dark' : 'mx-5 px-5 text-bold text-dark' }}"><i class="ti ti-plus p-2 text-dark"></i>{{ $permission->name_ar }}</td>
                    <td>{{ $permission->name }}</td>
                    @php
                        try {
                           $link = route($permission->name,15);
                        } catch (\Throwable $th) {
                            $link =  '';
                        }
                    @endphp
                    <td><a href="{{$link}}"><i class="ti ti-link"></i></a></td>
                    <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm"><i class="ti ti-edit"></i></a></td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm','onclick' => "return confirm('هل تريد إزالة هذه الصلاحية من قاعدة البيانات ؟')"]) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
