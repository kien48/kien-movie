<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catelogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Str;

class CatelogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW = "admin.catelogues.";
    public function index()
    {
        //
        $data = Catelogue::query()->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),
            [
                'ten' => 'required|string|max:255'
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $ten = $data['ten'];
        $data['slug'] =  \Illuminate\Support\Str::slug($ten);
        Catelogue::query()->create($data);
        return redirect()->route('admin.catelogues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $model = Catelogue::query()->find($id);
        return view(self::PATH_VIEW.__FUNCTION__,compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(),
            [
                'ten' => 'required|string|max:255'
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token','_method');
        $ten = $data['ten'];
        $data['slug'] =  \Illuminate\Support\Str::slug($ten);
        Catelogue::query()->where('id',$id)->update($data);
        return redirect()->route('admin.catelogues.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
