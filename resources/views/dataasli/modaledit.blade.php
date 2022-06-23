
 <!-- Modal -->
 @foreach ($data as $item)
     
 
          <div class="modal fade " id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <form action="/importfile" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                            @csrf
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Kepribadian</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>{{ $item->kepribadian }}</option>
                          <option>koperatif</option>
                          <option>tidak koperatif</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Rumah</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>{{ $item->statusRumah }}</option>
                          <option value="hak milik">hak milik</option>
                          <option value="kontrak">kontrak</option>
                          <option value="lain-lain">lain-lain</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Tempat Usaha</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>{{ $item->statusTempatusaha }}</option>
                          <option value="hak milik">hak milik</option>
                          <option value="kontrak">kontrak</option>
                          <option value="lain-lain">lain-lain</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Tempat Usaha</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>{{ $item->statusTempatusaha }}</option>
                          <option value="hak milik">hak milik</option>
                          <option value="kontrak">kontrak</option>
                          <option value="lain-lain">lain-lain</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Tempat Usaha</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>{{ $item->statusTempatusaha }}</option>
                          <option value="hak milik">hak milik</option>
                          <option value="kontrak">kontrak</option>
                          <option value="lain-lain">lain-lain</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Tempat Usaha</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>{{ $item->statusTempatusaha }}</option>
                          <option value="hak milik">hak milik</option>
                          <option value="kontrak">kontrak</option>
                          <option value="lain-lain">lain-lain</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    @endforeach