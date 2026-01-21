<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Profile extends Component
{
    public function render()
    {
        return view('livewire.mobile.profile') ->layout('Mobile.layouts.app');
    }
}
