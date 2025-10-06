<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'HealthCare+ Medical Clinic',
                'slug' => 'healthcare-plus',
                'description' => 'Professional medical clinic template with appointment booking, services showcase, and contact forms. Perfect for clinics, hospitals, and healthcare providers.',
                'thumbnail_url' => null,
                'template_file' => 'template-one',
                'category' => 'medical',
                'views' => 1543,
            ],
            [
                'name' => 'CloudFlow SaaS Platform',
                'slug' => 'cloudflow-saas',
                'description' => 'Modern SaaS landing page with pricing plans, feature highlights, and testimonials. Ideal for software companies and tech startups.',
                'thumbnail_url' => null,
                'template_file' => 'template-two',
                'category' => 'saas',
                'views' => 2891,
            ],
            [
                'name' => 'Bella Cucina Restaurant',
                'slug' => 'bella-cucina',
                'description' => 'Elegant restaurant template featuring menu showcase, gallery, and reservation system. Perfect for restaurants, cafes, and food businesses.',
                'thumbnail_url' => null,
                'template_file' => 'template-three',
                'category' => 'restaurant',
                'views' => 1234,
            ],
        ];

        foreach ($templates as $template) {
            Template::create($template);
        }
    }
}
