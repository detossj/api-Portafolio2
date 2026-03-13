<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\GithubRepo;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;

class PortfolioController extends Controller
{
    // Endpoint para la Navegación (Header)
    public function getNav()
    {
        return response()->json([
            ['label' => 'Inicio', 'href' => '#hero'],
            ['label' => 'Sobre mí', 'href' => '#about'],
            ['label' => 'Habilidades', 'href' => '#skills'],
            ['label' => 'Experiencia', 'href' => '#experience'],
            ['label' => 'Proyectos', 'href' => '#projects'],
            ['label' => 'Contacto', 'href' => '#contact']
        ]);
    }

    // Endpoint para la sección Hero (Inicio)
    public function getHero()
    {
        return response()->json([
            'greeting' => 'Hola, soy',
            'name' => 'Jorge Rubilar',
            'firstName' => 'Jorge',
            'lastName' => 'Rubilar',
            'title' => 'Estudiante de Ingeniería Civil Informática',
            'bio' => 'Apasionado por el desarrollo de software y la resolución de problemas. Combino una gran capacidad de autoaprendizaje con la facilidad para dominar nuevas herramientas y frameworks, adaptándome rápidamente a los desafíos técnicos de cada proyecto.',
            'githubUrl' => 'https://github.com/detossj'
        ]);
    }

    // Endpoint para la sección Sobre Mí
    public function getAbout()
    {
        return response()->json([
            'description' => 'Desarrollador de software y estudiante de Ingeniería Civil Informática con fuerte enfoque en ecosistemas web y móviles. Disfruto construyendo desde el backend e interfaces dinámicas, hasta aplicaciones nativas. Mi objetivo es integrarme a un equipo dinámico donde pueda aportar mi capacidad de autoaprendizaje y versatilidad para crear productos tecnológicos de alto impacto.',
            'avatar' => 'https://avatars.githubusercontent.com/detossj',
            'cards' => [
                [
                    'icon' => 'User', 
                    'title' => 'Perfil',
                    'text' => 'Desarrollador en formación'
                ],
                [
                    'icon' => 'GraduationCap', 
                    'title' => 'Formación',
                    'text' => '9° Semestre Ing. Civil Informática (UCSC)'
                ],
                [
                    'icon' => 'Code', 
                    'title' => 'Tecnologías',
                    'text' => 'Laravel, React y Kotlin (Android)'
                ]
            ]
        ]);
    }

    // Endpoint para la sección Experiencia
    public function getExperience()
    {
        $experiences = Experience::orderBy('id', 'desc')->get();

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
        return response()->json([
            'email' => 'jrubilar@ing.ucsc.cl',
            'phone' => '+56989088185',
            'github' => 'https://github.com/detossj',
            'linkedin' => null,
            'location' => 'Concepción, Chile'
        ]);
    }

    // Endpoint para la sección Footer
    public function getFooter()
    {
        return response()->json([
            'name' => 'Jorge Rubilar',
            'email' => 'jrubilar@ing.ucsc.cl',
            'githubUrl' => 'https://github.com/detossj',
            'shortBio' => 'Desarrollador Full Stack construyendo experiencias web y móviles.'
        ]);
    }

    // Endpoint para el Tema y Paleta de Colores
    public function getTheme()
    {
        return response()->json([
            'colors' => [
                'primary' => '#00ff88',       // Verde neón (Acentos principales)
                'secondary' => '#00d4ff',     // Azul (Gradientes y acentos secundarios)
                'background' => '#0a0a0b',    // Fondo principal de la app
                'surface' => '#1a1a1b',       // Fondo de tarjetas (Cards) y elementos
                'surfaceAlt' => '#0f0f10',    // Fondo alternativo (usado en About, Skills)
                'border' => '#27272a',        // Bordes
                'textPrimary' => '#e4e4e7',   // Texto principal (Blanco/Gris claro)
                'textSecondary' => '#a1a1aa', // Texto secundario (Gris medio)
                'textMuted' => '#71717a'      // Texto atenuado (Gris oscuro)
            ]
        ]);
    }
}