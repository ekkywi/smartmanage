@extends("layouts.app")
@section("title", "SmartManage - Aset")
@section("content")

    <div class="container">
        <h2>Daftar User</h2>
        @if (session("success"))
            <div class="alert alert-success">
                {{ session("success") }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table table-striped table-bordered" id="asetTable" style="width:100%">
            <thead>
                <tr>
                    <th>Kode Aset</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Tahun Beli</th>
                    <th>Nilai Beli</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asets as $aset)
                    <tr>
                        <td>{{ $aset->kode_aset }}</td>
                        <td>{{ $aset->nama }}</td>
                        <td>{{ $aset->jenis }}</td>
                        <td>{{ $aset->merk }}</td>
                        <td>{{ $aset->tipe }}</td>
                        <td>{{ $aset->tahun_beli }}</td>
                        <td>{{ $aset->nilai_beli }}</td>
                        <td>{{ $aset->keterangan }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-id="{{ $aset->id }}" data-jenis="{{ $aset->jenis }}" data-keterangan="{{ $aset->keterangan }}" data-kode_aset="{{ $aset->kode_aset }}" data-merk="{{ $aset->merk }}" data-nama="{{ $aset->nama }}" data-nilai_beli="{{ $aset->nilai_beli }}" data-tahun_beli="{{ $aset->tahun_beli }}" data-target="#editAsetModal" data-tipe="{{ $aset->tipe }}" data-toggle="modal">Edit</button>
                            <button class="btn btn-danger btn-sm" data-id="{{ $aset->id }}" data-target="#deleteAsetModal" data-toggle="modal">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div aria-hidden="true" aria-labelledby="editAsetModalLabel" class="modal fade" id="editAsetModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAsetModalLabel">Edit Aset</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("aset.update") }}" id="editAsetForm" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <input id="editAsetId" name="id" type="hidden">
                        <div class="form-group">
                            <label for="editKodeAset">Kode Aset</label>
                            <input class="form-control" id="editKodeAset" name="kode_aset" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editNama">Nama</label>
                            <input class="form-control" id="editNama" name="nama" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editJenis">Jenis</label>
                            <input class="form-control" id="editJenis" name="jenis" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editMerk">Merk</label>
                            <input class="form-control" id="editMerk" name="merk" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editTipe">Tipe</label>
                            <input class="form-control" id="editTipe" name="tipe" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editTahunBeli">Tahun Beli</label>
                            <input class="form-control" id="editTahunBeli" name="tahun_beli" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editNilaiBeli">Nilai Beli</label>
                            <input class="form-control" id="editNilaiBeli" name="nilai_beli" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editKeterangan">Keterangan</label>
                            <input class="form-control" id="editKeterangan" name="keterangan" required type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Tutup</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div aria-hidden="true" aria-labelledby="deleteAsetModalLabel" class="modal fade" id="deleteAsetModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAsetModalLabel">Hapus Aset</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("aset.delete") }}" id="deleteAsetForm" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus aset ini?</p>
                        <input id="deleteAsetId" name="id" type="hidden">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Tutup</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#editAsetModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var kode_aset = button.data('kode_aset');
            var nama = button.data('nama');
            var jenis = button.data('jenis');
            var merk = button.data('merk');
            var tipe = button.data('tipe');
            var tahun_beli = button.data('tahun_beli');
            var nilai_beli = button.data('nilai_beli');
            var keterangan = button.data('keterangan');

            var modal = $(this);
            modal.find('#editAsetId').val(id);
            modal.find('#editKodeAset').val(kode_aset);
            modal.find('#editNama').val(nama);
            modal.find('#editJenis').val(jenis);
            modal.find('#editMerk').val(merk);
            modal.find('#editTipe').val(tipe);
            modal.find('#editTahunBeli').val(tahun_beli);
            modal.find('#editNilaiBeli').val(nilai_beli);
            modal.find('#editKeterangan').val(keterangan);
        });

        $('#deleteAsetModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            var modal = $(this);
            modal.find('#deleteAsetId').val(id);
        });
    </script>
@endsection
