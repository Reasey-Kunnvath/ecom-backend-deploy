<?php

namespace App\Livewire\IndustrySkill;


use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Industry Skill Dashboard')]
class IndustrySkillDashboard extends Component
{
    public function render()
    {
        return view('livewire.industry-skill.industry-skill-dashboard');
    }
}
