<?php

class StudentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /students
	 *
	 * @return Response
	 */
	public function index()
	{

		//return Rep::all();
		return View::make('students.index')
					->with('students',Student::all())
					->with('title',"Students");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /students/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('students.create')
					->with('title','Add Students Info');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /students
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'name'      => 'required',
					'email'     => 'required|email|unique:students',
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$student = new Student();

        $student->email = $data['email'];
        $student->name = $data['name'];
        $student->phone = $data['phone'];
        $student->uva_id = $data['uva_id'];
        $student->topcoder_id = $data['topcoder_id'];
        $student->codeforces_id = $data['codeforces_id'];

		if($student->save()){
				return Redirect::route('students.index')->with('success',"Student Created Successfully");
		}else{
			return Redirect::route('students.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $student = Student::find($id);

        //uva rank track
        $uva_link_to_get_id= 'http://uhunt.felix-halim.net/api/uname2uid/'.$student->uva_id;
        $response = HttpClient::get($uva_link_to_get_id);
        $uva_id = $response->content();
        $uva_link_to_get_rank = 'http://uhunt.felix-halim.net/api/ranklist/'.$uva_id.'/0/0';
        $response = HttpClient::get($uva_link_to_get_rank);
        $uva = json_decode($response->content());

        return View::make('students.show')
            ->with('student',$student)
            ->with('uva',$uva)
            ->with('title',$student->name);

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /students/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$student = Student::findOrFail($id);
			return View::make('students.edit')
						->with('student',$student)
						->with('title','Edit Student Information');
		}catch (Exception $ex){
			return Redirect::route('students.index')->with('error',"Something went wrong.Try again");
		}

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [

					'name'      => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$student = Student::find($id);
		$student->name = $data['name'];
        $student->phone = $data['phone'];
        $student->uva_id = $data['uva_id'];
        $student->topcoder_id = $data['topcoder_id'];
        $student->codeforces_id = $data['codeforces_id'];

		if($student->save()){
			return Redirect::route('students.index')->with('success',"Student Information Updated Successfully");
		}else{
			return Redirect::route('students.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$student = Student::find($id);
		if(Student::destroy($student->id)){
			return Redirect::route('students.index')->with('success',"Student deleted Successfully.");
		}else{
			return Redirect::route('students.index')->with('error',"Something went wrong.Try again");
		}
	}

}