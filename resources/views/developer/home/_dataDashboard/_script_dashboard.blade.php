@push('styles')
 <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
	{!! Html::style('assets/css/morris.css') !!}
@endpush
@push('scripts')
	{!! Html::script('assets/js/morris.min.js') !!}
	{!! Html::script('assets/js/raphael-min.js') !!}
  <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.date-pickers.init.js')}}"></script>

	<script type="text/javascript">
	   $( "#start_date").datepicker({ viewMode: 'month',minViewMode: "months"
,format: 'MM-yyyy'});
	   $( "#end_date").datepicker({viewMode: 'month',minViewMode: "months"
,format: 'MM-yyyy'});
	   $( "#start_date_table").datepicker({viewMode: 'month',minViewMode: "months"
,format: 'MM-yyyy'});
	   $( "#end_date_table").datepicker({viewMode: 'month',minViewMode: "months"
,format: 'MM-yyyy'});

     var chart = Morris.Bar({
        element: 'chart-container', 
        xkey: 'bulan',
        ykeys: ['value'],
        labels: ['jumlah']
    });

    requestData(7, 10,chart);
    function requestData(days,end_date, chart){
      $.ajax({
        type: "post",
        url: "{{url('dev/chart_developer')}}", 
        data: { start_date: days,
                end_date : end_date, 
          _token: $('input[name=_token]').val()
         }
      })
      .done(function( data ) {
        chart.setData(JSON.parse(data));
      })
      .fail(function() {
        alert( "error occured" );
      });
    }

  $('#form-chart').on('submit', function(event) {
    event.preventDefault();
    var  start_date = $('#start_date').val();
    var  end_date = $('#end_date').val();
    if(start_date === "" || end_date === ""){
      alert('input filter belum diisi');
    }else{
      requestData(start_date, end_date,chart);    
    }
  });

  $('#form-table').on('submit', function(event) {
    event.preventDefault();
    var  start_date_table = $('#start_date_table').val();
    var  end_date_table = $('#end_date_table').val();
     
    if(start_date_table === "" || end_date_table === ""){
      alert('input filter belum diisi');
    }else{
      $.ajax({
      type: "post",
      url: "{{url('dev/data_table_developer')}}", // This is the URL to the API
      data: { 
            start_date_table: start_date_table,
            end_date_table : end_date_table, 
           _token: $('input[name=_token]').val()
       },
        success: function(data) {
           $('#table_user').html(data);                    
        }
      });
    }
  });
  </script>
@endpush