<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;


class ClassesController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
   public function index()
    {
        $classes = Classes::paginate(5);

        return view('pages.classes.index', ['classes' => $classes]);
    }

    /**
     * Show form for creating classes
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes,name',
            'color' => 'required',
            'lang' => 'required'

        ]);

        Classes::create([
            'name'=>$request->name,
            'color'=>$request->color,
            'lang'=> $request->lang,
        ]);

        return redirect()->route('classes.index')
            ->withSuccess(__('Classes created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Classes  $Classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        return view('pages.classes.edit', [
            'class' => $class
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Classes  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name' => 'required|unique:classes,name,'.$class->id,
            'color'=> 'required',
            'lang'=> 'required'
        ]);

        $class->update([
            'name'=>$request->name,
            'color'=>$request->color,
            'lang'=> $request->lang,
        ]);

        return redirect()->route('classes.index')
            ->withSuccess(__('Classes updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $Classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        $classes->delete();

        return redirect()->route('classes.index')
            ->withSuccess(__('Classes deleted successfully.'));
    }

}

?>
