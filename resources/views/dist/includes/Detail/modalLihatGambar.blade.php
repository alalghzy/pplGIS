<!-- Modal Lihat Gambar -->
<div class="modal fade" id="lihatGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar
                    {{ $post->nama }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="{{ asset('storage/posts/' . $post->image) }}" class="rounded shadow-lg mb-4 shadow-lg"
                        style="max-height: 80%; max-width: 80%" alt="{{ $post->image }}">
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                    < Kembali
                </button>
            </div>
        </div>
    </div>
</div>
