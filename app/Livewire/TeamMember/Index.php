<?php

namespace App\Livewire\TeamMember;

use App\Models\TeamMember;
use App\Models\TrackedTZ;
use Livewire\Component;

class Index extends Component
{
    public function deleteMember(TrackedTZ $member)
    {
        $member->delete();
    }

    public function render()
    {
        $team = TrackedTZ::all();

        return view('livewire.team-member.index', compact('team'));
    }
}
