<?php

namespace App\Livewire\TeamMember;

use App\Models\TrackedTZ;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;

class Update extends Component
{
    public TrackedTZ $teamMember;

    #[Rule(['required', 'min:3', 'string'])]
    public string $name;

    #[Rule(['required', 'string'])]
    public string $timezone;

    public function mount(TrackedTZ $trackedTZ)
    {
        $this->teamMember = $trackedTZ;
        $this->name = $trackedTZ->name;
        $this->timezone = $trackedTZ->timezone;
    }

    public function saveMember()
    {
        $this->teamMember->update([
            'name' => $this->name,
            'timezone' => $this->timezone
        ]);

        $this->redirectRoute('index');
    }

    public function render()
    {
        return view('livewire.team-member.update');
    }
}
