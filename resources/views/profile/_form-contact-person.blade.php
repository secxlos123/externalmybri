<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Nama kerabat (*)</label>
            @if ($type != 'view' || session('authenticate.role') != 'developer')
                {!! Form::text('emergency_name', old('emergency_name'), [
                    'class' => 'form-control'
                ]) !!}
            @else
                <span class="form-control" style="border: 0px;">{{isset($results['contact']['emergency_name']) ? $results['contact']['emergency_name'] : ''}}</span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Hubungan Kerabat (*)</label>
            @if ($type != 'view' || session('authenticate.role') != 'developer')
                {!! Form::text('emergency_relation', old('emergency_relation'), [
                    'class' => 'form-control'
                ]) !!}
            @else
                <span class="form-control" style="border: 0px;">{{isset($results['contact']['emergency_relation']) ? $results['contact']['emergency_relation'] : ''}}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Nomor Hp Kerabat (*)</label>
            @if ($type != 'view' || session('authenticate.role') != 'developer')
                {!! Form::text('emergency_contact', old('emergency_contact'), [
                        'class' => 'form-control numeric', 'maxlength' => 16
                ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['contact']['emergency_contact']) ? $results['contact']['emergency_contact'] : ''}}
            </span>
            @endif
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
</div>