<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    const PATH_VIEW = 'cars.';
    const PATH_UPLOAD = 'cars';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Car::query()->with('category')->paginate(5);
        // dd($data);
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $cate = Categories::query()->pluck('name','id');
        return view(self::PATH_VIEW.__FUNCTION__,compact('cate'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('img');

        if($request->has('img')){
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }

        Car::query()->create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $cate = Categories::query()->pluck('name','id');
        return view(self::PATH_VIEW.__FUNCTION__,compact('car','cate'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $data = $request->except('img');
        if($request->hasFile('img')){
            $data['img'] = Storage::put(self::PATH_UPLOAD,$request->file('img'));
        }

        $old = $car->img;

        $car->update($data);

        if($request->hasFile('img') && Storage::exists('img')){
            Storage::delete($old);
        }
            return back();
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        if(Storage::has($car->img)){
            Storage::delete($car->img);
        }

        return back();
    }
}
