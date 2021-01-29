<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Document;
use App\Category;
use App\User;
use Auth;
use Gate;
use DB;


class MyDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id, Request $request)
    {
        $user = User::find($user_id);
        $categories = Category::all();


        $files = Document::latest()->where([

            ['doc_name', '!=', Null],
            [function ($query) use ($request){
                if (($term = $request->term)) {
                    $query->orWhere('doc_name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])->orderBy("doc_name", "asc")->paginate(5);


       // $files = Document::where('user_id', '=', $request->id)->get();

        return view('my_doc.show')->with('user', $user)->with('files', $files)->with('categories', $categories)->with('i', (request()->input('page', 1)-1)*5);

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
        //
    }
}
