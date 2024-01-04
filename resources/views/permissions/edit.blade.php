@extends('templates.site')
@section('content')
<div class="bg-light p-4 rounded">
    <h3>تعديل الصلاحية </h3>


    <div class="container mt-4">

        <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="name_ar" class="form-label">إسم الصلاحية</label>
                <input value="{{ $permission->name_ar }}"
                    type="text"
                    class="form-control"
                    name="name_ar"
                    placeholder="" required>

                @if ($errors->has('name_ar'))
                    <span class="text-danger text-left">{{ $errors->first('name_ar') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">إسم الروت</label>
                <input value="{{ $permission->name }}"
                    type="text"
                    class="form-control"
                    name="name"
                    placeholder="" required>

                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">الرقم الترتيبي</label>
                <input value="{{ $permission->order }}"
                    type="number"
                    class="form-control"
                    name="order"
                    placeholder="">
            </div>

            <button type="submit" class="btn btn-primary"> حفظ التعديلات</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-success">عودة</a>
        </form>
    </div>

</div>
@endsection
