@extends('layouts.master')

@section('content')
<a href="{{ route('cars.create') }}">ADD</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cate</th>
                <th>name</th>
                <th>img</th>
                <th>brand</th>
                <th>des</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)


            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category->id .'-'.$item->category->name }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <img src="{{ Storage::url($item->img) }}" width="50px" alt="">
                </td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->describe }}</td>
                <td>
                    <form action="{{ route('cars.destroy', $item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <button>delete</button>
                        <a href="{{ route('cars.edit',$item->id) }}">ADD</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
