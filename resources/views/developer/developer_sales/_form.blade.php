<?php
$id = $results["id"];
 ?>
{!! Form::open([
  	'route' => ['dev-sales.profile.update', $id],
  	'class' => 'callus submit_property', 'id' => 'form-property',
  	'enctype' => 'multipart/form-data', 'method' => 'PUT'
]) !!}
<div class="tab-content br-n pn">
    @include('developer.developer_sales.tab-profile')
{!! Form::close() !!}
    @include('developer.developer_sales.tab-change-password')
</div>