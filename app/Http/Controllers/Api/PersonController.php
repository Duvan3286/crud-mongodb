<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persons;
use LDAP\Result;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\Response;



class PersonController extends Controller
{
    public function index() {
        $persons = Persons::all();
        return response()-> json([
           "result" =>$persons
        ], response::HTTP_OK);


    }

    public function store(Request $request) {

        $person = new Persons();

        $person->name =$request->name;
        $person->email=$request->email;
        $person->phone=$request->phone;

        $person->save();

        return response()->json(['result'=>$person],Response::HTTP_CREATED);

    }

    public function update(Request $request,$id) {
        $person = Persons::FindOrFail($id);

        $person->name =$request->name;
        $person->email=$request->email;
        $person->phone=$request->phone;

        $person->save();

        return response()->json(['result'=>$person],Response::HTTP_OK);


    }

    public function destroy($id) {
        Persons::destroy($id);
        return response()->json(['message' => 'Person deleted successfully'], Response::HTTP_OK);
    }

}
