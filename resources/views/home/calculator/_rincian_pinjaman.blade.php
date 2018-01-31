<div class="panel">
@if(count($rincian_pinjaman) > 0 )
    <div class="row">
        <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4 control-label">Uang Muka </label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: Rp. <span class="currency-rp"> {{$rincian_pinjaman['rincian']['uang_muka']}}</span></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Plafond Yang Diajukan </label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: Rp. <span class="currency-rp"> {{$rincian_pinjaman['rincian']['plafond']}}</span></label>
                </div>
            </div>
            <?php
                $suku_bunga = 'Suku Bunga';
                if($interest_rate_type == 2){
                   $suku_bunga = 'Suku Bunga';
                }else {
                   $suku_bunga = 'Suku Bunga Fixed'; 
                }
            ?>
            <div class="form-group">
                <label class="col-md-4 control-label"> {{$suku_bunga}} </label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: {{str_replace('.', ',', $rincian_pinjaman['rincian']['suku_bunga'])}} </label>
                </div>
            </div>       
        @if($interest_rate_type==4 || $interest_rate_type== 3)
            <div class="form-group">
                <label class="col-md-4 control-label"> Suku Bunga Floating</label>
                <div class="col-md-8">
                   <label class="col-md-8 control-label">: {{str_replace('.', ',', $rincian_pinjaman['rincian']['suku_bunga_floating'])}} </label>
                </div>
            </div>
         @endif   

        @if($interest_rate_type==4)   
            <div class="form-group">
                <label class="col-md-4 control-label"> Suku Bunga Floor</label>
                <div class="col-md-8">
                   <label class="col-md-8 control-label">: {{str_replace('.', ',',$rincian_pinjaman['rincian']['suku_bunga_floor'])}} </label>
                </div>
            </div>

        @endif
        </div>
        <div class="col-md-12"> 
            <div class="form-group">
                <label class="col-md-4 control-label"> Jangka Waktu Total </label>
                <div class="col-md-8">
                     <label class="col-md-8 control-label">: {{$rincian_pinjaman['rincian']['lama_pinjaman']}} </label>
                </div>
            </div>
        @if($interest_rate_type==4 || $interest_rate_type==3)
            <div class="form-group">
                <label class="col-md-4 control-label"> Jangka  Waktu Fixed</label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: {{$rincian_pinjaman['rincian']['kredit_fix']}} </label>
                </div>
            </div>
        @endif    
        @if($interest_rate_type==4)
             <div class="form-group">
                <label class="col-md-4 control-label"> Jangka Waktu Floor</label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: {{$rincian_pinjaman['rincian']['jangka_waktu_floor']}} </label>
                </div>
            </div>
        @endif
        @if($interest_rate_type==3)
            <div class="form-group">
                <label class="col-md-4 control-label">Angsuran Fixed </label>
                <div class="col-md-8">
                   <label class="col-md-8 control-label">: Rp <span class="currency-rp">{{ $rincian_pinjaman['rincian']['angsuranFixed'] }} </span></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Angsuran Float </label>
                <div class="col-md-8">
                   <label class="col-md-8 control-label">: Rp <span class="currency-rp">{{ $rincian_pinjaman['rincian']['angsuranFloat'] }} </span></label>
                </div>
            </div>
        @endif
        @if($interest_rate_type!=3)
            <div class="form-group">
                <label class="col-md-4 control-label">Angsuran Per Bulan </label>
                <div class="col-md-8">
                   <label class="col-md-8 control-label">: Rp <span class="currency-rp">{{$rincian_pinjaman['angsuran_perbulan']}} </span></label>
                </div>
            </div>
        @endif
            <div class="form-group">
                <label class="col-md-4 control-label">Pembayaran Pertama</label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: Rp <span class="currency-rp">{{$rincian_pinjaman['pembayaran_pertama']}}</label>
                </div>
            </div>  
        </div>
    </div>
@endif                    
</div>