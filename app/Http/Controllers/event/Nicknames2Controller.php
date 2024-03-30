<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\Nicknames2;
use Illuminate\Http\Request;

class Nicknames2Controller extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $nicknames = Nicknames2::latest()->paginate(5);

      return view('pages.nicknames2.index', compact('nicknames'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('nicknames2.create');
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
        'name' => 'required|unique:nicknames,name',
        'lang' => 'required'

    ]);
      Nicknames2::create(array_merge($request->only('name', 'lang')));

      return redirect()->route('nicknames2.index')
          ->withSuccess(__('Nickname2 created successfully.'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Nickname2  $Nickname2
   * @return \Illuminate\Http\Response
   */
  public function show(Nicknames2 $Nickname2)
  {
      return view('nicknames2.show', [
          'Nickname2' => $Nickname2
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Nickname2  $Nickname2
   * @return \Illuminate\Http\Response
   */
  public function edit(Nicknames2 $Nickname2)
  {
      return view('nicknames2.edit', [
          'Nickname2' => $Nickname2
      ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Nickname2  $Nickname2
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Nicknames2 $Nickname2)
  {
    $request->validate([
        'name' => 'required|unique:nicknames,name',
        'lang' => 'required'

    ]);
      $Nickname2->update($request->only('name', 'lang'));

      return redirect()->route('nicknames2.index')
          ->withSuccess(__('Nickname2 updated successfully.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Nickname2  $Nickname2
   * @return \Illuminate\Http\Response
   */
  public function destroy(Nicknames2 $Nickname2)
  {
      $Nickname2->delete();

      return redirect()->route('nicknames2.index')
          ->withSuccess(__('Nickname2 deleted successfully.'));
  }
}

?>

