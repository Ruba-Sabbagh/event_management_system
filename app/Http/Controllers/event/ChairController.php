<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\Chair;
use App\Models\Chairclass;
use App\Models\EventPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChairController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $chairs = Chair::paginate('10');
      $event_places=EventPlace::all();
      $chairclasses=Chairclass::all();
      $firstcode=['A','B','C','D','E','F','G','H','I','J','K','L','N','M','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
      return view('pages.chairs.index', ['chairs' => $chairs,'event_places'=>$event_places,'chairclasses'=>$chairclasses,'firstcode'=> $firstcode]);
  }

  /**
   * Show form for creating chairs
   *
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
{
    $search = $request->input('search');
    $chairs = Chair::where('event_place', '=', $search)->paginate('10');
    $event_places=EventPlace::all();
      $chairclasses=Chairclass::all();
      $firstcode=['A','B','C','D','E','F','G','H','I','J','K','L','N','M','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    return view('pages.chairs.index', ['chairs' => $chairs,'event_places'=>$event_places,'chairclasses'=>$chairclasses,'firstcode'=> $firstcode]);
}
  public function create()
  {
      return view('pages.chairs.create');
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
          'chairs_count' => 'required',
          'first_number' => 'required',
          'firstcode' => 'required|string',
          'chairclass' => 'required|string',
          'event_place'=> 'required'
      ]);
      for($i=$request->first_number;$i<=$request->chairs_count;$i++){
        $code=$request->firstcode.$i;
        $checkchair=DB::table('chair')->where('code','=',$code)
        ->where('event_place','=',$request->event_place)
        ->where('chairclass','=',$request->chairclass)
        ->get();
        //dd(empty($checkchair->toArray()));
        if(empty($checkchair->toArray())){
            Chair::create([
                'code' => $code,
                'firstcode' => $request->firstcode,
                'chairclass' => $request->chairclass,
                'event_place'=> $request->event_place
              ]);
        }

      }

      return redirect()->route('chairs.index')
          ->withSuccess(__('Chair created successfully.'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  Chair  $Chair
   * @return \Illuminate\Http\Response
   */
  public function edit(Chair $chair)
  {
      return view('pages.chairs.edit', [
          'chair' => $chair
      ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  Chair  $chair
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Chair $chair)
  {
    $request->validate([
        'code' => 'required',
        'firstcode' => 'required|string',
        'chairclass' => 'required|string',
        'event_place'=> 'required'
    ]);

      $chair->update([
        'code' => $request->code,
        'firstcode' => $request->firstcode,
        'chairclass' => $request->chairclass,
        'event_place'=> $request->event_place
      ]);

      return redirect()->route('chairs.index')
          ->withSuccess(__('Chair updated successfully.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Chair  $Chair
   * @return \Illuminate\Http\Response
   */
  public function destroy(Chair $chair)
  {
      $chair->delete();

      return redirect()->route('chairs.index')
          ->withSuccess(__('Chair deleted successfully.'));
  }
}

?>
