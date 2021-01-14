<!-- Modal -->
<div class="modal bd-example-modal-lg fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tempat Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="wisata" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="categori">Nama Wisata</label>
                        <input type="text" class="form-control wisata" name="wisata" id="wisata" placeholder="Nama wisata">
                    </div>
                    <div class="form-group">
                        <label for="categori">Pelayanan</label>
                        <textarea type="text" class="form-control layanan ckeditor" name="layanan" id="layanan" placeholder="layanan" cols="20" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categori">foto</label>
                        <input type="file" class="form-control-file foto" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="descripsi">Descripsi</label>
                        <textarea type="text" class="form-control descripsi ckeditor
                        " name="descripsi" id="id_wisata" placeholder="Descripsi" cols="20" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="descripsi">Alamat</label>
                        <textarea type="text" class="form-control alamat" name="alamat" id="id_wisata" placeholder="alamat" cols="20" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="descripsi">Link Maps</label>
                        <textarea type="text" class="form-control link_maps" name="link_maps" id="id_wisata" placeholder="link_maps" cols="20" rows="5"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>