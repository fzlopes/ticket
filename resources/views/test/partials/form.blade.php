
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">

        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Cadastro de Testes</span>
                    </div>
                    <div class="btn-group pull-right">
                        <a href="{{ route('testes.index') }}" class="btn sbold default"> Voltar <i class="fa fa-rotate-left"></i></a>
                    </div>
                </div>

            </div>
            <div class="portlet-body form">


                @if(!empty($test))
                    {!! Form::model($test, ['url' => route('testes.update', $test->id), 'class' =>'', 'id' =>'submit_form','method' => 'put', 'files' => true]) !!}
                    {!! Form::hidden('id', $test->id) !!}
                @else
                    {!! Form::open(['url' => route('testes.store'), 'class' =>'', 'id' =>'submit_form', 'method' => 'post', 'files' => true]) !!}
                @endif

                    <div class="form-wizard">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button> Você precisa preencher os campos abaixo. </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button> Validação correta </div>
                                <div class="tab-pane active" id="tab1">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('problem') ? 'has-error' :'' }}">
                                                    {!! Form::label('problem', 'Problema*', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::text('problem', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('photo') ? 'has-error' :'' }}">
                                                    {!! Form::label('photo', 'Foto*', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::file('photo', ['class' => 'form-control', 'required' => 'required']) !!}   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="tab-content">
                                <div class="form-actions">
                                    <div class="margiv-top-10">
                                        {!! Form::submit('Enviar', ['class' => 'btn green']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                 {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BASE CONTENT -->
