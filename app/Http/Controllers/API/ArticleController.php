<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Article::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //array of request data
        $data = request()->all();

        //ruleset
        $rules = [
            'title' => 'required',
            'excerpt' => 'required',
            'text' => 'required',
        ];

        //create validation
        $validator = Validator::make($data, $rules);

        //check if validation passes
        if($validator->passes()){

            //if validation passes create article and return json with status 200
            $article = Article::create([
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'text' => $request->text,
                ]);


                return response()->json([
                    "message" => "Successfully created",
                    "article" => $article
                ], 200);
        }else{
            //if validation failed return json with errors and status 422
            return response()->json([
                "error" => $validator->errors()->all()
            ], 422);
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
