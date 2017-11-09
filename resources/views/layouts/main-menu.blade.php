<li class="{!! request()->is('/') || request()->is('dev/dashboard') ? 'active' : '' !!}">
    <a href="{!! request()->is('/') || request()->is('dev/dashboard') ? '#' : url('/') !!}">Home </a>
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

    <li class="{!! request()->is('daftar-proyek') ? 'active' : '' !!}">
        <a href="{!! route('all-properties') !!}">Daftar Properti</a>
    </li>
    <li>
        <a href="{!! session('authenticate') ? route('eform.index') : 'javascript:void(0)' !!}" class="submission-of-credit">Pengajuan Kredit</a>
    </li>
@endif

@if ( 'developer' == session('authenticate.role') )
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Properti</a>
        <ul class="dropdown-menu animated fadeOut">
            <li><a href="{!! route('developer.proyek.index') !!}">Proyek</a></li>
            <li><a href="{!! route('developer.proyek-type.index') !!}">Proyek Type</a></li>
            <li><a href="{!! route('developer.proyek-item.index') !!}">Proyek Unit</a></li>
        </ul>
    </li>
      <li>
            <a href="{!! route('developer.developer.index') !!}">Developer</a>
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
    @endif
    <!-- @end You can remove this condition if this module already -->

@endif