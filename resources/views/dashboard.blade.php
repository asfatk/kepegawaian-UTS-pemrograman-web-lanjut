@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
    <div>
        <h1>Dashboard</h1>
        <p>Ringkasan informasi data kepegawaian perusahaan.</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">PG</div>
        <div>
            <p class="stat-label">Total Pegawai</p>
            <h2>{{ $totalEmployees }}</h2>
            <span>Data pegawai terdaftar</span>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">DP</div>
        <div>
            <p class="stat-label">Total Departemen</p>
            <h2>{{ $totalDepartments }}</h2>
            <span>Departemen terdaftar</span>
        </div>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <div>
            <h2>Pegawai Terbaru</h2>
            <p>Lima data pegawai yang terakhir ditambahkan.</p>
        </div>

        <a href="{{ route('employees.index') }}" class="btn btn-primary">
            Lihat Semua
        </a>
    </div>

    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($latestEmployees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="table-main-text">
                            {{ $employee->name }}
                        </td>
                        <td>{{ $employee->department->name ?? '-' }}</td>
                        <td>{{ $employee->position }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">
                            Belum ada data pegawai.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection