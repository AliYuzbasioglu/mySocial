<?php

namespace App\Livewire;

use App\Models\Feed;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Dashboard extends Component
{
    use WithFileUploads;

    public $currentUser;
    public $feed;
    public $bestand;

    public function render(): View
    {
        $this->currentUser = Auth::user();
        $users = User::get();
        $feeds = Feed::latest()->get();
        return view('livewire.dashboard',compact('users','feeds'));
    }
    public function save()
    {
            $newFeed = new Feed();
            $newFeed->user_id = Auth::id();
            $newFeed->name = Auth::user()->name;
            $newFeed->content = $this->feed;
            if($this->bestand){
               $image = $this->bestand->store('photos','public');
               $newFeed->file = $image;
            }
            $newFeed->save();
            $this->js('location.reload()');
            session()->flash('succes','Nieuw bericht toegevoegd');
    }

}
