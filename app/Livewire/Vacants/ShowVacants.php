<?php

namespace App\Livewire\Vacants;

use App\Models\Vacant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowVacants extends Component
{
    use AuthorizesRequests;

    #[On('delete-vacant')]
    public function deleteVacant(int $id)
    {
        $vacant = Vacant::find($id);
        $this->authorize('delete', $vacant);

        //? Eliminar la imagen
        if ($vacant->image) {
            Storage::delete('public/img/vacants/'.$vacant->image);
        }
        $vacant->delete();
    }

    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.vacants.show-vacants', [
            'vacants' => $vacants
        ]);
    }
}
