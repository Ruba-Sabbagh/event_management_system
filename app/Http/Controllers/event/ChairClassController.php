<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\Chairclass;
use Illuminate\Http\Request;

class ChairClassController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
    {
        $chairclass = Chairclass::all();

        return view('pages.chairclasses.index', ['chairclass' => $chairclass]);
    }

    /**
     * Show form for creating chairclass
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.chairclasses.create');
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
            'name' => 'required|unique:chairclass,name',
            'color' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png,bmp'

        ]);
        $imageName = '';
        if($request->file('img')){
            $imageName = '';
            if ($image = $request->file('img')){
                $imageName =  $request->en_name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('images/uploads/chair/', $imageName);
            }
       }
        Chairclass::create([
            'name'=>$request->name,
            'color'=>$request->color,
            'img'=> $imageName,
        ]);

        return redirect()->route('chairclasses.index')
            ->withSuccess(__('Chairclass created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Chairclass  $Chairclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Chairclass $chairclass)
    {
        return view('pages.chairclasses.edit', [
            'chairclass' => $chairclass
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Chairclass  $chairclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chairclass $chairclass)
    {
        $request->validate([
            'name' => 'required|unique:chairclass,name,'.$chairclass->id,
            'color'=> 'required',
            'img'=> 'required|mimes:jpg,jpeg,png,bmp'
        ]);
        $imageName = '';
        if($request->file('img')){
            $imageName = '';
            if ($image = $request->file('img')){
                $imageName =  $request->en_name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('images/uploads/chair/', $imageName);
            }
       }else{
        $imageName = $chairclass->img;
       }

        $chairclass->update([
            'name'=>$request->name,
            'color'=>$request->color,
            'img'=> $imageName,
        ]);

        return redirect()->route('chairclasses.index')
            ->withSuccess(__('Chairclass updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chairclass  $Chairclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chairclass $chairclass)
    {
        $chairclass->delete();

        return redirect()->route('chairclasses.index')
            ->withSuccess(__('Chairclass deleted successfully.'));
    }

}

?>
