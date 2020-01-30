<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = Relation::getMorphedModel(
            request()->route()->parameter('model')
        );
        if ($this->model === null) {
            return response()->json(['message' => 'Sorry, but something go wrong! Not Found!'], 404);
        }
    }

    public function show($model, $id)
    {
//        Category::query()->where('id',1)->first()->comments()->create(['author'=>'My','content'=>'content']);
        $comments = Comment::query()->select(['id','author','content'])->whereHasMorph('commentable', [$this->model], function ($q) use ($id) {
            $q->where('id', $id)->orderBy('created_at','desc');
        })->toBase()->get();
        if (!request()->ajax()) {
//            abort(404); TODO remove after typing code
        }

        return response()->json(compact('comments'),200);

    }

    public function store(Request $request,$model)
    {
        if (!request()->ajax()) {
//            abort(404); TODO remove after typing code
        }
        $data = $request->only(['content','commentable_id']);
        $data['author'] = $request->get('name') . ' ' . $request->get('surname');
        $data['commentable_type'] = $model;
        $item = Comment::query()->create($data);

        if ($item) {
            return response()->json(['success' => 'Success saving!','comment' => $item],201);
        } else {
            return response()->json(['error' => 'Something gone wrong!'],500);
        }
    }
}
