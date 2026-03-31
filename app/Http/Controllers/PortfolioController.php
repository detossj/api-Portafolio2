<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GithubRepo;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\NavItem;
use App\Models\AboutCard;

class PortfolioController extends Controller
{
    // Endpoint para la Navegación (Header)
    public function getNav()
    {
        $navs = NavItem::orderBy('order', 'asc')->get();
        
        return response()->json($navs->map(function ($n) {
            return [
                'label' => $n->label,
                'href' => $n->href
            ];
        }));
    }

    // Endpoint para la sección Hero (Inicio)
    public function getHero()
    {
        $p = Profile::first();
        if (!$p) return response()->json(['error' => 'Perfil no configurado'], 404);

        $nombres = explode(' ', $p->name);
        
        return response()->json([
            'greeting' => $p->hero_greeting,
            'name' => $p->name,
            'firstName' => $nombres[0] ?? '',
            'lastName' => isset($nombres[1]) ? implode(' ', array_slice($nombres, 1)) : '',
            'title' => $p->hero_title,
            'bio' => $p->hero_bio,
            'githubUrl' => $p->contact_github
        ]);
    }

    // Endpoint para la sección Sobre Mí
    public function getAbout()
    {
        $p = Profile::first();
        $cards = AboutCard::orderBy('order', 'asc')->get();

        if (!$p) return response()->json(['error' => 'Perfil no configurado'], 404);

        return response()->json([
            'description' => $p->about_description,
            'avatar' => $p->about_avatar,
            'cards' => $cards->map(function ($c) {
                return [
                    'icon' => $c->icon,
                    'title' => $c->title,
                    'text' => $c->text
                ];
            })
        ]);
    }

    // Endpoint para la sección Experiencia
    public function getExperience()
    {
        $experiences = Experience::orderBy('id', 'asc')->get();

        return response()->json($experiences->map(function ($e) {
            return [
                'id' => $e->id,
                'title' => $e->title,
                'company' => $e->company,
                'startDate' => $e->start_date,
                'endDate' => $e->end_date,
                'description' => $e->description,
                'technologies' => $e->technologies
            ];
        }));
    }

    // Endpoint para la sección Educación
    public function getEducation()
    {
        $educations = Education::orderBy('id', 'desc')->get();

        return response()->json($educations->map(function ($ed) {
            return [
                'id' => $ed->id,
                'degree' => $ed->degree,
                'institution' => $ed->institution,
                'status' => $ed->status,
                'startDate' => $ed->start_date,
                'endDate' => $ed->end_date,
                'description' => $ed->description
            ];
        }));
    }

    // Endpoint para la sección Habilidades
    public function getSkills()
    {
        $allSkills = Skill::all();
        
        $categories = [];
        $softSkills = [];

        foreach ($allSkills as $skill) {
            if ($skill->category === 'Soft Skills') {
                $softSkills[] = $skill->name;
            } else {
                $categories[$skill->category][] = [
                    'name' => $skill->name,
                    'icon' => $skill->icon
                ];
            }
        }

        return response()->json([
            'categories' => $categories,
            'soft_skills' => $softSkills
        ]);
    }

    // Endpoint para la sección Proyectos
    public function getProjects()
    {
        $projects = Project::all();
        
        $githubRepos = GithubRepo::all();

        return response()->json([
            'featured' => $projects->map(function ($p) {
                return [
                    'id' => $p->id,
                    'title' => $p->title,
                    'description' => $p->description,
                    'image' => $p->image,
                    'technologies' => $p->technologies, 
                    'githubUrl' => $p->github_url,
                    'liveUrl' => $p->liveUrl,
                    'featured' => (bool) $p->featured,
                    'category' => $p->category
                ];
            }),
            'github' => $githubRepos->map(function ($g) {
                return [
                    'id' => 'gh' . $g->id, 
                    'name' => $g->name,
                    'description' => $g->description,
                    'stars' => $g->stars,
                    'language' => $g->language,
                    'url' => $g->url
                ];
            })
        ]);
    }

    // Endpoint para la sección Contacto
    public function getContact()
    {
        $p = Profile::first();
        if (!$p) return response()->json(['error' => 'Perfil no configurado'], 404);

        return response()->json([
            'email' => $p->contact_email,
            'phone' => $p->contact_phone,
            'github' => $p->contact_github,
            'linkedin' => $p->contact_linkedin,
            'location' => $p->contact_location
        ]);
    }

