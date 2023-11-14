<?php

namespace App\Http\Controllers\Admin;

use App\Models\Family;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.families.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:families',
        ]);

        Family::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Perfecto!',
            'text' => 'La familia se creó correctamente.',
        ]);

        return redirect()->route('admin.families.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        return view('admin.families.show', compact('family'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        return view('admin.families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $request->validate([
            'name' => 'required|unique:families,name,' . $family->id,
        ]);

        $family->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Perfecto!',
            'text' => 'La familia se actualizó correctamente.',
        ]);

        return redirect()->route('admin.families.edit', $family);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $family->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Perfecto!',
            'text' => 'La familia se eliminó correctamente.',
        ]);

        return redirect()->route('admin.families.index');
    }
}
