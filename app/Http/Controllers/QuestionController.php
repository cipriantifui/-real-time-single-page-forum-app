<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(QuestionResource::collection(Question::latest()->get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(QuestionStoreRequest $request)
    {
        $title = $request->input('title');
        $question = new Question();
        $question->user_id = 1;
        $question->category_id = $request->input('category_id');
        $question->title = $title;
        $question->slug = Str::slug($title);
        $question->body = $request->input('body');
        $question->save();

        return response()->json(QuestionResource::make($question), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Question $question)
    {
        return response()->json(QuestionResource::make($question));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionUpdateRequest $request
     * @param Question $question
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(QuestionUpdateRequest $request, Question $question)
    {
        if($request->has('title')) {
            $question->title = $request->input('title');
            $question->slug = Str::slug($request->input('title'));
        }
        if($request->has('body')) {
            $question->body = $request->input('body');
        }
        $question->save();

        return response()->json(QuestionResource::make($question));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Question  $question
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json(['message' => 'success']);
    }
}
