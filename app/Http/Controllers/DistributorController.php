<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('distributor.index', data: [
            'title' => 'Distributor',
            'data' => Distributor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distributor.create', data: [
            'title' => 'Distributor',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request-> validate([
            'nama_distributor'=> 'required',
            'alamat_distributor'=> 'required',
            'notelepon_distributor'=> 'required'
        ]);
        Distributor::create($data);
        return redirect()->route('distributors.index')->with('success', 'Distributor added successfully!');
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
        return view('distributor.edit', data: [
            'title' => 'Edit Distributor',
            'data' => Distributor::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama_distributor' => 'required',
            'alamat_distributor' => 'required',
            'notelepon_distributor' => 'required'
        ]);
        Distributor::where('id', $id)->update($data);
        return redirect()->route('distributors.index')->with('success', 'Distributor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();
        return redirect()->route('distributors.index')->with('success', 'Distributor deleted successfully!');
    }
}
