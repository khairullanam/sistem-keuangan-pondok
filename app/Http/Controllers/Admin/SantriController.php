<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SantriController extends Controller
{
    public function index()
    {
        
         if (auth()->user()->role !== 'admin') {
        abort(403);
    }
        $data = Santri::paginate(10);
        return view('admin.santri.index', compact('data'));
    }

    public function create()
    {
        return view('admin.santri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|numeric|unique:santris',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'kamar' => 'required|string',
            'bendahara_id' => 'required|exists:bendaharas,id',
        ]);

        $email = $validated['nama'] . '@santri.local';

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $validated['nama'],
                'password' => Hash::make($validated['nis']),
                'role' => 'santri',
            ]
        );

        $dataSantri = array_merge($validated, ['user_id' => $user->id]);

        Santri::create($dataSantri);

        return redirect()->route('admin.santri.index')->with('success', 'Santri berhasil ditambahkan.');
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $santri = Santri::findOrFail($id);
        return view('admin.santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|numeric|unique:santris,nis,' . $id,
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'kamar' => 'required|string'
        ]);

        $santri = Santri::findOrFail($id);
        $santri->update($request->all());

        return redirect()->route('admin.santri.index')->with('success', 'Santri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->route('admin.santri.index')->with('success', 'Santri berhasil dihapus.'); 
    }
}

