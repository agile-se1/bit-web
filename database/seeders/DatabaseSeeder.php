<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GeneralPresentationDecision;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Create 3 User
        \App\Models\User::factory(3)->create();

        //Create 1 Admin
        \App\Models\Admin::factory()->create();

        //Create 3 GeneralPresentation
        \App\Models\GeneralPresentation::factory(3)->create();

        //Create 3 ProfessionalFields
        \App\Models\ProfessionalField::factory(3)
            ->state(new Sequence(
                ['current_count' => 2],
                ['current_count' => 1],
                ['current_count' => 1]
            ))
            ->create();

        //Create for the two user a GeneralPresentation and two ProfessionalFieldDecisions
        \App\Models\ProfessionalFieldDecision::factory()->create([
            'user_id' => 2,
            'professional_field_id' => 2
        ]);
        \App\Models\ProfessionalFieldDecision::factory()->create([
            'user_id' => 2,
            'professional_field_id' => 1
        ]);
        \App\Models\GeneralPresentationDecision::factory()->create([
            'user_id' => 2,
            'general_presentation_id' => 2
        ]);


        \App\Models\ProfessionalFieldDecision::factory()->create([
            'user_id' => 3,
            'professional_field_id' => 1
        ]);
        \App\Models\ProfessionalFieldDecision::factory()->create([
            'user_id' => 3,
            'professional_field_id' => 3
        ]);
        \App\Models\GeneralPresentationDecision::factory()->create([
            'user_id' => 3,
            'general_presentation_id' => 3
        ]);



    }
}
