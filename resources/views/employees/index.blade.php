@extends('layouts.app')

@section('title', 'Data Pegawai | Kepegawaian')
@section('page-heading', 'Data Pegawai')

@section('content')
    <div class="page-intro">
        <div>
            <h1>Data Pegawai</h1>
            <p>Kelola informasi pegawai dengan mudah dan teratur.</p>
        </div>

        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            + Tambah Pegawai
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Data belum dapat diproses.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="toolbar">
            <div>
                <h3 class="card-heading">Daftar Pegawai</h3>
                <p class="card-description" style="margin-bottom: 0">
                    Informasi seluruh pegawai yang terdaftar.
                </p>
            </div>

            <div class="search-box">
                <input type="search" id="employeeSearch"
                       placeholder="Cari nama, jabatan, departemen...">
            </div>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="employeeTableBody">
                    @forelse ($employees as $employee)
                        <tr class="employee-row">
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <div class="employee-name">{{ $employee->name }}</div>
                                <div class="employee-subtitle">
                                    ID Pegawai: {{ $employee->id }}
                                </div>
                            </td>

                            <td>
                                <span class="department-badge">
                                    {{ $employee->department->name ?? '-' }}
                                </span>
                            </td>

                            <td>{{ $employee->position }}</td>

                            <td>
                                Rp {{ number_format((float) $employee->salary, 0, ',', '.') }}
                            </td>

                            <td>{{ $employee->joined_at->format('d-m-Y') }}</td>

                            <td>
                                <div class="action-group">
                                    <a href="{{ route('employees.show', $employee->id) }}"
                                       class="btn btn-secondary btn-small">
                                        Detail
                                    </a>

                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                       class="btn btn-primary btn-small">
                                        Edit
                                    </a>

                                    <form action="{{ route('employees.destroy', $employee->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pegawai ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-small">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty-state">
                                <strong>Belum ada data pegawai</strong>
                                <div>Silakan tambahkan data pegawai pertama.</div>
                            </td>
                        </tr>
                    @endforelse

                    <tr id="noSearchResults" style="display: none">
                        <td colspan="7" class="empty-state">
                            Data pegawai yang dicari tidak ditemukan.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('employeeSearch');

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('.employee-row');
            let visibleCount = 0;

            rows.forEach(function (row) {
                const matches = row.textContent.toLowerCase().includes(keyword);
                row.style.display = matches ? '' : 'none';

                if (matches) visibleCount++;
            });

            const noResults = document.getElementById('noSearchResults');

            noResults.style.display =
                rows.length > 0 && visibleCount === 0 ? '' : 'none';
        });
    </script>
@endsection
