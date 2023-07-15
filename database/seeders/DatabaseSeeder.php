<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       $departements = [
            [
                'nom_departement_fr' => 'Département des affaires administratives, financières et juridiques',
                'nom_departement_ar' => 'قسم الشؤون الإدارية والمالية والقانونية',
            ],
            [
                'nom_departement_fr' => 'Département de la construction, de l environnement, des travaux et de la propriété',
                'nom_departement_ar' => 'قسم التعمير والبيئة والأشغال والممتلكات',
            ],
        ];

        foreach ($departements as $departements) {
            DB::table('departements')->insert($departements);
        }
        $services = [
            [
                'nom_service_fr' => 'service des affaires financières',
                'nom_service_ar' => 'مصلحة الشؤون المالية',
                'id_departement' => 1,
            ],
            [
                'nom_service_fr' => 'service des affaires juridiques',
                'nom_service_ar' => 'مصلحة الشؤون القانونية',
                'id_departement' => 1,
            ],
            [
                'nom_service_fr' => 'service des affaires administratives',
                'nom_service_ar' => 'مصلحة الشؤون الإدارية',
                'id_departement' => 1,
            ],
            [
                'nom_service_fr' => 'Direction des Travaux, de l Entretien et du Patrimoine',
                'nom_service_ar' => 'مصلحة الأشغال والصيانة والممتلكات',
                'id_departement' => 2,
            ],
            [
                'nom_service_fr' => 'service de la planification et de la gestion sur le terrain et des affaires environnementales et sanitaires',
                'nom_service_ar' => 'مصلحة التخطيط وتدبير المجال وشؤون البيئة والصحة',
                'id_departement' => 2,
            ],
            [
                'nom_service_fr' => 'service des Etudes Techniques et du Suivi',
                'nom_service_ar' => 'مصلحة الدراسات التقنية والمراقبة',
                'id_departement' => 2,
            ],
        ];

        foreach ($services as $services) {
            DB::table('services')->insert($services);
        }
        $bureaus = [
            [
                'nom_bureau_fr' => 'bureau1',
                'nom_bureau_ar' => 'المكتب 1',
                'id_service' => 1,
            ],
            [
                'nom_bureau_fr' => 'bureau2',
                'nom_bureau_ar' => 'المكتب 2',
                'id_service' => 1,
            ],
            [
                'nom_bureau_fr' => 'bureau1',
                'nom_bureau_ar' => 'المكتب 3',
                'id_service' => 2,
            ],
            [
                'nom_bureau_fr' => 'bureau2',
                'nom_bureau_ar' => 'المكتب 4',
                'id_service' => 2,
            ],
        ];

        foreach ($bureaus as $bureaus) {
            DB::table('bureaus')->insert($bureaus);
        }
        $positions = [
            [
                'nom_position_fr' => 'Sans',
                'nom_position_ar' => 'لا شيئ',
            ],
            [
                'nom_position_fr' => 'Détachement',
                'nom_position_ar' => 'الإلحاق',
            ], [
                'nom_position_fr' => 'Mise à la disposition',
                'nom_position_ar' => 'رهن الإشارة',
            ], [
                'nom_position_fr' => 'Intégration',
                'nom_position_ar' => 'الإدماج',
            ], [
                'nom_position_fr' => 'retraites',
                'nom_position_ar' => 'المتقاعدين',
            ],
        ];
        foreach ($positions as $positions) {
            DB::table('positions')->insert($positions);
        }

        $fonctions = [
            [
                'nom_fonction_fr' => 'Sans',
                'nom_fonction_ar' => 'لا شيئ',
            ],
            [
                'nom_fonction_fr' => 'Chef de departement',
                'nom_fonction_ar' => 'رئيس قسم',
            ], [
                'nom_fonction_fr' => 'Chef de service',
                'nom_fonction_ar' => 'رئيس مصلحة',
            ],
        ];
        foreach ($fonctions as $fonctions) {
            DB::table('fonctions')->insert($fonctions);
        }

        $categories = [
            [
                'nom_categorie_ar' => 'الواردات',
            ],
            [
                'nom_categorie_ar' => 'الصادرات',
            ],
        ];

        foreach ($categories as $categories) {
            DB::table('categories')->insert($categories);
        }
        $grades = [
            [
                'nom_grade_fr' => 'TECHNICIEN 1° GRADE',
                'nom_grade_ar' => 'تقني من الدرجة الأولى',
            ],
            [
                'nom_grade_fr' => 'TECHNICIEN 2° GRADE',
                'nom_grade_ar' => 'تقني من الدرجة الثانية',
            ],
            [
                'nom_grade_fr' => 'TECHNICIEN 3° GRADE',
                'nom_grade_ar' => 'تقني من الدرجة الثالثة',
            ],
            [
                'nom_grade_fr' => 'TECHNICIEN 4° GRADE',
                'nom_grade_ar' => 'تقني من الدرجة الرابعة',
            ],
            [
                'nom_grade_fr' => 'ADJOINT ADMINISTRATIF 1° GRADE',
                'nom_grade_ar' => 'مساعد اداري الدرجة الأولى',
            ],
            [
                'nom_grade_fr' => 'ADJOINT ADMINISTRATIF 2° GRADE',
                'nom_grade_ar' => 'مساعد اداري الدرجة الثانية',
            ],
            [
                'nom_grade_fr' => 'ADJOINT ADMINISTRATIF 3° GRADE',
                'nom_grade_ar' => 'مساعد اداري الدرجة الثالتة',
            ],
            [
                'nom_grade_fr' => 'ADJOINT DE SANTE PRINCIPAL',
                'nom_grade_ar' => 'مساعد صحة ممتاز',
            ],
            [
                'nom_grade_fr' => 'ADJOINT TECHNIQUE 1° GRADE',
                'nom_grade_ar' => 'مساعد تقني الدرجة الأولى',
            ],
            [
                'nom_grade_fr' => 'ADJOINT TECHNIQUE 2° GRADE',
                'nom_grade_ar' => 'مساعد تقني الدرجة الثانية',
            ],
            [
                'nom_grade_fr' => 'ADJOINT TECHNIQUE 3° GRADE',
                'nom_grade_ar' => 'مساعد تقني الدرجة الثالتة',
            ],
            [
                'nom_grade_fr' => 'ADMINISTRATEUR',
                'nom_grade_ar' => 'متصرف',
            ],
            [
                'nom_grade_fr' => 'ADMINISTRATEUR 1° GRADE',
                'nom_grade_ar' => 'متصرف الدرجة الأولى',
            ],
            [
                'nom_grade_fr' => 'ADMINISTRATEUR 2° GRADE',
                'nom_grade_ar' => 'متصرف الدرجة  الثانية',
            ],
            [
                'nom_grade_fr' => 'ADMINISTRATEUR 3° GRADE',
                'nom_grade_ar' => 'متصرف الدرجة الثالتة',
            ],
            [
                'nom_grade_fr' => 'ADMINISTRATEUR ADJOINT',
                'nom_grade_ar' => 'متصرف مساعد',
            ],
            [
                'nom_grade_fr' => 'ADMINISTRATEUR PRINCIPAL',
                'nom_grade_ar' => 'متصرف ممتاز',
            ],
            [
                'nom_grade_fr' => 'INGENIEUR D\'ETAT 1° GRADE',
                'nom_grade_ar' => 'مهندس دولة من الدرجة الأولى',
            ],
            [
                'nom_grade_fr' => 'MEDECIN 1° GRADE',
                'nom_grade_ar' => 'طبيب من الدرجة الأولى',
            ],
            [
                'nom_grade_fr' => 'REDACTEUR 1° GRADE',
                'nom_grade_ar' => 'محرر من الدرجة الأولى',
            ],
            [
                'nom_grade_fr' => 'REDACTEUR 2° GRADE',
                'nom_grade_ar' => 'محرر من الدرجة الثانية',
            ],
            [
                'nom_grade_fr' => 'REDACTEUR 3° GRADE',
                'nom_grade_ar' => 'محرر من الدرجة الثالتة',
            ],
            [
                'nom_grade_fr' => 'REDACTEUR 4° GRADE',
                'nom_grade_ar' => 'محرر من الدرجة الرابعة',
            ],
        ];

        foreach ($grades as $grades) {
            DB::table('grades')->insert($grades);
        }


    }
}
