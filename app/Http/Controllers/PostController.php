<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Storage;

class PostController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $item = new Post();
        return view('posts.edit', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $data = $request->only(['name', 'content', 'category_id']);

        $path = 'storage/' . Storage::disk('public')->putFile('posts', $request->file('file'));;
        $data['file'] = $path;

        $item = (new Post())->create($data);

        if ($item) {
            return redirect()
                ->route('post.edit', [$item->id])
                ->with(['success' => 'Success saving']);
        } else {
            return back()
                ->withErrors(['msg' => 'Error saving'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $item = $post;

        return view('posts.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->only(['name','content','category_id']);

       if ($request->file){
//           dd();
           $fileForDeleting = str_replace('storage/','',$post->file);
           Storage::disk('public')->delete($fileForDeleting);

           $path = 'storage/' . Storage::disk('public')->putFile('posts', $request->file('file'));;
           $data['file'] = $path;
       }


        $result = $post->update($data);

        if ($result) {
            return redirect()
                ->route('post.edit', $post->id)
                ->with(['success' => 'Success saving']);
        } else {
            return back()
                ->withErrors(['msg' => 'Error saving'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {

        $fileForDeleting = str_replace('storage/','',$post->file);
        Storage::disk('public')->delete($fileForDeleting);

        $delete = $post->delete();
        if ($delete){
            return redirect()
                ->route('welcome')
                ->with(['success' => 'Success deleting post']);
        }else{
            return redirect()
                ->route('welcome')
                ->withErrors(['msg' => 'Error deleting post']);
        }

    }
}
