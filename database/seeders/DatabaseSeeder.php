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

        //Create 1 Admin
        \App\Models\Admin::factory()->create(
            [
                'username' => 'Alexandra',
                'password' => env('ADMIN_PASSWORD'),
            ]
        );

        \App\Models\GeneralPresentation::factory()->create([
            'name' => 'Informationen zum Universitätsstudium',
            'description' => 'Vortrag von der Zentralen Studienberatung der Leibniz-Universität Hannover'
        ]);
        \App\Models\GeneralPresentation::factory()->create([
            'name' => 'Informationen zur Berufsausbildung und Dualem Studium',
            'description' => 'Vortrag der Industrie- und Handelskammer Hannover'
        ]);
        \App\Models\GeneralPresentation::factory()->create([
            'name' => 'Informationen zur Ausbildung in Handwerksberufen und Trialem Studium',
            'description' => 'Informationen der Handwerkskammer Hannover'
        ]);


        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Polizei / Zoll',
            'description' => 'Polizei Niedersachsen und Hauptzollamt Hannover',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Bundeswehr / Luftfahrt',
            'description' => 'Karriereberater Bundeswehr, Oberstleutnant der Luftwaffe, Pilot, Hubschrauberpilot',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Theater / Musik / Gestaltung',
            'description' => 'Opernsängerin, Songwriter / Coach, Leiter der Theaterwerkstätten, Musikstudent, Leiter der Musikschule, Tischler für Innenarchitektur',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Medien / Mediengestaltung',
            'description' => 'Unternehmer digitale Kommunikation, Journalistin, Chefredakteur, Redakteurin / Projektleitung MADS, Koordinator bei Ärzte ohne Grenzen',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Medizin / Psychologie / Pharmazie',
            'description' => 'Apotheker, Humanbiologin, Lehrerin für Pflege, Zahnärztin, Allgemeinmedizinerin, Medizinstudent, Psychologiestudentin',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Architektur',
            'description' => 'Mehrere Architektinnen und Architekten mit unterschiedlichen Schwerpunkten, Architekturstudentin',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Sportmanagement / Eventmanagement von Musikgroßveranstaltungen',
            'description' => 'wissenschaftl. Mitarbeiter für Sportmanagement, Landessportbund Niedersachsen, Eventmanager für Musikgroßveranstaltungen',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Eventmanagement / Tourismus / Hotel',
            'description' => 'Messebau, Event / Catering, Hotelierin, TUI Group',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Jura / Steuerberatung / Logistik / Wirtschaftswissenschaften',
            'description' => 'Rechtsanwalt, Auszubildende in Rechtsanwaltskanzlei, Staatsanwältin, Steuerberater, Uni-Professorin ABWL, Unternehmensberaterin, Personalabteilung öffentlicher Dienst, Referent der Berufsausbildung bei Allianz',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Lehramt / Sozialpädagogik / Sozialwissenschaften',
            'description' => 'Digitalisierungsberater, Sozialpädagogin, Sozialarbeiter, Lehrer',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Chemie / Biologie / Geowissenschaften',
            'description' => 'Chemiker, Biologin (wissenschaftl. MA an der Uni), Geologin/Paläontologin, Biochemikerin, Physikerin',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Mathe / Informatik',
            'description' => 'Director Enterprise Business Solutions, Ingenieur, Programmierer, Student techn. Informatik, Informatikerin, Informatiker',
        ]);
        \App\Models\ProfessionalField::factory()->create([
            'name' => 'Maschinenbau / Elektrotechnik',
            'description' => 'Dipl.-Ing. Luft- und Raumfahrttechnik, Vermessungsingenieur, Wissenschaftl. MA Prozessplanung & Simulation, FWJler (freiwilliges wissenschaftl. Jahr), Ausbilder Mechatronik (Duales Studium), Dipl.-Ing. für, Klimatechnik',
        ]);
    }
}
