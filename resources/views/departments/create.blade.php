@extends('layouts.app')

@section('title', 'Tambah Departemen')

@section('content')
<div class="page-heading">
    <div>
        <h1>Tambah Departemen</h1>
        <p>Tambahkan informasi departemen baru ke dalam sistem perusahaan.</p>
    </div>

    <a href="{{ route('departments.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

<div class="department-form-layout">
    <div class="form-card department-form-card">
        <div class="form-section-heading">
            <div class="form-section-icon">DP</div>
            <div>
                <h2>Informasi Departemen</h2>
                <p>Lengkapi informasi berikut dengan benar.</p>
            </div>
        </div>

        <div class="form-divider"></div>

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">
                    Nama Departemen <span class="required-mark">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Human Resources"
                    required
                    maxlength="255"
                >

                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror

                <small class="form-hint">
                    Masukkan nama departemen yang akan didaftarkan.
                </small>
            </div>

            <div class="form-notice">
                <strong>Perhatian</strong>
                <p>
                    Pastikan nama departemen sudah benar sebelum menyimpan data.
                </p>
            </div>

            <div class="form-actions">
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    Simpan Departemen
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .department-form-layout {
        max-width: 850px;
    }

    .department-form-card {
        padding: 0;
        overflow: hidden;
    }

    .form-section-heading {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 24px;
    }

    .form-section-icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
        border-radius: 8px;
        background: #eaf0f8;
        color: #172b4d;
        font-weight: 800;
    }

    .form-section-heading h2 {
        margin: 0;
        color: #172b4d;
        font-size: 17px;
    }

    .form-section-heading p {
        margin: 6px 0 0;
        color: #778397;
        font-size: 12px;
    }

    .form-divider {
        border-top: 1px solid #e1e6ee;
    }

    .department-form-card form {
        padding: 25px;
    }

    .required-mark {
        color: #b42318;
    }

    .form-hint {
        display: block;
        margin-top: 7px;
        color: #778397;
        font-size: 12px;
    }

    .form-notice {
        margin-top: 25px;
        padding: 14px 16px;
        border: 1px solid #dbe4f0;
        border-left: 4px solid #315b91;
        border-radius: 5px;
        background: #f5f8fc;
    }

    .form-notice strong {
        color: #172b4d;
        font-size: 12px;
    }

    .form-notice p {
        margin: 5px 0 0;
        color: #5e6b7e;
        font-size: 12px;
        line-height: 1.6;
    }

    .department-form-card .form-actions {
        margin-top: 25px;
    }

    @media (max-width: 600px) {
        .department-form-card form {
            padding: 18px;
        }

        .form-section-heading {
            padding: 18px;
        }

        .department-form-card .form-actions {
            flex-wrap: wrap;
        }
    }
</style>
@endsection