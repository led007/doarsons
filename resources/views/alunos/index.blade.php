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
                                <h4><i style="margin: 10px;" class="fas fa-graduation-cap"></i>Alunos</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="margin: 10px;">
                            <a href="/alunos/novo" class="btn btn-primary">
                                Novo Aluno
                                <i style="margin: 5px;" class="fas fa-plus"></i>
                            </a>
                        </div>
                        <div class="col" style="margin: 10px;">
                            <form action="">
                                <div class="input-group input-group float-right " style="width: 250px;">
                                    <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar" value="{{ $pesquisa }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary" style="height: 38px; ">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="col-lg-12">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <td align="center">#</td>
                                            <td align="center">Paciente</td>
                                            <td align="center">Professor</td>
                                            <td align="center">Curso</td>
                                            <td align="center">Ações</td>
                                        </tr>
                                    </thead>
                                    @foreach ($alunos as $item)
                                    <tbody>
                                        <td align="center">{{ $item->id }}</td>
                                        <td align="center">{{ $item->nome }}</td>
                                        <td align="center">{{ $item->escola }}</td>
                                        <td align="center">{{ $item->nome_mae }}</td>
                                        <td align="end">
                                            <a href="/alunos/editar/{{ $item->id }}" class="btn btn-info">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button data-target="#" data-toggle="modal" class="btn btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="#" class="btn btn-danger" onclick="deleta('/alunos/deletar/{{ $item->id }}')">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </td>
                                    </tbody> 
                                    @endforeach
                                    
                                </table>
                                <div class="row">
                                        <div class="col">
                                            {{ $alunos->links() }}
                                            <br>
                                        </div>
                                    </div>
                                @if(count($alunos) < 1) <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
                                    Nenhum registro encontrado!
                            </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')