<?php
namespace App\Http\Controllers\Svu;

use App\DataTables\ProgramsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramRequest;
use App\Models\Program;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProgramController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(ProgramsDataTable $dataTable)
  {
    return $dataTable->render('pages.admin.programs.allPrograms');

    /*$programs = Program::all();
    return  view('pages.admin.programs.allPrograms',compact('programs'));*/
  }
  public function datatables(ProgramsDataTable $dataTable)
  {
        return $dataTable->ajax();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreProgramRequest $request) : RedirectResponse
  {
    try{
        $validated = $request->validated();

        $program = new Program();
        $program->program_name=$request->program_name;
        $program->program_name_ar=$request->program_name_ar;
        $program->program_code=$request->program_code;
        $program->desc=$request->desc;
        $program->save();

        toastr()->success('Program has been saved successfully!');

        return redirect('/all-programs');

    }catch (\Exception $e){
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreProgramRequest $request)
  {

    	if($request->ajax()){
	       	Program::find($request->input('pk'))->update([$request->input('program_name') => $request->input('value')]);
	        return response()->json(['success' => true]);
    	}

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
