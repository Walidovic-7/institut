<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;
use Illuminate\Support\Str;

class TrainingsSeeder extends Seeder
{
    public function run(): void
    {
        $trainings = [

            // =====================
            // LANGUES
            // =====================
            [
                'title' => 'Anglais Général',
                'domain' => 'Langues',
                'level' => 'Débutant',
                'duration_hours' => 40,
                'price' => 18000,
                'description' => 'Améliorez votre anglais à l’oral et à l’écrit.',
                'objectives' => 'Communiquer efficacement en anglais.',
                'program' => "Grammaire\nVocabulaire\nConversation\nCompréhension",
                'prerequisites' => 'Aucun',
                'certification' => 'Attestation de niveau',
                'is_featured' => true,
            ],
            [
                'title' => 'Français Professionnel',
                'domain' => 'Langues',
                'level' => 'Intermédiaire',
                'duration_hours' => 30,
                'price' => 15000,
                'description' => 'Maîtriser le français en milieu professionnel.',
                'objectives' => 'Rédiger et communiquer correctement.',
                'program' => "Rédaction\nCommunication\nVocabulaire pro",
                'prerequisites' => 'Bases en français',
                'certification' => 'Attestation',
                'is_featured' => false,
            ],

            // =====================
            // IT SUPPORT
            // =====================
            [
                'title' => 'IT Support / Helpdesk',
                'domain' => 'Informatique',
                'level' => 'Débutant',
                'duration_hours' => 35,
                'price' => 22000,
                'description' => 'Support informatique, maintenance et assistance utilisateurs.',
                'objectives' => 'Résoudre les problèmes informatiques courants.',
                'program' => "Hardware\nSoftware\nRéseaux\nSupport utilisateurs",
                'prerequisites' => 'Notions informatiques',
                'certification' => 'Certificat IT Support',
                'is_featured' => true,
            ],

            // =====================
            // BASE DE DONNÉES
            // =====================
            [
                'title' => 'Bases de données SQL',
                'domain' => 'Informatique',
                'level' => 'Intermédiaire',
                'duration_hours' => 30,
                'price' => 28000,
                'description' => 'Concevoir et manipuler des bases de données relationnelles.',
                'objectives' => 'Créer et gérer des bases de données.',
                'program' => "Modélisation\nSQL\nJointures\nIndex",
                'prerequisites' => 'Bases informatique',
                'certification' => 'Certificat SQL',
                'is_featured' => true,
            ],
            [
                'title' => 'MySQL & phpMyAdmin',
                'domain' => 'Informatique',
                'level' => 'Débutant',
                'duration_hours' => 25,
                'price' => 20000,
                'description' => 'Gestion de bases de données avec MySQL.',
                'objectives' => 'Administrer une base de données.',
                'program' => "CRUD\nSauvegardes\nSécurité",
                'prerequisites' => 'Aucun',
                'certification' => 'Attestation',
                'is_featured' => false,
            ],

            // =====================
            // MARKETING
            // =====================
            [
                'title' => 'Marketing Digital',
                'domain' => 'Marketing',
                'level' => 'Débutant',
                'duration_hours' => 30,
                'price' => 25000,
                'description' => 'Les bases du marketing digital et des réseaux sociaux.',
                'objectives' => 'Promouvoir une marque en ligne.',
                'program' => "SEO\nFacebook Ads\nGoogle Ads\nStratégie",
                'prerequisites' => 'Aucun',
                'certification' => 'Certificat Marketing Digital',
                'is_featured' => true,
            ],
            [
                'title' => 'Community Management',
                'domain' => 'Marketing',
                'level' => 'Intermédiaire',
                'duration_hours' => 20,
                'price' => 18000,
                'description' => 'Gérer et animer des communautés en ligne.',
                'objectives' => 'Développer une présence sur les réseaux.',
                'program' => "Stratégie\nContenu\nAnalyse",
                'prerequisites' => 'Bases réseaux sociaux',
                'certification' => 'Attestation',
                'is_featured' => false,
            ],
        ];

        foreach ($trainings as $t) {
            Training::updateOrCreate(
                ['title' => $t['title']],
                array_merge($t, [
                    'slug' => Str::slug($t['title']),
                ])
            );
        }
    }
}
