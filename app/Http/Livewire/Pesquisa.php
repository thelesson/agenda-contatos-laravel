<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contato;
class Pesquisa extends Component
{
    public $pesquisa;
    public $contatos;
    public $data, $nome, $ultimo_nome, $email, $telefone, $selected_id;
    public function mount(){
        $this->pesquisa ='';
        $this->contatos =[];
    }
   
    public function updatedQuery(){
        $pesquisa = '%'.$this->pesquisa.'%';
        $this->contatos = Contato::where('nome','like',$pesquisa)->get()->toArray();
    }
    public function render()
    {
        $pesquisa = '%'.$this->pesquisa.'%';
        $this->contatos = Contato::where('nome','like',$pesquisa)->orWhere('ultimo_nome','like',$pesquisa)->orWhere('email','like',$pesquisa)
        ->orWhere('telefone','like',$pesquisa)->get();
        return view('livewire.pesquisa');
    }



    private function resetInput()
    {
        $this->nome = null;
        $this->ultimo_nome = null;
        $this->email = null;
        $this->telefone = null;
        $this->nomex = null;
        $this->ultimo_nomex= null;
        $this->emailx = null;
        $this->telefonex = null;
    }
    public function edit2($id)
    {
        $record = Contato::findOrFail($id);
        $this->selected_id = $id;
        $this->nome = $record->nome;
        $this->ultimo_nome = $record->ultimo_nome;
        $this->email = $record->email;
        $this->telefone = $record->telefone;
       // $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'nome' => 'required|min:3',
            'ultimo_nome' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'telefone' => 'required|telefone_com_ddd'
        ]);
        if ($this->selected_id) {
            $record = Contato::find($this->selected_id);
            $record->update([
                'nome' => $this->nome,
                'ultimo_nome' => $this->ultimo_nome,
                'email' => $this->email,
                'telefone' => $this->telefone
            ]);
            $this->resetInput();
            session()->flash('message4', 'Contato atualizado com sucesso! Por favor, atualize a página para verificar as alterações');
           // $this->updateMode = true;
        }
       
    }
    public function destroy2($id)
    {
        if ($id) {
            $record = Contato::where('id', $id);
            $record->delete();
            
        }
        session()->flash('message5', 'Contato deletado com sucesso! Por favor, atualize a página para verificar as alterações');
    }
}
