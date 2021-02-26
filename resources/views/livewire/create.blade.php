<button data-toggle="modal" data-target="#createModal"  class="btn btn-sm btn-outline-primary py-0" >Criar Novo Contato</button> 
                   
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
    @if (session()->has('message'))
    <div class="alert alert-success">
                {{ session('message') }}
                <p>Fechando o modal em  5 segundos</p>
            </div>
                
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script>
  $(document).ready(function () {
    
        setTimeout(function() { 
            $('#createModal').modal('hide');
    }, 5000);

   
});
  
  </script>
           
        @endif
        <!--conteudo-modal -->
        <div><form data-toggle="validator" role="form" >
    <div class="form-group">
        <label for="exampleInputPassword1">Nome</label>
        
        <input type="text" wire:model="nomex" class="form-control input-sm"  placeholder="Nome" required>
        @error('nomex') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Último Nome</label>
        <input type="text" wire:model="ultimo_nomex" class="form-control input-sm"  placeholder="Último Nome" required>
        @error('ultimo_nomex') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control input-sm" placeholder="Insira seu email" wire:model="emailx" required>
        @error('emailx') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>Telefone com DDD</label>
        <input type="tel"  class="form-control input-sm telefone" placeholder="(99)9999-9999" wire:key="1" wire:model="telefonex" required>
        @error('telefonex') <span class="error text-danger">{{ $message }}</span> @enderror
   </div>
  <div>  
  </div></form>
</div>

        <!-- end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <submit wire:click="store()" id="enviaa" class="btn btn-primary">Enviar</submit>
  <div wire:loading.grid wire:target="store">
  <div class="overlay2">
  <div class="row">
  <div class="col-md-12">
  <h3 class="text-center">Cadastrando Usuário</h3>
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