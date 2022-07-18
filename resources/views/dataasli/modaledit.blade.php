
 <!-- Modal -->
 @foreach ($data as $item)
     
 
          <div class="modal fade " id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <form action="{{ route('dataasli.update',$item->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
       				   @method('PUT')
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <div class="modal-body">
                      <div class="card">
								<div class="card-body">
									<div class="form-group">
										<label for="nama">Nama</label>
                    
										<input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama; }}" placeholder="Masukkan Nama">
										@error('nama')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
                                    <div class="form-group">
										<label for="exampleFormControlSelect1">Pekerjaan</label>
										<select class="form-control" name="pekerjaan" id="exampleFormControlSelect1">
                     						 <option value="{{ $item->pekerjaan;}}">{{ $item->pekerjaan; }}</option>
											<option value="Pam Budaya">Pam Budaya</option>
											<option value="Karyawan">Karyawan</option>
											<option value="Pedagang">Pedagang</option>
											<option value="Guru/Dosen">Guru/Dosen</option>
											<option value="TNI/Polri">TNI/Polri</option>
											<option value="Jasa">Jasa</option>
										</select>
									</div>
                    <div class="form-group">
										<label for="jumlahPengajuan">Jumlah Pengajuan (Hanya Angka) </label>
										<input type="text" name="jumlahPengajuan" class="form-control" value="{{ $item->jumlahPengajuan; }}" placeholder="500000" id="jumlahPengajuan" onkeypress="return event.charCode >= 48 && event.charCode <=57">
										
									</div>
                  @if ($item->jenisPembayaran=='Angsuran')
                      
									<div class="form-check">
										<label>Jenis Pembayaran</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="jenisPembayaran" value="Angsuran"  checked="">
											<span class="form-radio-sign">Angsuran</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="jenisPembayaran" value="Tempo">
											<span class="form-radio-sign">Tempo</span>
										</label>
									</div>
                  @elseif($item->jenisPembayaran=='Tempo')
                      <div class="form-check">
										<label>Jenis Pembayaran</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="jenisPembayaran" value="Angsuran"  >
											<span class="form-radio-sign">Angsuran</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="jenisPembayaran" value="Tempo"checked="">
											<span class="form-radio-sign">Tempo</span>
										</label>
									</div>
                  @endif
                  <div class="form-group">
										<label for="exampleFormControlSelect1">JangkaWaktu</label>
										<select class="form-control" name="jangkaWaktu" id="exampleFormControlSelect1">
											<option value="3">3</option>
											<option value="6">6</option>
											<option value="12">12</option>
											<option value="24">24</option>
											<option value="36">36</option>
											<option value="48">48</option>
										</select>
									</div>
                  @if ($item->metodePembayaran=='Transfer')
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
                  @elseif($item->metodePembayaran=='Kantor KSPPS BMT Al Ikhwan')
                   <div class="form-check">
										<label>Metode Pembayaran</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="metodePembayaran" value="Transfer" >
											<span class="form-radio-sign">Transfer</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="metodePembayaran" value="Kantor KSPPS BMT Al Ikhwan" checked>
											<span class="form-radio-sign">Kantor KSPPS BMT Al Ikhwan </span>
										</label>
									</div>
                  @endif
									<div class="form-group">
										<label for="pendapatan">Pendapatan (hanya angka)</label>
										<input type="text" class="form-control" id="pendapatan" name="pendapatan" placeholder="Pendapatan" value="{{ $item->pendapatan; }}"  onFocus="startCalc();" onBlur="stopCalc();"onkeypress="return event.charCode >= 48 && event.charCode <=57" >
									</div>
                   <div class="form-group">
										<label for="pengeluaran">Pengeluaran(hanya angka)</label>
										<input type="text" class="form-control" id="pengeluaran" name="pengeluaran" placeholder="pengeluaran" value="{{ $item->pengeluaran; }}"  onFocus="startCalc();" onBlur="stopCalc();" onkeypress="return event.charCode >= 48 && event.charCode <=57">
									</div>
                                     
                  {{-- <div class="form-group">
                      <label for="persen">25%</label>
										<input type="hidden" class="form-control" id="persen" name="persen" value="0.25" placeholder="Dalam Bulan"  onFocus="startCalc();" onBlur="stopCalc();" readonly>
									</div> --}}
                {{-- <div class="form-group">
										<label for="kapasitasBulanan">Kapasitas Bulanan (%)</label>
										<input type="text" class="form-control" id="kapasitasBulanan"  name="kapasitasBulanan" value="{{ $item->kapasitasBulanan; }}" readonly>
                     <small id="emailHelp2" class="form-text text-muted">(total pendapatan-total pengeluaran)*25%</small>
									</div> --}}
 {{-- <div class="form-group">
										<label for="exampleFormControlSelect1">Keterangan</label>
										<select class="form-control" name="keterangan" id="exampleFormControlSelect1">
											<option value="Lancar">Lancar</option>
											<option value="Tidak Lancar">Tidak Lancar</option>
										</select>
									</div> --}}
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
    @endforeach