<div class="tab-content br-n pn">
                <div id="data-pribadi" class="tab-pane active">
                <!-- Form Update -->
                <div class="row top20">
                <div class="col-md-3"></div>
                              <div class="col-md-6">
                                <form class="callus submit_property">
                                  <div class="single-query form-group bottom20">
                                    <label>NAME (*)</label>
                                    <input type="text" class="keyword-input" value="{{ $results['name'] }}">
                                  </div>
                                  <div class="single-query form-group bottom20">
                                    <label>Email (*)</label>
                                    <input type="text" class="keyword-input" value="{{ $results['email'] }}" readonly="readonly" style="background: lavender;">
                                  </div>
                                  <div class="single-query form-group bottom20">
                                    <label>Nomor Telepon (*)</label>
                                    <input type="text" class="keyword-input" value="{{$results['phone_number']}}">
                                  </div>
                                   
                                  <div class="single-query form-group bottom20">
                                    <label>Alamat (*)</label>
                                    <textarea class="form-control" rows="3">{{ $results['address'] }}</textarea>
                                  </div>
                                  <div class="single-query form-group bottom20">
                                    <label>Kota (*)</label>
                                    <div class="intro">
                                      <select style="display: none;">
                                        <option class="active">-- Pilih Kota --</option>
                                        <option value="{{ $results['city_id'] }}" selected="selected">{{ $results['city_name'] }}</option>
                                        <option>Kota 2</option>
                                        <option>Kota 3</option>
                                        <option>Kota 4</option>
                                        <option>Kota 5</option>
                                        <option>Kota 6</option>
                                      </select>
                                    </div>
                                  </div> 
                                  </div>
                                </form>
                             
                              
                              <div class="col-md-12">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
                                    <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a>
                                </div>
                            </div>
                            </div>

                </div>

                <div id="change-password" class="tab-pane">
                  <div class="col-md-3"></div>
                              <div class="col-md-6">
                    <form class="callus submit_property" role="form">
                      <div class="single-query form-group bottom20">
                        <label>Password Lama (*)</label>
                        <input type="text" class="keyword-input" placeholder="masukan Password lama anda">
                      </div>

                      <div class="single-query form-group bottom20">
                        <label>Password Baru (*)</label>
                        <input type="text" class="keyword-input" placeholder="Masukan Password Baru">
                      </div>

                      <div class="single-query form-group bottom20">
                        <label>Konfirmasi Password Baru (*)</label>
                        <input type="text" class="keyword-input" placeholder="Masukan Kembali Password Baru">
                      </div>
                    </form>
                  </div>
                  <div class="col-md-12">
                    <div class="pull-right">
                        <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a>
                    </div>
                  </div>
                </div>

</div>