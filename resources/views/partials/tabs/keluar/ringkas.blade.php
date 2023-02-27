<div class="d-flex gap-3">
    <div class="col-sm-12 col-md-7">
        <div class="card card-flush">
            <div class="card-body px-12 py-10">
                <div class="informasi d-grid gap-4">
                    <div class="row">
                        <div class="card-title">
                            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-left my-1">Informasi Surat
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-muted">Nomor Agenda</label>
                            <p class="m-0 fs-6 text-dark">
                                {{-- {{ $suratKeluar->kode->kode_klasifikasi ?? '000' }}/{{ $suratKeluar->urut }} --}}
                                {{$suratKeluar->nomor}}
                            </p>
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Nomor Surat</label>
                            <p class="m-0 fs-6 text-dark">{{ $suratKeluar->nomor_surat }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-muted">Kepada</label>
                            <p class="m-0 fs-6 text-dark">{{ $suratKeluar->nama_penerima }}</p>
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Dikirim Tanggal</label>
                            <p class="m-0 fs-6 text-dark">
                                {{ ($suratKeluar->tanggal_dikirim != null) ? \Carbon\Carbon::parse($suratKeluar->tanggal_dikirim)->format('d M Y') : 'Belum dikirim' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-muted">Perihal</label>
                            <p class="m-0 fs-6 text-dark">{{ $suratKeluar->isi_ringkas }}</p>
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Sifat Surat</label>
                            <p class="m-0 fs-6 text-dark">
                                {{ $suratKeluar->jenis->name ?? '-' }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-muted">Tanggal Surat</label>
                            <p class="m-0 fs-6 text-dark">
                                {{ \Carbon\Carbon::parse($suratKeluar->tanggal_surat)->format('d F Y') }}</p>
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Bagian</label>
                            <p class="m-0 fs-6 text-dark">{{$suratKeluar->dikirim_oleh ?? 'N/A'}}</p>
                        </div>
                    </div>
                </div>
                <div class="separator mt-6 mb-5"></div>
                <div class="berkas d-grid gap-4">
                    <div class="row">
                        <div class="card-title">
                            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-left my-1">Berkas</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-muted">File Naskah</label>
                            <p class="m-0 fs-6 text-dark">
                                <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_view_doc">Lihat Naskah</a>
                            </p>
                        </div>
                        {{-- <div class="col">
                            <label class="form-label text-muted">Lampiran</label>
                            <p class="m-0 fs-6 text-dark">-</p>
                        </div> --}}
                    </div>
                </div>
                <div class="separator mt-6 mb-5"></div>
                <div class="lokasi d-grid gap-4">
                    <div class="row">
                        <div class="card-title">
                            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-left my-1">Lokasi Arsip
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-muted">Peralatan Arsip</label>
                            @foreach ($data_lokasi_dokumen as $lokasi_dokumen)
                            <p class="m-0 fs-6 text-dark">
                                {{ $lokasi_dokumen->lokasi->name ?? '-' }}
                            </p>
                            @endforeach
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Kode/No</label>
                            @foreach ($data_lokasi_dokumen as $lokasi_dokumen)
                            <p class="m-0 fs-6 text-dark">
                                {{ $lokasi_dokumen->lokasi->kode ?? '-' }} / {{ $lokasi_dokumen->name ?? '-' }}
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card m-0 p-0">
            <iframe src="https://docs.google.com/gview?url={{ asset($suratKeluar->file_lokasi) }}&embedded=true" width="100%" height="600"></iframe>
            {{-- <iframe src="{{ asset($suratKeluar->file_lokasi) }}#toolbar=1" width="100%" height="500"></iframe> --}}
        </div>
    </div>

    <x-modal id="kt_modal_view_doc">
        <div class="card card-flush py-4">
            <div class="card-header">
                <h1 class="modal-title">File Dokumen</h1>
            </div>
            <div class="card-body">
            <iframe src="https://docs.google.com/gview?url={{ asset($suratKeluar->file_lokasi) }}&embedded=true" width="100%" height="600"></iframe>
                {{-- <iframe src="{{ asset($suratMasuk->file_lokasi) }}#toolbar=1" width="100%" height="600"></iframe> --}}
            </div>
            <div class="card-footer">
                <div class="text-end">
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </x-modal>
</div>