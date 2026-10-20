@extends('layouts.app')

@section('title', 'Edit Pegawai | Kepegawaian')
@section('page-heading', 'Edit Pegawai')

@section('content')
    <div class="page-intro">
        <div>
            <h1>Edit Data Pegawai</h1>
            <p>Perbarui informasi pegawai yang sudah terdaftar.</p>
        </div>

        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    <div class="card">
        <h3 class="card-heading">Informasi Pegawai</h3>
        <p class="card-description">
            ID Pegawai: {{ $employee->id }}
        </p>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Periksa kembali data kamu.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="name">Nama Pegawai</label>
                    <input class="form-control" id="name" type="text"
                           name="name"
                           value="{{ old('name', $employee->name) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="department_id">Departemen</label>
                    <select class="form-control" id="department_id"
                            name="department_id" required>
                        <option value="">-- Pilih Departemen --</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                @selected(old('department_id', $employee->department_id) == $department->id)>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="position">Jabatan</label>
                    <input class="form-control" id="position" type="text"
                           name="position"
                           value="{{ old('position', $employee->position) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="salary">Gaji (Rp)</label>
                    <input class="form-control" id="salary" type="number"
                           name="salary"
                           value="{{ old('salary', $employee->salary) }}"
                           min="0" step="0.01" required>
                </div>

                <div class="form-group full-width">
                    <label class="form-label" for="joined_at">Tanggal Masuk</label>
                    <input class="form-control" id="joined_at" type="date"
                           name="joined_at"
                           value="{{ old('joined_at', $employee->joined_at->format('Y-m-d')) }}"
                           required>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
