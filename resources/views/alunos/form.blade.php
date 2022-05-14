@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Instituto Doar Sons</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/alunos">Registros de alunos</a></li>
                            <li class="breadcrumb-item"><a href="/alunos"> {{ isset($aluno) ? 'Editar' : 'Novo' }} Aluno</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h4><i style="margin: 10px;" class="fas fa-graduation-cap"> </i> {{ isset($aluno) ? 'Editar' : 'Novo' }} Aluno</h4>
                            </div>
                            <div class="justify-content-between">
                                <a href="/alunos" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left" style="margin: 5px;"></i>
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/alunos/salvar" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="@isset($aluno){{$aluno->id}}@endisset">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" required value="@if(isset($aluno)){{$aluno->nome}}@else{{old('nome')}}@endif">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Data de nascimento</label>
                                        <input type="date" name="data_nasc" class="form-control" required value="@if(isset($aluno)){{$aluno->data_nasc}}@else{{old('data_nasc')}}@endif">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Idade</label>
                                        <input type="number" name="idade" class="form-control" value="@if(isset($aluno)){{$aluno->idade}}@else{{old('idade')}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Sexo</label>
                                        <select name="sexo" class="form-control" value="@if(isset($aluno)){{$aluno->sexo}}@else{{old('sexo')}}@endif">
                                            <option value="">Selecione</option>
                                            @foreach ($tipo_sexo as $key => $tipo)
                                            <option value="{{$tipo}}" @if(isset($aluno) && $aluno->sexo == $tipo) selected @elseif(old('sexo') == $tipo) selected @endif>{{$tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Endereço</label>
                                        <input id="rua" type="text" name="endereco" class="form-control" required value="@if(isset($aluno)){{$aluno->endereco}}@else{{old('endereco')}}@endif">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="">Cidade</label>
                                        <input id="cidade" type="text" name="cidade" class="form-control" value="@if(isset($aluno)){{$aluno->cidade}}@else{{old('cidade')}}@endif">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Bairro</label>
                                        <input id="bairro" type="text" name="bairro" class="form-control" value="@if(isset($aluno)){{$aluno->bairro}}@else{{old('bairro')}}@endif">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label class="form-label">Complemento</label>
                                        <input type="text" name="complemento" class="form-control" value="@if(isset($aluno)){{$aluno->complemento}}@else{{old('complemento')}}@endif">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Número</label>
                                        <input type="number" name="numero" class="form-control" value="@if(isset($aluno)){{$aluno->numero}}@else{{old('numero')}}@endif">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">UF</label>
                                        <input id="uf" type="text" name="uf" class="form-control" value="@if(isset($aluno)){{$aluno->uf}}@else{{old('uf')}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">CEP</label>
                                        <input id="cep" type="text" name="cep" class="form-control" required value="@if(isset($aluno)){{$aluno->cep}}@else{{old('cep')}}@endif" onKeyPress="MascaraGenerica(this, 'CEP');">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Telefone</label>
                                        <input type="text" name="telefone" class="form-control" required value="@if(isset($aluno)){{$aluno->telefone}}@else{{old('telefone')}}@endif" onKeyPress="MascaraGenerica(this, 'TELEFONE');">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" name="email" class="form-control" required value="@if(isset($aluno)){{$aluno->email}}@else{{old('email')}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Esportes</label>
                                        <select name="esporte" class="form-control" value="@if(isset($aluno)){{$aluno->esporte}}@else{{old('esporte')}}@endif">
                                            <option value="">Selecione</option>
                                            @foreach ($tipo_esporte as $key => $tipo)
                                            <option value="{{$tipo}}" @if(isset($aluno) && $aluno->esporte == $tipo) selected @elseif(old('esporte') == $tipo) selected @endif>{{$tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Música</label>
                                        <select name="musica" class="form-control" value="@if(isset($aluno)){{$aluno->musica}}@else{{old('musica')}}@endif">
                                            <option value="">Selecione</option>
                                            @foreach ($tipo_musica as $key => $tipo)
                                            <option value="{{$tipo}}" @if(isset($aluno) && $aluno->musica == $tipo) selected @elseif(old('musica') == $tipo) selected @endif>{{$tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Dança</label>
                                        <select name="danca" class="form-control" value="@if(isset($aluno)){{$aluno->danca}}@else{{old('danca')}}@endif">
                                            <option value="">Selecione</option>
                                            @foreach ($tipo_danca as $key => $tipo)
                                            <option value="{{$tipo}}" @if(isset($aluno) && $aluno->danca == $tipo) selected @elseif(old('danca') == $tipo) selected @endif>{{$tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" card-body">
                                    <div class="p-5 col-12">
                                        <!-- Rounded tabs -->
                                        <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                                            <li class="nav-item flex-sm-fill">
                                                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">Dados da Mãe</a>
                                            </li>
                                            <li class="nav-item flex-sm-fill">
                                                <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Dados do Pai</a>
                                            </li>
                                        </ul>
                                        <br>
                                        <div id="myTabContent" class="tab-content  bg-white  shadow mb-1">
                                            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="form-label">Nome</label>
                                                            <input type="text" name="nome_mae" class="form-control" value="@if(isset($aluno)){{$aluno->nome_mae}}@else{{old('nome_mae')}}@endif">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Profissão</label>
                                                            <input type="text" name="profissao_mae" class="form-control" value="@if(isset($aluno)){{$aluno->profissao_mae}}@else{{old('profissao_mae')}}@endif">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label">CPF</label>
                                                            <input type="text" name="cpf_mae" class="form-control" value="@if(isset($aluno)){{$aluno->cpf_mae}}@else{{old('cpf_mae')}}@endif " onKeyPress="MascaraGenerica(this, 'CPF');">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Telefone</label>
                                                            <input type="text" name="telefone_mae" class="form-control" value="@if(isset($aluno)){{$aluno->telefone_mae}}@else{{old('telefone_mae')}}@endif"onKeyPress="MascaraGenerica(this, 'TELEFONE');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="form-label">Nome</label>
                                                            <input type="text" name="nome_pai" class="form-control" value="@if(isset($aluno)){{$aluno->nome_pai}}@else{{old('nome_pai')}}@endif">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Profissão</label>
                                                            <input type="text" name="profissao_pai" class="form-control" value="@if(isset($aluno)){{$aluno->profissao_pai}}@else{{old('profissao_pai')}}@endif">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label">CPF</label>
                                                            <input type="text" name="cpf_pai" class="form-control" value="@if(isset($aluno)){{$aluno->cpf_pai}}@else{{old('cpf_pai')}}@endif" onKeyPress="MascaraGenerica(this, 'CPF');">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Telefone</label>
                                                            <input type="text" name="telefone_pai" class="form-control" value="@if(isset($aluno)){{$aluno->telefone_pai}}@else{{old('telefone_pai')}}@endif" onKeyPress="MascaraGenerica(this, 'TELEFONE');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End rounded tabs -->
                                    </div>
                                    <div class=" card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label">Escola</label>
                                                    <input type="text" name="escola" class="form-control" value="@if(isset($aluno)){{$aluno->escola}}@else{{old('escola')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Série</label>
                                                    <input type="text" name="serie" class="form-control" value="@if(isset($aluno)){{$aluno->serie}}@else{{old('serie')}}@endif">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Turma</label>
                                                    <input type="text" name="turma" class="form-control" value="@if(isset($aluno)){{$aluno->turma}}@else{{old('turma')}}@endif">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Foto 3x4</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="validatedCustomFile">
                                                    <label class="custom-file-label" for="validatedCustomFile">Carregar foto</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" align="end">
                                    <br>
                                    <button type="submit" class="btn btn-success w-25 hover-shadow">
                                        Salvar
                                        <i class="fas fa-save" style="margin: 5px;"></i>
                                    </button>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')