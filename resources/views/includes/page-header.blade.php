<!-- <div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">{{ ($title ?? '') }}</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    @stack('pg_btn')
                </div>
                <div class="col-lg-12 col-12">
                    @include('flash::message')
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mt-4">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12  no-block align-items-center">
              <h4 class="page-title">{{ ($title ?? '') }}</h4>
              <div class="ms-auto text-end">
                 @stack('pg_btn')
              </div>
              <div class="col-lg-12 col-12">
                @if(session('message'))

                        <div class="alert alert-success mt-4">{{ session('message') }}</div>
                    @endif
                    @include('flash::message')
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mt-4">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
            </div>
          </div>
        </div>
