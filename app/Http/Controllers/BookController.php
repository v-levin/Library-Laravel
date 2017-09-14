<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Book;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $username = Input::get('username');
        $password = Input::get('password');

        $books = array('books' => DB::table('books')->get());

        $rules = array(
            'username' => 'required',
            'password' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            return Redirect::to('/')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }

        if (Auth::attempt(array('username' => $username, 'password' => $password))) {

            return view('home', $books);
        }
        else {

            $msgPass = array(
                'wrongPass'  => 'Wrong Password!!'
            );

            return Redirect::to('/')
                ->withErrors($msgPass)
                ->withInput(Input::except('password'));
        }

    }

    public function _index()
    {
        $books = array('books' => DB::table('books')->get());
        return view('_home', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'ISBN_10' => 'required|numeric|digits_between:1,10',
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'cover' => 'required|image',
        );

        $msg = array(
            'numeric'  => 'The ISBN must be a number.'
        );

        $validator = Validator::make(Input::all(), $rules, $msg);

        if ($validator->fails()) {
            return Redirect::to('create')
                ->withErrors($validator)
                ->withInput();

        } else {

                $file = $request->file('cover');
                $destinationPath = public_path().'/public/img/';
                $filename = str_random(6).'_'.$file->getClientOriginalName();
                $uploadSuccess = $file->move($destinationPath, $filename);

                $book = new Book;

                $book->ISBN_10 = Input::get('ISBN_10');
                $book->title = Input::get('title');
                $book->author = Input::get('author');
                $book->genre = Input::get('genre');
                $book->cover = $filename;

                $book->save();

                return Redirect::to('_home');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('edit', compact('book'));
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

        $rules = array(
            'ISBN_10' => 'required|numeric|digits_between:1,10',
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
        );

        $msg = array(
            'numeric'  => 'The ISBN must be a number.'
        );

        $validator = Validator::make(Input::all(), $rules, $msg);

        if ($validator->fails()) {
            return Redirect::to('edit/' . $id)
                ->withErrors($validator)
                ->withInput();

        } else {

            $bookUpdate = $request->all();
            $book = Book::find($id);
            $book->update($bookUpdate);
            return Redirect::to('_home');
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
        Book::find($id)->delete();
        return redirect('_home');
    }
}
