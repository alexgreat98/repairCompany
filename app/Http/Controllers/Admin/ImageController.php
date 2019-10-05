<?php

namespace App\Http\Controllers\Admin;

//use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Отображение всех фото из портфолио. Возвращает массив url-фото. Превью получается путем добавления суффикса
     *  _prev к имени файла. Пример image.jpg и image_prev.jpg
     * Параметр pid=id_портфолио , если не передается возвращается ошибка
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'items' => Image::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'portfolio' => 'required',
            'file.*' => 'required|image|mimes:jpeg,bmp,png'
        ]);
        $portfolio = $request->portfolio;
        foreach ($request->file('file') as $image){
            $filename  = Str::random(). '.' . $image->clientExtension();
            $photo[] = $image->storeAs('/public/p-img', $filename);
            Image::make($image)
                ->fit(100, 100)
                ->save('../storage/app/public/p-img/prev-'.$filename);
            $img = new \App\Image;
            $img->url = $filename;
            $img->portfolio_id = $portfolio;
            $img->save();
        }

        return response()->json($photo);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = \App\Image::findOrFail($id);
        Storage::delete(['app/public/p-img/'.$img, 'app/public/p-img/prev-'.$img]);
        $img->delete();
    }
}
