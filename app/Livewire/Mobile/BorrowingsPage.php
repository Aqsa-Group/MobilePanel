<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class BorrowingsPage extends Component
{
    public function render()
    {
        return view('livewire.mobile.borrowings-page');
    }
}
