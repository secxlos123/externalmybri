<div class="col-md-12">
    <div class="panel panel-blue has-finansial">
        <div class="panel-heading" data-toggle="collapse" data-target="#finansial-data">
            <h3 class="panel-title text-uppercase">
                Data Keuangan

                <div class="pull-right">
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </div>
            </h3>
        </div>
        <div id="finansial-data" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend>Nasabah</legend>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label title ="Take Home Pay Per Bulan" class="col-md-4 control-label">Gaji / Pendapatan *</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            {!! Form::text('salary', old('salary'), [
                                                'class' => 'form-control numeric currency', 'maxlength' => 15
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label title ="Rata-Rata Per Bulan" class="col-md-4 control-label">Pendapatan Lain</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            {!! Form::text('other_salary', old('other_salary'), [
                                                'class' => 'form-control numeric currency', 'maxlength' => 15
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Angsuran Pinjaman Lainnya *</label>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            {!! Form::text('loan_installment', old('loan_installment'), [
                                                'class' => 'form-control numeric currency', 'maxlength' => 15
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label title ="Anak Dalam Tanggungan" class="col-md-5 control-label">Jumlah Tanggungan *</label>
                                    <div class="col-md-7">
                                        {!! Form::text('dependent_amount', old('dependent_amount'), [
                                            'class' => 'form-control', 'maxlength' => 2, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div id="joint-income" hidden disabled>
                            <div class="clearfix"></div>

                            <div class="col-md-12">
                                <div class="">
                                    <input name="source_income" type="hidden" value="single">
                                    <input id="checkbox1" name="source_income" type="checkbox" value="joint">
                                    <label for="checkbox1"> Joint Income </label>
                                </div>
                            </div>
                        </div>

                        <fieldset id="couple-financial" hidden disabled>
                            <legend>Pasangan</legend>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label title ="Take Home Pay Per Bulan" class="col-md-4 control-label">Gaji / Pendapatan Perbulan*</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            {!! Form::text('couple_salary', old('couple_salary'), [
                                                'class' => 'form-control numeric currency', 'maxlength' => 15
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label title ="Rata-Rata Per Bulan" class="col-md-4 control-label">Pendapatan Lain</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            {!! Form::text('couple_other_salary', old('couple_other_salary'), [
                                                'class' => 'form-control numeric currency', 'maxlength' => 15
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Angsuran Pinjaman Lainnya *</label>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            {!! Form::text('couple_loan_installment', old('couple_loan_installment'), [
                                                'class' => 'form-control numeric currency', 'maxlength' => 15
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>