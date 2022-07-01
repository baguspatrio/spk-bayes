

 <!-- Modal -->
          <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <form action="{{ url('dataset')}}" method="POST" enctype="multipart/form-data" name='autoSumForm' >
                    @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                      <div class="card">
								<div class="card-body">
									<div class="form-group">
										<label for="nama">Nama</label>
										<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
										@error('nama')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
                                    <div class="form-group">
										<label for="exampleFormControlSelect1">Pekerjaan</label>
										<select class="form-control" name="pekerjaan" id="exampleFormControlSelect1">
											<option value="PNS">PNS</option>
											<option value="Karyawan">Karyawan</option>
											<option value="Pedagang">Pedagang</option>
										</select>
									</div>
                                    <div class="form-group">
										<label for="exampleFormControlSelect1">Jumlah Pengajuan</label>
										<select class="form-control" name="jumlahPengajuan" id="exampleFormControlSelect1">
											<option value="<=5000000"><=5000000</option>
											<option value="<=20000000"><=20000000</option>
                                            <option value="<=30000000"><=30000000</option>
                                            <option value="<=50000000"><=50000000</option>
                                            <option value="<=300000000"><=300000000</option>
										</select>
									</div>
									<div class="form-check">
										<label>Jenis Pembayaran</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="jenisPembayaran" value="Angsur"  checked="">
											<span class="form-radio-sign">Angsur</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="jenisPembayaran" value="Tempo">
											<span class="form-radio-sign">Tempo</span>
										</label>
									</div>
                                   <div class="form-group">
										<label for="exampleFormControlSelect1">JangkaWaktu</label>
										<select class="form-control" name="jangkaWaktu" id="exampleFormControlSelect1">
											<option value="3">3</option>
											<option value="6">6</option>
                                            <option value="12">12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
										</select>
									</div>
                                    <div class="form-check">
										<label>Metode Pembayaran</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="metodePembayaran" value="Transfer"  checked="">
											<span class="form-radio-sign">Transfer</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="metodePembayaran" value="Kantor KSPPS BMT Al Ikhwan">
											<span class="form-radio-sign">Kantor KSPPS BMT Al Ikhwan </span>
										</label>
									</div>
                                     <div class="form-group">
										<label for="pendapatan">Pendapatan</label>
										<input type="text" class="form-control" id="pendapatan" name="pendapatan" placeholder="Pendapatan"  onFocus="startCalc();" onBlur="stopCalc();" >
									</div>
                                     <div class="form-group">
										<label for="konsumsi">Konsumsi</label>
										<input type="text" class="form-control" id="konsumsi" name="konsumsi" placeholder="Pengeluaran"  onFocus="startCalc();" onBlur="stopCalc();" >
									</div>
                                    <div class="form-group">
                                        <label for="pengeluaran">25%</label>
										<input type="text" class="form-control" id="pengeluaran" name="persen" value="0.25" placeholder="Dalam Bulan"  onFocus="startCalc();" onBlur="stopCalc();" readonly>
									</div>
                                     <div class="form-group">
										<label for="kapasitasBulanan">Kapasitas Bulanan</label>
										<input type="text" class="form-control" id="kapasitasBulanan"  name="kapasitasBulanan" readonly>
                                        <small id="emailHelp2" class="form-text text-muted">25% dari Pendapatan - Pengeluaran</small>
									</div>
                                     <div class="form-group">
										<label for="exampleFormControlSelect1">Keterangan</label>
										<select class="form-control" name="keterangan" id="exampleFormControlSelect1">
											<option value="Lancar">Lancar</option>
											<option value="Tidak Lancar">Tidak Lancar</option>
										</select>
									</div>
								</div>
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
    