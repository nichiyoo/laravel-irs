@extends('layouts.app')

@section('content')
  <x-header>
    <x-slot name="pretitle">{{ __('Dashboard') }}</x-slot>
    <x-slot name="title">{{ __('Data Mahasiswa') }}</x-slot>
    <div class="col-auto d-print-none ms-auto">
      <div class="btn-list">
        <span class="d-none d-sm-inline">
          <a href="{{ route('students.index') }}" class="btn d-none d-sm-inline-block">
            <i class="icon ti ti-arrow-left"></i>
            {{ __('Kembali') }}
          </a>
        </span>
      </div>
    </div>
  </x-header>

  <div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Detail Mahasiswa</h3>
            </div>
            <div class="card-body">
              <div class="datagrid">
                <div class="datagrid-item">
                  <div class="datagrid-title">Nama</div>
                  <div class="datagrid-content">{{ $student->name }}</div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">NIM</div>
                  <div class="datagrid-content">{{ $student->nim }}</div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Semester</div>
                  <div class="datagrid-content">{{ $student->semester }}</div>
                </div>

                @php
                  $color_map = [
                      'pending' => 'bg-blue-lt',
                      'accepted' => 'bg-green-lt',
                      'rejected' => 'bg-red-lt',
                  ];

                  $status_map = [
                      'pending' => 'Belum disetujui',
                      'accepted' => 'Telah disetujui',
                      'rejected' => 'Ditolak',
                  ];

                  $color = $color_map[$student->status];
                  $status = $status_map[$student->status];
                @endphp

                <div class="datagrid-item">
                  <div class="datagrid-title">Status</div>
                  <div class="datagrid-content">
                    <span class="badge {{ $color }}">{{ $status }}</span>
                  </div>
                </div>

                <div class="datagrid-item">
                  <div class="datagrid-title">IPK</div>
                  <div class="datagrid-content">{{ $student->ipk }}</div>
                </div>

                <div class="datagrid-item">
                  <div class="datagrid-title">IPS</div>
                  <div class="datagrid-content">{{ $student->ips }}</div>
                </div>

                <div class="datagrid-item">
                  <div class="datagrid-title">Jumlah SKS</div>
                  <div class="datagrid-content">{{ $student->courses->sum('sks') }}</div>
                </div>

                <div class="datagrid-item">
                  <div class="datagrid-title">SKS Maksimal</div>
                  <div class="datagrid-content">{{ $student->sks }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Mata Kuliah</h3>
            </div>

            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                  <tr>
                    <th class="w-1">
                      <input class="m-0 align-middle form-check-input" type="checkbox" aria-label="Select all invoices">
                    </th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>SKS</th>
                    <th>Hari</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Ruang</th>
                    <th>Dosen</th>
                  </tr>
                </thead>

                @foreach ($student->courses as $course)
                  <tr>
                    <td>
                      <input class="m-0 align-middle form-check-input" type="checkbox" aria-label="Select invoice">
                    </td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->sks }}</td>
                    <td> {{ \Illuminate\Support\Carbon::now()->weekday($course->day)->format('D') }}</td>
                    <td>{{ $course->start->format('H:i') }}</td>
                    <td>{{ $course->end->format('H:i') }}</td>
                    <td>{{ $course->room }}</td>
                    <td>{{ $course->teacher }}</td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>

        <div class="gap-2 d-flex align-item-center justify-content-between">
          <span class="btn">Total SKS {{ $student->courses->sum('sks') }}</span>

          <div class="gap-2 d-flex align-items-center">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-primary">
              Setujui
            </a>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-danger">
              Tolak
            </a>
            <form action="{{ route('students.confirm', $student->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <input type="hidden" name="status" value="pending">
              <button type="submit" class="btn btn-secondary">
                Batalkan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal modal-blur fade" id="modal-primary" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-primary"></div>
        <div class="py-4 text-center modal-body">
          <i class="mb-2 icon text-primary icon-lg ti ti-question-mark"></i>
          <h3>Apakah Anda yakin?</h3>
          <div class="text-secondary">
            Apakah anda yakin untuk menyetujui data mahasiswa {{ $student->name }}?
          </div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col">
                <a href="#" class="btn w-100" data-bs-dismiss="modal">
                  Batal
                </a>
              </div>
              <div class="col">
                <form action="{{ route('students.confirm', $student->id) }}" method="POST">
                  @csrf
                  @method('PATCH')

                  <input type="hidden" name="status" value="accepted">
                  <button type="submit" class="btn btn-primary w-100">
                    Setujui Data
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-danger"></div>
        <div class="py-4 text-center modal-body">
          <i class="mb-2 icon text-danger icon-lg ti ti-alert-triangle"></i>
          <h3>Apakah Anda yakin?</h3>
          <div class="text-secondary">
            Apakah anda yakin untuk menolak data mahasiswa {{ $student->name }}?
          </div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col">
                <a href="#" class="btn w-100" data-bs-dismiss="modal">
                  Batal
                </a>
              </div>
              <div class="col">
                <form action="{{ route('students.confirm', $student->id) }}" method="POST">
                  @csrf
                  @method('PATCH')

                  <input type="hidden" name="status" value="rejected">
                  <button type="submit" class="btn btn-danger w-100">
                    Tolak Data
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
