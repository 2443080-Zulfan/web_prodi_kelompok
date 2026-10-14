<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    public function index(Request $request): View
    {
        $prodi = strtoupper(trim((string) $request->query('prodi', '')));

        $data = Mahasiswa::query()
            ->when($prodi !== '', fn ($query) => $query->where('prodi', $prodi))
            ->orderBy('nim')
            ->get();

        return view('mahasiswa.index', compact('data', 'prodi'));
    }

    public function create(): View
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nim' => ['required', 'digits:7', 'unique:mahasiswa,nim'],
            'nama' => ['required', 'string', 'max:120'],
            'prodi' => ['required', Rule::in(['TI', 'SI', 'MI'])],
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function show(string $nim): View
    {
        $this->validateNimFormat($nim);
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(string $nim): View
    {
        $this->validateNimFormat($nim);
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, string $nim): RedirectResponse
    {
        $this->validateNimFormat($nim);
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        $validated = $request->validate([
            'nim' => ['required', 'digits:7', Rule::unique('mahasiswa', 'nim')->ignore($mahasiswa->nim, 'nim')],
            'nama' => ['required', 'string', 'max:120'],
            'prodi' => ['required', Rule::in(['TI', 'SI', 'MI'])],
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.show', $mahasiswa->nim)
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(string $nim): RedirectResponse
    {
        $this->validateNimFormat($nim);
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    private function validateNimFormat(string $nim): void
    {
        if (! preg_match('/^\d{7}$/', $nim)) {
            abort(400, 'NIM harus terdiri dari 7 digit angka.');
        }
    }
}
