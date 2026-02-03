<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function index()
    {
        return view('distributor.index', [
            'title' => 'Distributor',
            'data' => Distributor::all()
        ]);
    }

    public function create()
    {
        return view('distributor.create', [
            'title' => 'Distributor',
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validate that fields are not empty
        $request->validate([
            'nama_distributor' => 'required',
            'alamat_distributor' => 'required',
            'notelepon_distributor' => 'required'
        ]);

        // 2. Custom "All Rows" Duplicate Check
        // We check if there is ANY row that matches Name + Address + Phone
        $isDuplicate = Distributor::where('nama_distributor', $request->nama_distributor)
            ->where('alamat_distributor', $request->alamat_distributor)
            ->where('notelepon_distributor', $request->notelepon_distributor)
            ->exists();

        // 3. Logic: If Duplicate -> Revert to Index with Alert
        if ($isDuplicate) {
            return redirect()->route('distributors.index')
                ->with('duplikat', 'Duplicated Data! Distributor ' . $request->nama_distributor . ' already exists with those exact details.');
        }

        // 4. If Safe -> Create Data
        Distributor::create($request->only(['nama_distributor', 'alamat_distributor', 'notelepon_distributor']));
        
        return redirect()->route('distributors.index')->with('success', 'Distributor added successfully!');
    }

    public function edit(string $id)
    {
        return view('distributor.edit', [
            'title' => 'Edit Distributor',
            'data' => Distributor::findOrFail($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        // 1. Validate that fields are not empty
        $request->validate([
            'nama_distributor' => 'required',
            'alamat_distributor' => 'required',
            'notelepon_distributor' => 'required'
        ]);

        // 2. Custom "All Rows" Duplicate Check for Update
        $isDuplicate = Distributor::where('nama_distributor', $request->nama_distributor)
            ->where('alamat_distributor', $request->alamat_distributor)
            ->where('notelepon_distributor', $request->notelepon_distributor)
            ->where('id', '!=', $id) // <--- CRITICAL: Ignore the row we are currently editing!
            ->exists();

        // 3. Logic: If Duplicate -> Revert to Index with Alert
        if ($isDuplicate) {
            return redirect()->route('distributors.index')
                ->with('duplikat', 'Duplicated Data! You cannot update to this because the data already exists elsewhere.');
        }

        // 4. If Safe -> Update Data
        Distributor::where('id', $id)->update($request->only(['nama_distributor', 'alamat_distributor', 'notelepon_distributor']));

        return redirect()->route('distributors.index')->with('success', 'Distributor updated successfully!');
    }

    public function destroy(string $id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();
        return redirect()->route('distributors.index')->with('success', 'Distributor deleted successfully!');
    }
}