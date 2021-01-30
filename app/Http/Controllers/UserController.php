<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //first() devuelve el primer resultado. get() te devuelve una coleccion
        $user = User::where('slug', $slug)->first();
        //comprobamos que el user_id del question coincide con el id del user
        $questions = Question::where('user_id', $user->slug)->get();
        //dd($questions);

        return view('public.questions.profile',
            [
                'user' => $user,
                'questions' => $questions
            ]);


    }


    /**
     * Display the current data about user from session
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editAdmin()
    {
        return view('admin.partials.settings',
            array('user' => Auth::user())
        );
    }

    public function editPublic(){
        return view('public.partials.settings',
            array('user' => Auth::user()));
    }

    /**
     * @param UserFormRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserFormRequest $request, User $user)
    {
        //fill the fields with new data
        $user->fill([
           'name' => $request->input('name'),
           'nick' => $request->input('nick'),
           'age' => $request->input('age'),
           'email' => $request->input('email'),
           'password' => $request->input('password'),
        ]);

        //save changes in the store
        $user->update();

        //redirect to profile
        return redirect('users.profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
