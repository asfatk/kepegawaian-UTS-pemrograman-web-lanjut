 @extends('layouts.app')

@section('title', 'Data Departemen')

@section('content')
<div class="page-heading">
    <div>
        <h1>Data Departemen</h1>
        <p>Pengelolaan data departemen dan struktur organisasi perusahaan.</p>
    </div>

    <a href="{{ route('departments.create') }}" class="btn btn-primary">
        <span>+</span> Tambah Departemen
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">DP</div>
        <div>
            <p class="stat-label">Total Departemen</p>
            <h2>{{ $departments->count() }}</h2>
            <span>Departemen terdaftar</span>
        </div>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <div>
            <h2>Daftar Departemen</h2>
            <p>Informasi departemen yang terdaftar dalam sistem.</p>
        </div>

        <input
            type="text"
            id="searchDepartment"
            class="search-input"
            placeholder="Cari nama departemen..."
            aria-label="Cari nama departemen"
        >
    </div>

    <div class="table-wrapper">
        <table class="data-table" id="departmentTable">
            <thead>
                <tr>
                    <th style="width: 75px;">No.</th>
                    <th>Nama Departemen</th>
                    <th>Jumlah Pegawai</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($departments as $department)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td class="table-main-text">
                            {{ $department->name }}
                        </td>

                        <td>
                            <span class="department-count">
                                {{ $department->employees_count ?? 0 }} pegawai
                            </span>
                        </td>

                        <td>
                            <div class="action-group">
                                <a
                                    href="{{ route('departments.edit', $department->id) }}"
                                    class="btn btn-edit btn-sm"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('departments.destroy', $department->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah kamu yakin ingin menghapus departemen ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-delete btn-sm"
                                    >
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">
                            <strong>Belum ada data departemen</strong>
                            <p>Silakan tambahkan departemen melalui tombol Tambah Departemen.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="panel-footer">
        Menampilkan {{ $departments->count() }} departemen
    </div>
</div>

<style>
    .department-count {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 5px;
        background: #edf2f8;
        color: #243d63;
        font-size: 12px;
        font-weight: 600;
    }

    .panel-footer {
        padding: 14px 20px;
        border-top: 1px solid #e1e6ee;
        background: #fafbfd;
        color: #778397;
        font-size: 12px;
    }

    .empty-state p {
        margin: 8px 0 0;
        font-size: 12px;
    }

    #departmentTable tbody tr[hidden] {
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchDepartment');
        const tableRows = document.querySelectorAll(
            '#departmentTable tbody tr'
        );

        searchInput.addEventListener('input', function () {
            const keyword = this.value.trim().toLowerCase();

            tableRows.forEach(function (row) {
                const isEmptyRow = row.querySelector('.empty-state');

                if (isEmptyRow) {
                    return;
                }

                row.hidden = !row.innerText.toLowerCase().includes(keyword);
            });
        });
    });
</script>
@endsection