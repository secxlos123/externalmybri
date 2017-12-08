                  <div class="col-md-3"></div>
                              <div class="col-md-6">
                    {!! Form::open(['route' => 'pihakke3.profile.change-password', 'class' => 'callus clearfix', 'id' => 'form-change-password-store']) !!}
                      <div class="single-query form-group bottom20">
                        <label>Password Lama (*)</label>
                        {!! Form::password('old_password', [ 'class' => 'keyword-input', 'placeholder' => 'Kata Sandi lama' ]) !!}
                      </div>

                      <div class="single-query form-group bottom20">
                        <label>Password Baru (*)</label>
                        {!! Form::password('password', [ 'class' => 'keyword-input', 'placeholder' => 'Kata Sandi' ]) !!}
                      </div>

                      <div class="single-query form-group bottom20">
                        <label>Konfirmasi Password Baru (*)</label>
                        {!! Form::password('password_confirmation', [ 'class' => 'keyword-input', 'placeholder' => 'Ulangi Kata Sandi' ]) !!}
                      </div>
                  
                  </div>
                  <div class="col-md-12">
                    <div class="pull-right">
                    <button type="submit" class="btn btn-primary waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i>Simpan</button>
                        <!-- <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a> -->
                    </div>
                  </div>
                  {!! Form::close() !!}