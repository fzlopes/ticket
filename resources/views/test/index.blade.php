@extends('layouts.admin')

@section('css')
    <link href="{{ asset('vendor/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('pagebar')

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('profile.dashboard') }}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Testes</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="pull-right tooltips btn btn-sm">
                <i class="icon-calendar"></i>&nbsp;
                {{ \Carbon\Carbon::now()->format('d/m/Y') }}
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->

@endsection

@section('title')

    <h1 class="page-title"> Teste
        <small>lista de todos as testes do sistema</small>
    </h1>

@endsection


@section('content')

    <div class="alert hide" id="alert-messages"></div>

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable" id="alertSucesso">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Maravilha!</strong> {{ Session::get('success') }}
        </div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Erro:</strong> {{ Session::get('danger') }}
        </div>
    @endif

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('testes.create') }}">
                                        <button id="sample_editable_1_new" class="btn sbold green"> Criar Teste
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th> Id         </th>
                            <th> Problema   </th>
                            <th> Foto       </th>
                            <th> Actions    </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($tests as $test)

                            <tr class="odd gradeX">
                                <td> {{$test->id}} </td>
                                <td> {{$test->problem}} </td>
                                <td><img src="{{ url($test->photo) }}" height='120' width='170' alt='Foto'/></td>
                                <td>
                                    <div class="clearfix">
                                        <a href="{{ route('testes.show', $test->id) }}"><button class="btn grey-cascade btn-outline btn-xs mt-sweetalert" type="button"> ver </button></a>
                                        <a href="{{ route('testes.edit', $test->id) }}"><button class="btn blue-hoki btn-outline btn-xs mt-sweetalert" type="button"> editar </button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('vendor/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/pages/scripts/ui-sweetalert.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/pages/scripts/table-datatables-managed.js') }}" type="text/javascript"></script>
@endsection
