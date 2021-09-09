<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $photos = $category->photos;
        return view('admin.photo.index')
            ->with(compact('photos'))
            ->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('admin.photo.edit')
            ->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $storeData = $request->validate([
            'path_photo' => 'required|max:100',            
        ]);
        $storeData['category_id'] = $category->id;
        $photo = Photo::create($storeData);

        return redirect()->action([PhotoController::class, 'index'],['category' => $category]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Photo $photo)
    {
        return view('admin.photo.edit')
            ->with(compact('category'))
            ->with(compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Photo $photo)
    {
        log::alert($request->all());
        $photo->update($request->all());
                
        

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Photo $photo)
    {
        log::alert(get_class($photo));
        $photo->delete();

        return back();
    }
}
