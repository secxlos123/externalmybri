@if(count($rincian_pinjaman) > 0 )
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
           <div class="form-group">
                <label class="col-md-4 control-label">Uang Muka </label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: Rp. <span class="currency"> {{$rincian_pinjaman['rincian']['uang_muka']}}</span></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"> Suku Bunga </label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: {{$rincian_pinjaman['rincian']['suku_bunga']}} </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"> Suku Bunga Floating</label>
                <div class="col-md-8">
                   <label class="col-md-8 control-label">: {{$rincian_pinjaman['rincian']['suku_bunga_floating']}} </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Kredit Fix    </label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: {{$rincian_pinjaman['rincian']['kredit_fix']}}</label>
                </div>
            </div> 
        </div>
        <div class="col-md-12"> 
            <div class="form-group">
                <label class="col-md-4 control-label"> Lama Pinjaman </label>
                <div class="col-md-8">
                     <label class="col-md-8 control-label">: {{$rincian_pinjaman['rincian']['lama_pinjaman']}} </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"> Pinjaman Maxsimum</label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: {{$rincian_pinjaman['rincian']['pinjaman_maksimum']}} </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Angsuran Per Bulan </label>
                <div class="col-md-8">
                   <label class="col-md-8 control-label">: Rp <span class="currency">{{$rincian_pinjaman['angsuran_perbulan']}} </span></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Pembayaran Pertama</label>
                <div class="col-md-8">
                    <label class="col-md-8 control-label">: Rp <span class="currency">{{$rincian_pinjaman['pembayaran_pertama']}}</label>
                </div>
            </div>  
        </div>
    </div>
</div>
@endif                    