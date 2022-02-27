
 <!-- Modal -->
          <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp"
                                placeholder="Masukkan Nama">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                                email with anyone else.</small> --}}
                        </div>
                        <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Status Rumah Tinggal</legend>
                            <div class="col-sm-9">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="statusRumah1" name="statusRumah" class="custom-control-input">
                                <label class="custom-control-label" for="statusRumah1">Hak Milik</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="statusRumah2" name="statusRumah" class="custom-control-input">
                                <label class="custom-control-label" for="statusRumah2">Kontrak</label>
                            </div>
                           <div class="custom-control custom-radio">
                                <input type="radio" id="statusRumah3" name="statusRumah" class="custom-control-input">
                                <label class="custom-control-label" for="statusRumah3">Lain-lain</label>
                            </div>
                            </div>
                        </div>
                        </fieldset>
                          <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Status Tempat Usaha</legend>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="statusUsaha1" name="statusUsaha" class="custom-control-input">
                                            <label class="custom-control-label" for="statusUsaha1">Hak Milik</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="statusUsaha2" name="statusUsaha" class="custom-control-input">
                                            <label class="custom-control-label" for="statusUsaha2">Kontrak</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                                <input type="radio" id="statusUsaha3" name="statusUsaha" class="custom-control-input">
                                                <label class="custom-control-label" for="statusUsaha3">Lain-lain</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                                <input type="radio" id="statusUsaha4" name="statusUsaha" class="custom-control-input">
                                                <label class="custom-control-label" for="statusUsaha4">Lain-lain</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        <div class="form-group">
                            <label for="nama">Jumlah Modal</label>
                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp"
                                placeholder="Masukkan Nama">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                                email with anyone else.</small> --}}
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                            </div>
                        </div>     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    