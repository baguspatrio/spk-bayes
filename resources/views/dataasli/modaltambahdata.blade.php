

 <!-- Modal -->
          <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <form action="{{ url('dataasli')}}" method="POST" enctype="multipart/form-data" name='autoSumForm' >
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
											<option value="Guru/Dosen">Guru/Dosen</option>
											<option value="TNI/Polri">TNI/Polri</option>
											<option value="Jasa">Jasa</option>
										</select>
									</div>
                                    <div class="form-group">
										<label for="jumlahPengajuan">Jumlah Pengajuan</label>
										<input type="text" name="jumlahPengajuan"onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="jumlahPengajuan">
										
									</div>
									<div class="form-check">
										<label>Jenis Pembayaran</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="jenisPembayaran" value="Angsur"  checked="">
											<span class="form-radio-sign">Angsuran</span>
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
										<input type="text" class="form-control" id="pendapatan" name="pendapatan" placeholder="Pengeluaran"  onFocus="startCalc();" onBlur="stopCalc();" >
									</div>
                                     <div class="form-group">
										<label for="pengeluaran">Pengeluaran</label>
										<input type="text" class="form-control" id="pengeluaran" name="pengeluaran" placeholder="pengeluaran"  onFocus="startCalc();" onBlur="stopCalc();" >
									</div>
                                     
                                    <div class="form-group">
                                        <label for="persen">25%</label>
										<input type="hidden" class="form-control" id="persen" name="persen" value="0.25" placeholder="Dalam Bulan"  onFocus="startCalc();" onBlur="stopCalc();" readonly>
									</div>
                                     <div class="form-group">
										<label for="kapasitasBulanan">Kapasitas Bulanan (%)</label>
										<input type="text" class="form-control" id="kapasitasBulanan"  name="kapasitasBulanan" readonly>
                                        <small id="emailHelp2" class="form-text text-muted">(total pendapatan-total pengeluaran)*25%</small>
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
    