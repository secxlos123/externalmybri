 {!! Form::open(['url' => '','class' => 'callus top201', 'id' => 'form-chart']) !!}
        <label>Filter Berdasarkan Bulan</label>
         <div class="form-group">
              <label> Mulai Dari : </label>
               {!! Form::text('start_date', null, ['class' => 'form-control datepicker-start_date','id' => 'start_date']) !!}
          </div>
           
           <div class="form-group bottom20">
            <label> Hingga :</label>
             {!! Form::text('start_date', null, ['class' => 'form-control datepicker-ebd_date','id' => 'end_date']) !!}
          </div>
          <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save"></i> Submit
          </button>
  			</div>
{!! Form::close() !!}