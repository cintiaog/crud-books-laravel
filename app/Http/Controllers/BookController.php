<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBook;
use App\User;

class BookController extends Controller
{
    private $objUser;
    private $objBook;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objBook = new ModelBook();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $book=$this->objBook->all();
         return view ('index',compact('book'));
        // teste do funcionamento do objeto
        // dd($this->objUser->all());
        // teste do relacionamento das tabelas após a criacao do relacionamento na model
         //dd($this->objBook->find(1)->relUsers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    $users=$this->objUser->all();
    return view('create',compact('users'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
        public function store(Request $request)
{
    $cad=$this->objBook->create([
       'title'=>$request->title,
       'pages'=>$request->pages,
       'price'=>$request->price,
       'id_user'=>$request->id_user
    ]);
    if($cad){
        return redirect('books');
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
        $book=$this->objBook->find($id);
        return view ('show', compact('book'));
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