    // Footer
    public function getFooter()
    {
        $p = Profile::first();
        if (!$p) return response()->json(['error' => 'Perfil no configurado'], 404);

        return response()->json([
            'name' => $p->name,
            'email' => $p->contact_email,
            'githubUrl' => $p->contact_github,
            'shortBio' => $p->footer_short_bio
        ]);
    }

    // Endpoint para el Tema y Paleta de Colores
    public function getTheme()
    {
        $p = Profile::first();
        if (!$p) return response()->json(['error' => 'Perfil no configurado'], 404);

        return response()->json([
            'colors' => $p->theme_colors
        ]);
    }

    public function getAllData()
    {

        $profile = Profile::first();
        $navs = NavItem::orderBy('order', 'asc')->get();
        $cards = AboutCard::orderBy('order', 'asc')->get();
        $experiences = Experience::orderBy('id', 'asc')->get();
        $educations = Education::orderBy('id', 'desc')->get();
        $allSkills = Skill::all();
        $projects = Project::all();
        $githubRepos = GithubRepo::all();

        $nombres = $profile ? explode(' ', $profile->name) : [];

        $categories = [];
        $softSkills = [];
        foreach ($allSkills as $skill) {
            if ($skill->category === 'Soft Skills') {
                $softSkills[] = $skill->name;
            } else {
                $categories[$skill->category][] = [
                    'name' => $skill->name,
                    'icon' => $skill->icon
                ];
            }
        }

        return response()->json([
            'nav' => $navs->map(fn($n) => ['label' => $n->label, 'href' => $n->href]),
            
            'hero' => $profile ? [
                'greeting' => $profile->hero_greeting,
                'name' => $profile->name,
                'firstName' => $nombres[0] ?? '',
                'lastName' => isset($nombres[1]) ? implode(' ', array_slice($nombres, 1)) : '',
                'title' => $profile->hero_title,
                'bio' => $profile->hero_bio,
                'githubUrl' => $profile->contact_github
            ] : null,

            'about' => $profile ? [
                'description' => $profile->about_description,
                'avatar' => $profile->about_avatar,
                'cards' => $cards->map(fn($c) => ['icon' => $c->icon, 'title' => $c->title, 'text' => $c->text])
            ] : null,

            'experience' => $experiences->map(fn($e) => [
                'id' => $e->id, 'title' => $e->title, 'company' => $e->company,
                'startDate' => $e->start_date, 'endDate' => $e->end_date,
                'description' => $e->description, 'technologies' => $e->technologies
            ]),

            'education' => $educations->map(fn($ed) => [
                'id' => $ed->id, 'degree' => $ed->degree, 'institution' => $ed->institution,
                'status' => $ed->status, 'startDate' => $ed->start_date,
                'endDate' => $ed->end_date, 'description' => $ed->description
            ]),

            'skills' => [
                'categories' => $categories,
                'soft_skills' => $softSkills
            ],

            'projects' => [
                'featured' => $projects->map(fn($p) => [
                    'id' => $p->id, 'title' => $p->title, 'description' => $p->description,
                    'image' => $p->image, 'technologies' => $p->technologies, 
                    'githubUrl' => $p->github_url, 'liveUrl' => $p->liveUrl,
                    'featured' => (bool) $p->featured, 'category' => $p->category
                ]),
                'github' => $githubRepos->map(fn($g) => [
                    'id' => 'gh' . $g->id, 'name' => $g->name, 'description' => $g->description,
                    'stars' => $g->stars, 'language' => $g->language, 'url' => $g->url
                ])
            ],

            'contact' => $profile ? [
                'email' => $profile->contact_email, 'phone' => $profile->contact_phone,
                'github' => $profile->contact_github, 'linkedin' => $profile->contact_linkedin,
                'location' => $profile->contact_location
            ] : null,

            'footer' => $profile ? [
                'name' => $profile->name, 'email' => $profile->contact_email,
                'githubUrl' => $profile->contact_github, 'shortBio' => $profile->footer_short_bio
            ] : null,

            'theme' => $profile ? ['colors' => $profile->theme_colors] : null
        ]);
    }

    public function downloadCv()
    {
        $filePath = public_path('mi_cv.pdf');

        // Verificar si el archivo existe
        if (!file_exists($filePath)) {
            return response()->json(['message' => 'Archivo no encontrado'], 404);
        }

        // Retornar el archivo como descarga
        return response()->download($filePath, 'JorgeRubilar_CV.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}