<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        if ($validator->passes()) {

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
        } else {
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
        try {
            $article = Article::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
            'messaage' => 'Not found'
        ], 404);
        }

        return response()->json($article);
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


                //array of request data
        $data = request()->all();

        //ruleset
        $rules = [
                    'title' => 'sometimes|required|string',
                    'excerpt' => 'sometimes|required',
                    'text' => 'sometimes|required',
                ];

        //create validation
        $validator = Validator::make($data, $rules);

        //check if validation passes
        if ($validator->passes()) {

                //check if validation passes


            try {
                $article = Article::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                return response()->json([
                'messaage' => 'Not found'
            ], 404);
            }

            $article->update($request->all());

            return response()->json([
            "message" => "Update successful",
            "article" => $article,
        ], 200);
        } else {
            //if validation failed return json with errors and status 422
            return response()->json([
            "error" => $validator->errors()->all()
        ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);

        return response()->json('Successfully deleted');
    }
}
