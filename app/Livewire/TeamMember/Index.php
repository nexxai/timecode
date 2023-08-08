<?php

namespace App\Livewire\TeamMember;

use App\Models\TrackedTZ;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public bool $showDeleteConfirm = false;
    public ?TrackedTZ $memberToDelete;

    public function deleteMember(TrackedTZ $member)
    {
        $this->showDeleteConfirm = false;
        $member->delete();
        $this->redirectRoute('index');
    }

    public function confirmDelete(TrackedTZ $member)
    {
        $this->showDeleteConfirm = true;
        $this->memberToDelete = $member;
    }

    #[On('updateOrder')]
    public function updateOrder($newOrder): void
    {
        $order = explode('|', $newOrder);

        for ($i = 0; $i < count($order); $i++) {
            $tz = TrackedTZ::find($order[$i]);
            $tz->display_order = $i;
            $tz->save();
        }
    }

    public function cancel()
    {
        $this->showDeleteConfirm = false;
        $this->memberToDelete = null;
    }

    public function render()
    {
        $team = TrackedTZ::getOrdered();

        return view('livewire.team-member.index', compact('team'));
    }
}
