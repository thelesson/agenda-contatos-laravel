
<div>
    <div class="px-4 space-y-4 mt-8">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Ops!</strong> algo deu  errado!.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('message4'))
  
  <div class="alert alert-success">
              {{ session('message4') }}
             
          </div>
            
      @endif
    @if (session()->has('message5'))
  
  <div class="alert alert-success">
              {{ session('message5') }}
             
          </div>
            
      @endif
      
        <form class='form-inline'>
        @include('livewire.update2')
       
            <input class="form-control border-solid border border-gray-300" 
                type="text" placeholder="Pesquise um contato" wire:model="pesquisa" wire:keydown.escape="reset" style="width:100%;"/>
        </form>
        <div wire:loading>Pesquisando contatos...</div>
        <div wire:loading.remove>
        <ul class="list-group" style="list-style-type: none;">
       @if(!empty($pesquisa))
            @if($contatos->isEmpty())
            <li class="list-group-item">
                    Nenhum contato encontrado.
                </li>
            @else
                @foreach($contatos as $row)
                    
                    <li class="list-group-item" style="border-bottom:none;">
                       <h6 class="text-lg text-gray-100 text-bold">{{$row->nome}} {{$row->ultimo_nome}}</h6>
                        <p class="text-gray-100"><span class="font-weight-bold">Email</span>:<span class="font-italic font-weight-light">{{$row->email}}</span>
                         - <span class="font-weight-bold">telefone</span>:<span class="font-italic font-weight-light">{{$row->telefone}}</span>
                        </p>
                       
                   
                    </li>
                    <div style="background-color:white;display:grid; padding-top:3%;padding:2px;">
                    <button data-toggle="modal" data-target="#updateModal2"  wire:click="edit2({{$row->id}})" class="btn btn-sm btn-outline-primary py-0" >Editar</button>
                    <button data-toggle="modal" data-target="#deleteModalX{{$row->id}}"  class="btn btn-sm btn-outline-danger py-0">Deletar</button>
                       @include('livewire.deleta2')

                  </div>
                    
                   
                @endforeach
            @endif
        @endif
        </ul>
        </div>
    </div>
    <div class="px-4 mt-4">
        
    </div>
</div>