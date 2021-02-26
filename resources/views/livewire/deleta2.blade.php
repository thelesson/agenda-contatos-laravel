
<!-- Modal -->
<div wire:ignore.self class="modal fade" style="z-index:100000" id="deleteModalX{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Contato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <h3>Deseja realmente deletar este contato?</h3>
        <!-- end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button  wire:click="destroy2({{$row->id}})"  data-dismiss="modal" class="btn btn-danger">Deletar</button>
        <div wire:loading.grid wire:target="destroy2">
  <div class="overlay2">
  <div class="row">
  <div class="col-md-12">
  <h3 class="text-center">Deletando Contato</h3>
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