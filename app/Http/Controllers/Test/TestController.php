<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use Input;
use File;
use Redirect;
use Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roles()->first()->role == 'SUPER_ADMIN')
        {
         
         $tests = Test::orderBy('id', 'asc')->get();
        
        } else {
        
         $tests = Test::where('user_id', auth()->user()->id)->get();
        
        }
        
        return view('test.index')
            ->with(compact(
                'tests'

            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Input::file('photo'))
        {
            $photo = Input::file('photo');
            $extension = $photo->getClientOriginalExtension();

            if ($extension != 'jpg' && $extension != 'png')
            {
                return redirect()->back()->with('error', 'Erro: Este arquivo não é imagem');
            }
        }

        $test = new Test();

        $test->user_id = auth()->user()->id;
        $test->problem = $request->problem;
        $test->photo   =  "";

        $test->save();

        if (Input::file('photo'))
        {
            File::move($photo,public_path().'/photos/test-id_'.$test->id.'.'.$extension);
            $test->photo = '/photos/test-id_'.$test->id.'.'.$extension;
            
            $test->save();
        }

        return redirect()
            ->route('testes.index')
            ->with(['success' => 'Teste cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::findOrFail($id);
        return view('test.show')->with(compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        
        return view('test.edit',compact('test'));
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
        $test = Test::findOrFail($id);
            
        $test->user_id = auth()->user()->id;
        $test->problem = $request->problem;
        
        $test->save();
        
        return redirect()
            ->route('testes.index')
            ->with(['success' => 'Teste alterada com sucesso!']);
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
