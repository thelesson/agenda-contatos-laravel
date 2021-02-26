
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar Contato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--conteudo-modal -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Ops!</strong> inserção inválida.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('message2'))
    <div class="alert alert-success">
                {{ session('message2') }}
                <p>Fechando o modal em  5 segundos</p>
            </div>
                
               <script>
  $(document).ready(function () {
    
        setTimeout(function() { 
            $('#updateModal').modal('hide');
    }, 5000);

   
});
  
  </script>
           
        @endif
        <div>
    <input type="hidden" wire:model="selected_id">
    <div class="form-group">
        <label for="exampleInputPassword1">Nome</label>
        <input type="text" wire:model="nome" class="form-control input-sm"  placeholder="Nome">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Último Nome</label>
        <input type="text" wire:model="ultimo_nome" class="form-control input-sm"  placeholder="Último Nome">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control input-sm" placeholder="Insira seu email" wire:model="email">
    </div>
    <div class="form-group">
        <label>Telefone com DDD</label>
        <input type="tel"  class="form-control input-sm telefone" placeholder="(99)9999-9999" wire:model="telefone">
    </div>
   
    
</div> 
        <!-- end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button wire:click="update()" class="btn btn-primary">Atualizar</button>
        <div wire:loading.grid wire:target="update">
  <div class="overlay2">
  <div class="row">
  <div class="col-md-12">
  <h3 class="text-center">Atualizando Contato</h3>
        <!-- <livewire:carrega /> não aceitando refresh -->
        @include('livewire.carrega')
        <div>
          
    </div>
       
  </div>
  </div>
  </div>
 

    </div>
      </div>
    </div>
  </div>
</div>