@extends('layouts.master')

@section('content')
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf

        <label for="">Categories_id</label>
        <select name="category_id" id="">
            @foreach ($cate as $id => $name)
                <option value="{{ $id }}">{{ $id }}--{{ $name }}</option>
            @endforeach
        </select>

        <label for="name">Name</label>
        <input type="text" name="name" id="">

        <label for="img">Brand</label>
        <input type="text" name="brand" id="">

        <label for="img">Image</label>
        <input type="file" name="img" id="">

        <label for="describe">Describe</label>
        <textarea name="describe" id="" cols="30" rows="10"></textarea>

        <button>them</button>
        <a href="{{ route('cars.index') }}">back</a>
    </form>
@endsection
