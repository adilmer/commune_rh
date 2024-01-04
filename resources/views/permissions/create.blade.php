@extends('templates.site')
@section('content')
<div class="bg-light p-4 rounded">
    <h2>إضافة صلاحية جديدة</h2>


    <div class="container mt-4">

        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">إسم الصلاحية</label>
                <input value="{{ old('name_ar') }}"
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
                <input value="{{ old('name') }}"
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
                <input value="{{ old('order') }}"
                    type="number"
                    class="form-control"
                    name="order"
                    placeholder="">
            </div>

            <button type="submit" class="btn btn-primary">حفظ الصلاحية </button>
            <a href="{{ route('permissions.index') }}" class="btn btn-success">عودة</a>
        </form>
    </div>

</div>
@endsection
