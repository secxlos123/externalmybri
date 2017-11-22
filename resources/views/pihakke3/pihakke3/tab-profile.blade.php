{!! Form::open([
                  'route' => 'pihakke3.profile.requpdate',
                  'class' => 'callus submit_property', 'id' => 'form-pihakke3-edit',
                  'enctype' => 'multipart/form-data', 'method' => 'PUT'
                ]) !!}

                <!-- Form Update -->
                <div class="row top20">
                <div class="col-md-3"></div>
                              <div class="col-md-6">

                                  <div class="single-query form-group bottom20 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>NAME (*)</label>
                                    <input type="text" class="keyword-input" name="name" value="{{ $results['name'] }}">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                                  <div class="single-query form-group bottom20 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Email (*)</label>
                                    <input type="text" class="keyword-input" name="email" value="{{ $results['email'] }}" readonly="readonly" style="background: lavender;">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                                  <div class="single-query form-group bottom20 {{ $errors->has('phone_number') ? ' has-error' : '' }} ">
                                    <label>Nomor Telepon (*)</label>
                                    <input type="text" class="keyword-input numeric" name="phone_number" maxlength="12" minlength="9" value="{{$results['phone_number']}}">
                                    @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                  </div>

                                  <div class="single-query form-group bottom20 {{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label>Alamat (*)</label>
                                    <textarea class="form-control" name="address" rows="3">{{ $results['address'] }}</textarea>
                                    @if ($errors->has('address'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                                  <div class="single-query form-group bottom20 {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                    <label>Kota (*)</label>
                                    <div class="intro">
                                      <select style="display: none;" name="city_id">
                                      <option value="{{ $results['city_id'] }}" selected="selected">{{ $results['city_name'] }}</option>
                                        <?php foreach ($city as $key => $value):?>
                                          <option value="{{ $value['id'] }}" {{ $value['id'] == $results['city_id'] ? 'selected="selected"' : '' }}>{{ $value['name'] }}</option>
                                        <?php endforeach ?>
                                      </select>
                                      @if ($errors->has('city_id'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                  </div>
                                  </div>
                              <div class="col-md-12">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
                                    <input type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20" value="Simpan">
                                    <!-- <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a> -->
                                </div>
                            </div>
                            </div>
<<<<<<< HEAD
                            {!! Form::close() !!}
=======


                </div>
>>>>>>> a72cccb938e2ba8f459b61448bd35da220f97f47
