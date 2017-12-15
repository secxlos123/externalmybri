<div class="table-responsive">
    <table class="table" id="employee-grid">
    <thead class="bg-blue">
        <tr>
        <th>Bulan</th>
        <th>Sisa Pinjaman</th>
        <th>Porsi Pokok</th>
        <th>Porsi Bunga</th>
        <th>Angsuran</th>
        <th>Bunga</th>
        </tr>
    </thead> 
    <tbody>
    @if (count($detail_angsuran) > 0 )
        @foreach($detail_angsuran as $key => $val)
            <tr>
                <td>{{$val['bulan']}}</td>
                <td>Rp {{number_format($val['sisa_pinjaman'], 0, ',', '.')}}</span></td>
                <td>Rp {{number_format($val['angsuran_pokok'], 0, ',', '.')}}</td>
                <td>Rp {{number_format($val['angsuran_bunga'], 0, ',', '.')}}</td>
                <td>Rp {{number_format($val['angsuran'], 0, ',', '.')}}</td>
                <td>{{$val['bunga']}}</td>
            </tr>
        @endforeach
    @else

    @endif    
    </tbody>
    </table>
</div>
@push('styles')
	{!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endpush
@push('scripts')
	{!! Html::script('assets/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables.bootstrap.js') !!}
	<script type="text/javascript">
        var dataTable = $('#employee-grid').DataTable( {searching: false});
	 </script>
@endpush