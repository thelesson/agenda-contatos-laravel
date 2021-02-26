<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contato;
use Livewire\WithPagination;

class ContatoM extends Component
{
    public $data, $nome, $ultimo_nome, $email, $telefone, $selected_id,$nomex, $ultimo_nomex, $emailx, $telefonex;
   // public $updateMode = true;
    //use WithPagination;
    public function render()
    {
        $this->data = Contato::all();
        return view('livewire.contato-m');
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
    public function store()
    {
        $this->validate([
            'nomex' => 'required|min:3',
            'ultimo_nomex' => 'required|min:3',
            'emailx' => 'unique:contatos,email|required|email:rfc,dns',
            'telefonex' => 'unique:contatos,telefone|required|telefone_com_ddd'
        ]);
        Contato::create([
            'nome' => $this->nomex,
            'ultimo_nome' => $this->ultimo_nomex,
            'email' => $this->emailx,
            'telefone' => $this->telefonex
        ]);
       
        $this->resetInput();
        session()->flash('message', 'Cadastro realizado com sucesso!.');
       
    }
    public function edit($id)
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
            session()->flash('message2', 'Contato atualizado com sucesso!');
           // $this->updateMode = true;
        }
       
    }
    public function destroy($id)
    {
        if ($id) {
            $record = Contato::where('id', $id);
            $record->delete();
            
        }
        session()->flash('message3', 'Contato deletado com sucesso!');
    }
}
