<x-layout title="Pengesahan Dokumen">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-check-circle"></i> Pengesahan Dokumen</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('kepsek.pengesahan') }}">
                            @csrf
                            <input type="hidden" name="document_id" value="{{ $dokumen->id }}">
                            <div class="mb-3">
                                <label class="font-weight-bold">Nama Guru:</label>
                                <p class="form-control-plaintext text-primary">{{ $dokumen->nama_guru }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="font-weight-bold">Judul Dokumen:</label>
                                <p class="form-control-plaintext text-dark">{{ $dokumen->judul }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="font-weight-bold">Kategori:</label>
                                <p class="form-control-plaintext">{{ $dokumen->kategori }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="font-weight-bold">Tanggal Disetujui Kurikulum:</label>
                                <p class="form-control-plaintext">{{ $dokumen->tanggal_disetujui_kurikulum ?? '-' }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="catatan_kepsek" class="font-weight-bold">Catatan Kepala Sekolah:</label>
                                <textarea name="catatan_kepsek" id="catatan_kepsek" class="form-control" rows="3" placeholder="Tambahkan catatan jika perlu..."></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" name="action" value="approve" class="btn btn-success">
                                    <i class="fas fa-check"></i> Sahkan
                                </button>
                                <button type="submit" name="action" value="reject" class="btn btn-danger">
                                    <i class="fas fa-times"></i> Tolak
                                </button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout> 