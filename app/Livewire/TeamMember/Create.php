<?php

namespace App\Livewire\TeamMember;

use App\Models\TrackedTZ;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule(['required', 'string', 'min:2'])]
    public string $name;

    #[Rule(['required', 'string', 'min:3'])]
    public string $timezone;

    #[Rule(['required', 'bool'])]
    public bool $show_in_menubar = false;

    public function createMember(): void
    {
        TrackedTZ::create($this->validate());
        $this->redirectRoute('index');
    }

    public function render(): View|Factory
    {
        return view('livewire.team-member.create');
    }
}
