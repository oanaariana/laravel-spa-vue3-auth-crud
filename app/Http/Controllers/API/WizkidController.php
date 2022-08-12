<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wizkid;
use Illuminate\Http\Request;

class WizkidController extends Controller
{
    // all wizkids
    public function index()
    {
        $wizkids = Wizkid::all()->toArray();
        return array_reverse($wizkids);
    }

    // add book
    public function add(Request $request)
    {
        $wizkid = new Wizkid([
            'name' => $request->name,
            'role' => $request->role,
            'email'=> $request->email,
            'picture'=>$request->picture,
            'phone' =>$request->phone,
        ]);
        $wizkid->save();

        return response()->json('The wizkid is successfully added');
    }

    // edit wizkid
    public function edit($id)
    {
        $wizkid = Wizkid::find($id);
        return response()->json($wizkid);
    }

    // update wizkid
    public function update($id, Request $request)
    {
        $wizkid = Wizkid::find($id);
        $wizkid->update($request->all());

        return response()->json('The wizkid is successfully updated');
    }

    // delete wizkid
    public function delete($id)
    {
        $wizkid = Wizkid::find($id);
        $wizkid->delete();

        return response()->json('The wizkid is successfully deleted');
    }
}
