@extends('layouts.master')

@section('content')
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="row">
    @csrf
    @method('PUT')
        <label for="">Categories_id</label>
        <select name="category_id" id="">
            @foreach ($cate as $id => $name)
                <option value="{{ $id }}">{{ $id }}--{{ $name }}</option>
            @endforeach
        </select>

        <label for="name">Name</label>
        <input type="text" name="name" id="" value="{{ $car->name }}">

        <label for="img">Brand</label>
        <input type="text" name="brand" id="" value="{{ $car->brand }}">

        <label for="img">Image</label>
        <input type="file" name="img" id="">
        <img src="{{ Storage::url($car->img) }}" style="width: 50px" alt="">

        <label for="describe">Describe</label>
        <textarea name="describe" id="" cols="30" rows="10">{{ $car->describe }}</textarea>

        <button>them</button>
        <a href="{{ route('cars.index') }}">back</a>
    </form>
@endsection
