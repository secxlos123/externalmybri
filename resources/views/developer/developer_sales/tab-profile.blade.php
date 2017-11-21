<?php
$birth= \Carbon\Carbon::parse($results["birth_date"])->format('d-m-Y');
$join = \Carbon\Carbon::parse($results["join_date"])->format('d-m-Y');
?>
<div id="data-pribadi" class="tab-pane active">
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
                                  <div class="single-query form-group bottom20 {{ $errors->has('mobile_phone') ? ' has-error' : '' }} ">
                                    <label>Nomor Telepon (*)</label>
                                    <input type="text" class="keyword-inpu numerict" maxlength="12" minlength="9" name="mobile_phone" value="{{$results['mobile_phone']}}">
                                    @if ($errors->has('mobile_phone'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('mobile_phone') }}</strong>
                                    </span>
                                    @endif
                                  </div>

                                  <div class="single-query form-group bottom20 {{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                  {!! Form::label('birth_date', 'Tanggal lahir') !!}
                                  {!! Form::text('birth_date', $birth, ['class' => 'form-control datepicker-date-born','placeholder' => 'Masukkan tanggal lahir']) !!}
                                    @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                    @endif
                                  </div>

                                  <div class="single-query form-group bottom20 {{ $errors->has('join_date') ? ' has-error' : '' }}">
                                  {!! Form::label('join_date', 'Tanggal gabung') !!}
                                  {!! Form::text('join_date', $join, ['class' => 'form-control datepicker-date-join','placeholder' => 'Masukkan tanggal gabung']) !!}
                                    @if ($errors->has('join_date'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('join_date') }}</strong>
                                    </span>
                                    @endif
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


                </div>