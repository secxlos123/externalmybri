<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h2 class="uppercase bottom20">Top 5 Projects</h2>
				</div>
			</div>
			<div class="row">
				<div id="two-col-slider" class="owl-carousel">
					@for ($i = 1; $i <= 5 ; $i++)
						<div class="item">
							<div class="listing_full">
								<div class="image">
									{!! Html::image('assets/images/b-d-property.jpg', 'image') !!}
									<span class="tag_t">Terjual: 200 Unit</span>
									<span class="tag_l">{!! $i !!}</span>
								</div>
								<div class="listing_full_bg">
									<div class="listing_inner_full">
										<span><a href="#">Detail Properti</a></span>
										<a href="#">
											<h3>Puri Pasir Mas Residence</h3>
											<p><i class="fa fa-map-marker"></i> Jl. Cibaduyut Indah No. 21-26, Bandung</p>
										</a>
										<div class="favroute clearfix">
											<div class="property_meta"><span>PIC: John Doe / 1234567</span><span class="border-l">Total: 500 Unit</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endfor
				</div>
			</div>
		</div>
	</div>
</div>