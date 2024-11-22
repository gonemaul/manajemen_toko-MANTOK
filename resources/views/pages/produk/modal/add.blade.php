<div class="modal fade" id="AddProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-2xl">
        <form class="modal-content" enctype="multipart/form-data" id="formAddProduk">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title w-100 text-center" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrap-top">
                    <div class="left">
                        <div class="image-upload">
                            <label for="file-input" class="position-relative">
                                <img id="preview-image" class="preview_image"
                                    src="{{ asset('assets/svg/upload-file2.svg') }}" />
                                <div class="overlay-button">
                                    <img src="{{ asset('assets/svg/ic-camera.svg') }}" alt="404">
                                    Unggah File
                                </div>
                            </label>
                            <input id="file-input" type="file" name="image" class="d-none file_input"
                                accept=".jpg,.jpeg,.png,.webp" />
                            <div class="error-text error_add_image"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="wrapp-input-label">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Nama Produk">
                            <div class="error-text error_add_nama"></div>
                        </div>
                        <div class="wrapp-input-label">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stock" id="stock" placeholder="Stok">
                            <div class="error-text error_add_stock"></div>
                        </div>
                        <div class="wrapp-input-label">
                            <label for="description" class="form-label">Deskripsi Produk</label>
                            <input type="text" class="form-control" name="description" id="description"
                                placeholder="Deskripsi Produk ">
                            <div class="error-text error_add_deskripsi"></div>
                        </div>
                    </div>
                </div>
                <div class="wrapp-input-label">
                    <label for="benefit" class="form-label">Manfaat Produk</label>
                    <textarea class="form-control" id="benefit" name="benefit" rows="2" placeholder="Manfaat Produk"></textarea>
                    <div class="error-text error_add_manfaat"></div>
                </div>
                <div class="wrapp-input-label">
                    <label for="tutorial" class="form-label">Cara Pemakaian</label>
                    <textarea class="form-control" id="tutorial" name="tutorial" rows="2" placeholder="Cara Pemakaian"></textarea>
                    <div class="error-text error_add_tutorial"></div>
                </div>
                <div class="wrapp-input-label">
                    <label for="komposisi" class="form-label">Komposisi Produk</label>
                    <textarea class="form-control" id="komposisi" name="komposisi" rows="2" placeholder="Komposisi Produk"></textarea>
                    <div class="error-text error_add_komposisi"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancel_add" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="submit_add">Submit</button>
            </div>
        </form>
    </div>
</div>
