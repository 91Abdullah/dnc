<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\DNCEntity;
use Auth;

class DncController extends Controller
{
    public function index() 
    {
        $user = Auth::user();;
        if($user->id == 1) {
            $list = DNCEntity::all();
        } else {
            $list = $user->d_n_c_entities->all();
        }
        return view('dnc.index', compact('list'));
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')) {
            $this->validator($request->all())->validate();
            $entity = Auth::user()->d_n_c_entities()->create($request->all());
            return redirect()->route('dnc_list')->with('success', true);
        } else {
            return view('dnc.create');
        }
    }

    public function update(Request $request, $id)
    {
        $dnc_entity = DNCEntity::findOrFail($id);
        if($request->isMethod('patch')) {
            $this->validator($request->all())->validate();
            $dnc_entity->update($request->all());
            return redirect()->route('dnc_list')->with('success', true);
        } else {
            return view('dnc.update', compact('dnc_entity'));
        }
    }

    public function destroy($id)
    {
        $dnc_entity = DNCEntity::findOrFail($id);
        $dnc_entity->delete();
        return redirect()->route('dnc_list')->with('success', true);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'unique' => 'This number is already present in the list.'
        ];

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'number' => 'required|numeric|unique:d_n_c_entities,number'
        ], $messages);
    }
}
