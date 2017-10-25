<div class="col-md-12">
    <div class="panel panel-blue has-finansial">
        <div class="panel-heading">
            <h3 class="panel-title text-uppercase">Data Keuangan</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">                
                    <fieldset>
                        <legend>Nasabah</legend>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gaji / Pendapatan *</label>
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
                                <label class="col-md-4 control-label">Pendapatan Lain *</label>
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
                                <label class="col-md-5 control-label">Jumlah Tanggungan *</label>
                                <div class="col-md-7">
                                    {!! Form::text('dependent_amount', old('dependent_amount'), [
                                        'class' => 'form-control numeric', 'maxlength' => 2
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div id="joint-income" hidden disabled>
                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <div class="">
                                <input id="checkbox1" name="is_join" type="checkbox">
                                <label for="checkbox1"> Joint Income </label>
                            </div>
                        </div>
                    </div>

                    <fieldset id="couple-financial" hidden disabled>
                        <legend>Pasangan</legend>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gaji / Pendapatan *</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        {!! Form::text('salary_couple', old('salary_couple'), [
                                            'class' => 'form-control numeric currency', 'maxlength' => 15
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pendapatan Lain *</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        {!! Form::text('other_salary_couple', old('other_salary_couple'), [
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
                                        {!! Form::text('loan_installment_couple', old('loan_installment_couple'), [
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