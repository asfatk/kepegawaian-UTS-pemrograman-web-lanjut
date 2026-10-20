@extends('layouts.app')

@section('title', 'Detail Pegawai | Kepegawaian')
@section('page-heading', 'Detail Pegawai')

@section('content')
    <div class="page-intro">
        <div>
            <h1>Detail Pegawai</h1>
            <p>Informasi lengkap pegawai yang terdaftar di sistem.</p>
        </div>

        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    <div class="card">
        <div class="page-intro">
            <div>
                <h3 class="card-heading">{{ $employee->name }}</h3>
                <p class="card-description" style="margin-bottom: 0">
                    ID Pegawai: {{ $employee->id }}
                </p>
            </div>

            <a href="{{ route('employees.edit', $employee->id) }}"
               class="btn btn-primary">
                Edit Pegawai
            </a>
        </div>

        <div class="detail-list">
            <div class="detail-item">
                <span class="detail-label">Nama Pegawai</span>
                <div class="detail-value">{{ $employee->name }}</div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Departemen</span>
                <div class="detail-value">
                    {{ $employee->department->name ?? '-' }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Jabatan</span>
                <div class="detail-value">{{ $employee->position }}</div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Gaji</span>
                <div class="detail-value salary-value">
                    Rp {{ number_format((float) $employee->salary, 0, ',', '.') }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Tanggal Masuk</span>
                <div class="detail-value">
                    {{ $employee->joined_at->format('d-m-Y') }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Terakhir Diperbarui</span>
                <div class="detail-value">
                    {{ $employee->updated_at->format('d-m-Y H:i') }}
                </div>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                Kembali ke Daftar
            </a>

            <a href="{{ route('employees.edit', $employee->id) }}"
               class="btn btn-primary">
                Edit Data
            </a>
        </div>
    </div>
@endsection
