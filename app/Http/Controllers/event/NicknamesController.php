<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\Nickname;
use Illuminate\Http\Request;

class NicknamesController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $nicknames = Nickname::latest()->paginate(5);

      return view('pages.nicknames.index', compact('nicknames'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('nicknames.create');
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
      Nickname::create(array_merge($request->only('name', 'lang')));

      return redirect()->route('nicknames.index')
          ->withSuccess(__('Nickname created successfully.'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Nickname  $Nickname
   * @return \Illuminate\Http\Response
   */
  public function show(Nickname $Nickname)
  {
      return view('nicknames.show', [
          'Nickname' => $Nickname
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Nickname  $Nickname
   * @return \Illuminate\Http\Response
   */
  public function edit(Nickname $Nickname)
  {
      return view('nicknames.edit', [
          'Nickname' => $Nickname
      ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Nickname  $Nickname
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Nickname $Nickname)
  {
    $request->validate([
        'name' => 'required|unique:nicknames,name',
        'lang' => 'required'

    ]);
      $Nickname->update($request->only('name', 'lang'));

      return redirect()->route('nicknames.index')
          ->withSuccess(__('Nickname updated successfully.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Nickname  $Nickname
   * @return \Illuminate\Http\Response
   */
  public function destroy(Nickname $Nickname)
  {
      $Nickname->delete();

      return redirect()->route('nicknames.index')
          ->withSuccess(__('Nickname deleted successfully.'));
  }
}

?>
