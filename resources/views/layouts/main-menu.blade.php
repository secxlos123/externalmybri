<li class="{!! request()->is('/') || request()->is('dev/dashboard') ? 'active' : '' !!}">
    <a href="{!! request()->is('/') || request()->is('dev/dashboard') ? '#' : url('/') || request()->is('dev-sales/dashboard') ? url('dev-sales/dashboard') : url('/') !!}">Beranda </a>
</li>
   </li>
        <li class="">
            <a href="{!! route('about-us') !!}">Tentang Kami </a>
        </li>

        <li class="">
            <a href="#">Produk </a>
        </li>

@if ( 'customer' == session('authenticate.role') || ! session('authenticate') )

    <!-- @start You can remove this condition if this module already -->
    @if (false)
        <li>
            <a href="javascript:void(0)">Simulasi Kredit</a>
        </li>
        <li class="active">
            <a href="javascript:void(0)">Developer</a>
        </li>
    @endif
    <!-- @end You can remove this condition if this module already -->
    <li>
        <a href="{!! session('authenticate') ? route('eform.index') : 'javascript:void(0)' !!}" class="submission-of-credit">Pengajuan Kredit</a>
    </li>

    <li class="{!! request()->is('daftar-proyek') ? 'active' : '' !!}">
        <a href="{!! route('all-properties') !!}">Daftar Properti</a>
    </li>
    <li class="{!! request()->is('daftar-developer') ? 'active' : '' !!}">
        <a href="{!! route('all-developer') !!}">Daftar Developer</a>
    </li>
@endif

@if ( 'developer' == session('authenticate.role') )
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Properti</a>
        <ul class="dropdown-menu animated fadeOut">
            <li><a href="{!! route('developer.proyek.index') !!}">Proyek</a></li>
            <li><a href="{!! route('developer.proyek-type.index') !!}">Tipe Proyek</a></li>
            <li><a href="{!! route('developer.proyek-item.index') !!}">Unit Proyek</a></li>
        </ul>
    </li>
      <li>
            <a href="{!! route('developer.developer.index') !!}">Agen Developer</a>
    </li>

    <!-- @start You can remove this condition if this module already -->
    @if (false)
        <li>
            <a href="javascript:void(0)">Profil</a>
        </li>
        <li>
            <a href="{!! route('developer.developer.index') !!}">Developer</a>
        </li>
        <li>
            <a href="javascript:void(0)">Contact User</a>
        </li>
        <li class="">
            <a href="#">Tentang Kami </a>
        </li>

        <li class="">
            <a href="#">Produk </a>
        </li>
    @endif
@endif
    <!-- @end You can remove this condition if this module already -->
@if('developer-sales' == session('authenticate.role'))
<li><a href="{!! route('dev-sales.data-eform') !!}">Pengajuan</a></li>

@endif

@if('others' == session('authenticate.role'))
<li><a href="#">Tracking</a></li>

@endif