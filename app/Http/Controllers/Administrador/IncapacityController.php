<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncapacityStoreRequest;
use App\Models\Employee;
use App\Models\Incapacity;
use App\Models\Incapacity_type;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IncapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        //dd($employees);
        $incapacities = Incapacity::all();
        $listaIncapacidades = Incapacity_type::pluck('name','id');
        //dd($incapacities);
        return view('administrador.incapacities.index', compact('employees', 'incapacities', 'listaIncapacidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $listaIncapacidades = Incapacity_type::pluck('name','id');
        //dd($listaIncapacidades);
        return view('administrador.incapacities.create', compact('employees', 'listaIncapacidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncapacityStoreRequest $request)
    {
        try
        {

            Employee::find($request->employee);
            dd($employee);
            Incapacity::create([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'clasification' => $request->clasification,
                'incapacity_type_id' => $request->incapacity_type_id,
                'employee_id' => $request->employee
            ]);
            
            Alert::toast('usuario guardado exitosamente', 'success');
            return redirect()->route('administrador.incapacities.index');


        }
        catch(Exception $e)
        {
            //dd($request);
            return "Ha ocurrido un error" .$e;
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
        //
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
