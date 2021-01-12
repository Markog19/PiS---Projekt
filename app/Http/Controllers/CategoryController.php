<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\User;
use Auth;
use Gate;

use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('name', 'asc');
        return view('home')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|mimes:jpeg,png,jpg,bmp|max:5048',
        ]);


        // Get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $image = $request->file('cover_image'); //sada

        $file = $request->file('cover_image');

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $imageName = time().time().'.'.$image->getClientOriginalExtension(); // sada

        // Get just the extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        // Create new filenameToStore
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        Storage::disk('public')->putFileAs(
            'uploads/categories_photos/',
            $image,
            $filenameToStore
        );

        // Create album
        $category = new Category;
        $category->user_id =  Auth::user()->id;
        $category->name = $request->input('name');
        $category->cover_image = $filenameToStore;
        // $album->cover_image = $filename;;


        // $album->save();


        if($category->save()){
            $request->session()->flash('success', "Kategorija " . $category->name . ' je uspještno kreirana');
            return redirect('home');
        }
        if($category->save() == 0){
           $request->session()->flash('error', 'Došlo je do pogreške tokom kreiranja kategorije!');
        }


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
    public function edit($category_id)
    {

        $category=Category::find($category_id);
        return view('admin.categories.edit')->with('category', $category);


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

        if(Gate::allows('delete-users')){

            $this->validate($request, array(
                'name' => 'required',

            ));

            $category = Category::find($id);
            $category->name = $request->name;

            if ($request->hasFile('cover_image')) {

                $cover_image = $request->file('cover_image');
                $filename = time() . '.'.$cover_image->getClientOriginalExtension();

                Storage::disk('public')->putFileAs(
                    'uploads/categories_photos/',
                    $cover_image,
                    $filename
                );

                // Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatar/'. $filename));


                $category->cover_image = $filename;
            }

            if($category->save()){
                $request->session()->flash('success', 'Uspješno ste uredili kategoriju ' . $category->name);
            }else{
                $request->session()->flash('error', 'Nastala je greška prilikom uređivanja kategorije!');
            }

            // return redirect()->route('category.index', $category);

            return redirect('home');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            $path = storage_path().'/app/public/uploads/categories_photos/'.$category->cover_image;
            unlink($path);
            session()->flash('success', "Kategorija " . $category->name . ' je uspješno izbrisana');

        }else{
            session()->flash('error', 'Došlo je do greške prilikom brisanja kategorije - ' . $category->name . '!');
        }

        if(Gate::denies('delete-users')){
            return redirect()->route('home');
        }

        return redirect()->route('home');
    }
}
