@extends('layouts.app')

@section('content')
  <x-header>
    <x-slot name="pretitle">{{ __('Dashboard') }}</x-slot>
    <x-slot name="title">{{ __('Data Mahasiswa') }}</x-slot>
    <div class="col-auto d-print-none ms-auto">
      <div class="btn-list">
        <span class="d-none d-sm-inline">
          <a href="{{ route('dashboard') }}" class="btn d-none d-sm-inline-block">
            <i class="icon ti ti-arrow-left"></i>
            {{ __('Kembali') }}
          </a>
        </span>

        <a href="#" class="btn btn-primary d-none d-sm-inline-block">
          <i class="icon ti ti-plus"></i>
          {{ __('Tambah Mahasiswa') }}
        </a>

        <a href="#" class="btn btn-primary d-sm-none btn-icon" aria-label="{{ __('Tambah Mahasiswa') }}">
          <i class="icon ti ti-plus"></i>
        </a>
      </div>
    </div>
  </x-header>

  <div class="page-body">
    <div class="container-xl">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('Data Mahasiswa') }}</h3>
            </div>

            <div class="py-3 card-body border-bottom">
              <form id="students-form" method="GET" action="{{ route('students.index') }}" class="gap-3 d-flex">
                <div class="gap-2 text-secondary d-lg-flex align-items-center">
                  {{ __('Cari data') }}
                  <div class="d-inline-block">
                    <div class="input-group input-group-flat">
                      <input type="text" class="form-control" aria-label="Search invoice" name="search"
                        value="{{ $search }}" id="search" placeholder="Nama mahasiswa">

                      <span class="input-group-text">
                        <a href="#" class="link-secondary" title="Clear search" data-bs-toggle="tooltip"
                          id="clean-search">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                          </svg>
                        </a>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="gap-2 text-secondary d-lg-flex align-items-center">
                  {{ __('Status') }}
                  <div class="d-inline-block">
                    <select class="form-select" name="status" id="status">
                      @php
                        $statuses = [
                            '' => __('Semua'),
                            'pending' => __('Belum disetujui'),
                            'accepted' => __('Telah disetujui'),
                            'rejected' => __('Ditolak'),
                        ];
                      @endphp
                      @foreach ($statuses as $item => $label)
                        <option value="{{ $item }}" @if ($item === $status) selected @endif>
                          {{ $label }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="gap-2 text-secondary d-lg-flex align-items-center ms-lg-auto">
                  {{ __('Tampilkan') }}
                  <div class="d-inline-block">
                    <input type="text" class="form-control" value="{{ $count }}" size="3"
                      aria-label="Student count" name="count" id="count">
                  </div>
                </div>
              </form>
            </div>

            <script>
              const form = document.getElementById('students-form');
              const search = form.elements.namedItem('search');
              const clean = document.getElementById('clean-search');
              const status = form.elements.namedItem('status');
              const count = form.elements.namedItem('count');

              count.addEventListener('change', (event) => {
                form.submit();
              });

              clean.addEventListener('click', (event) => {
                search.value = '';
                form.submit();
              });

              search.addEventListener('change', (event) => {
                form.submit();
              });

              status.addEventListener('change', (event) => {
                form.submit();
              });
            </script>

            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                  <tr>
                    <th class="w-1">
                      <input class="m-0 align-middle form-check-input" type="checkbox" aria-label="Select all invoices">
                    </th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Semester</th>
                    <th>Jumlah SKS</th>
                    <th>Beban SKS Maksimal </th>
                    <th>IPS</th>
                    <th>IPK</th>
                    <th>Status</th>
                    <th>Rencana Studi</th>
                  </tr>
                </thead>

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
                @endphp

                <tbody>
                  @foreach ($students as $student)
                    <tr>
                      <td>
                        <input class="m-0 align-middle form-check-input" type="checkbox" aria-label="Select invoice">
                      </td>
                      <td>{{ $student->name }}</td>
                      <td>{{ $student->nim }}</td>
                      <td>{{ $student->semester }}</td>
                      <td>{{ $student->sks }}</td>
                      <td>{{ $student->sks }}</td>
                      <td>{{ $student->ips }}</td>
                      <td>{{ $student->ipk }}</td>

                      @php
                        $color = $color_map[$student->status];
                        $status = $status_map[$student->status];
                      @endphp

                      <td>
                        <span class="badge {{ $color }}">{{ $status }}</span>
                      </td>

                      <td>
                        <a class="btn" role="button" href="{{ route('students.show', $student->id) }}">
                          <i class="ti ti-dots-vertical me-2"></i>
                          {{ __('Detail') }}
                        </a>
                      </td>
                    </tr>
                  @endforeach
              </table>
            </div>
          </div>

          <div class="mt-4">
            {{ $students->links() }}
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
