<div class="modal fade" id="login-register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 30%">
        <div class="modal-content">
            <div class="modal-body login">
                <section id="login">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="profile-login">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="masuk active">
                                        <a href="#masuk" aria-controls="masuk" role="tab" data-toggle="tab">
                                            Masuk
                                        </a>
                                    </li>
                                    <li role="presentation" class="daftar">
                                        <a href="#daftar" aria-controls="daftar" role="tab" data-toggle="tab">
                                            Daftar
                                        </a>
                                    </li>
                                    <li role="presentation" class=""></li>
                                </ul>
                                <!-- Nav tabs end -->

                                <!-- Tab panes -->
                                <div class="tab-content padding_half" id="myTabContent">
                                    
                                    <div role="tabpanel" class="tab-pane fade in active" id="masuk">

                                        @if (session('error-login'))
                                            @include('layouts.alert')
                                        @endif

                                        @include('auth.login')
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="daftar">

                                        @if (session('error-register'))
                                            @include('layouts.alert')
                                        @endif

                                        @include('auth.register')

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="reset">

                                        @if (session('error-forgot-password'))
                                            @include('layouts.alert')
                                        @endif

                                        @include('auth.forgot-password')

                                    </div>
                                </div>
                                <!-- Tab panes end -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>