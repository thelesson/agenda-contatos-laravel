

<div class="row">

<div class="col-md-1"></div>
    <div class="col-md-10 col-sm-12 col-xs-12">

    
<!--conteudo-modal -->
@if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Ops!</strong> algo está errado!.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('message3'))
  
    <div class="alert alert-success">
                {{ session('message3') }}
               
            </div>
              
        @endif

        @include('livewire.create')
        
        @include('livewire.update')
       

    <table class="table table-hover table-responsive-md" style="margin-top:20px;">
        <tr>
            <td>ORDEM</td>
            <td>NOME</td>
            <td>ULTIMO NOME</td>
            <td>EMAIL</td>
            <td>TELEFONE</td>
            <td>AÇÕES</td>
        </tr>

        @foreach($data as $row)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$row->nome}}</td>
                <td>{{$row->ultimo_nome}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->telefone}}</td>
                <td>
                <!-- Button trigger modal -->

                    <button data-toggle="modal" data-target="#updateModal"  wire:click="edit({{$row->id}})" class="btn btn-sm btn-outline-primary py-0" >Editar</button>
                    
                    <button data-toggle="modal" data-target="#deleteModal{{$row->id}}"  class="btn btn-sm btn-outline-danger py-0">Deletar</button>
                    @include('livewire.deleta')
                </td>
            </tr>
        @endforeach
    </table>
    
    </div>
    <div class="col-md-1"></div>
</div> 
 