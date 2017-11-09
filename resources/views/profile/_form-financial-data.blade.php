<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Gaji / Pendapatan (*)</label>
            <div class="input-group">
            @if ($type != 'view')
                <span class="input-group-addon">Rp</span>
                {!! Form::text('salary', (old('salary')) ? old('salary') : @$results['financial']['salary'], [
                    'class' => 'form-control numeric currency', 'maxlength' => 15
                ]) !!}
                <span class="input-group-addon">,00</span>
            @else
                Rp. {{($results['financial']['salary']) ? number_format($results['financial']['salary'], 2) : '0.00'}}
            @endif
            </div>

        </div>
        <div class="single-query form-group bottom20">
            <label>Pendapatan Lain (*)</label>
            <div class="input-group">
            @if ($type != 'view')
                <span class="input-group-addon">Rp</span>
                {!! Form::text('other_salary', (old('other_salary')) ? old('other_salary') : @$results['financial']['other_salary'], [
                    'class' => 'form-control numeric currency', 'maxlength' => 15
                ]) !!}
                <span class="input-group-addon">,00</span>
            @else
                Rp. {{($results['financial']['other_salary']) ? number_format($results['financial']['other_salary'], 2) : '0.00'}}
            @endif
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Angsuran Pinjaman (*)</label>
            <div class="input-group">
            @if ($type != 'view')
                <span class="input-group-addon">Rp</span>
                {!! Form::text('loan_installment', (old('loan_installment')) ? old('loan_installment') : @$results['financial']['loan_installment'], [
                    'class' => 'form-control numeric currency', 'maxlength' => 15
                ]) !!}
                <span class="input-group-addon">,00</span>
            @else
                Rp. {{($results['financial']['loan_installment']) ? number_format($results['financial']['loan_installment'], 2) : '0.00'}}
            @endif
            </div>
        </div>
        <div class="single-query form-group bottom20">
            <label>Jumlah Tanggungan (*)</label>
            <div class="input-group">
            @if ($type != 'view')
                <span class="input-group-addon">Rp</span>
                {!! Form::text('dependent_amount', (old('dependent_amount')) ? old('dependent_amount') : @$results['financial']['dependent_amount'], [
                    'class' => 'form-control numeric currency', 'maxlength' => 15
                ]) !!}
                <span class="input-group-addon">,00</span>
            @else
                Rp. {{($results['financial']['dependent_amount']) ? number_format($results['financial']['dependent_amount'], 2) : '0.00'}}
            @endif
            </div>
        </div>
    </div>
    @if ($type != 'view' || session('authenticate.role') != 'developer')
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile') : url('profile')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
            <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
        </div>
    </div>
    @endif

    {!! Form::hidden('cif_number', '-', ['class' => 'form-control']) !!}
</div>