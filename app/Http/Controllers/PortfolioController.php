<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    // Endpoint para la sección Habilidades
    public function getSkills()
    {
        return response()->json([
            'categories' => [
                'Frontend' => [
                    ['name' => 'React', 'icon' => 'FileCode2'], 
                    ['name' => 'Tailwind CSS', 'icon' => 'Palette'],
                    ['name' => 'HTML/CSS', 'icon' => 'LayoutTemplate']
                ],
                'Backend' => [
                    ['name' => 'Laravel', 'icon' => 'Server'],
                    ['name' => 'Express.js', 'icon' => 'TerminalSquare'],
                    ['name' => 'MySQL', 'icon' => 'Database']
                ],
                'Mobile' => [
                    ['name' => 'Kotlin (Android)', 'icon' => 'Smartphone'],
                    ['name' => 'Android Studio', 'icon' => 'Smartphone']
                ],
                'Herramientas' => [
                    ['name' => 'Git', 'icon' => 'Code'],
                    ['name' => 'Postman', 'icon' => 'Send']
                ]
            ],
            'soft_skills' => [
                'Aprendizaje Autodidacta',
                'Trabajo en equipo',
                'Adaptabilidad',
                'Pensamiento Analítico',
                'Resolución de problemas'
            ]
        ]);
    }

    // Endpoint para la sección Educación
    public function getEducation()
    {
        return response()->json([
            [
                'id' => 1,
                'degree' => 'Ingeniería Civil Informática',
                'institution' => 'Universidad Católica de la Santísima Concepción (UCSC)',
                'status' => 'En curso',
                'startDate' => '2022',
                'endDate' => 'Presente',
                'description' => 'Formación integral en desarrollo de software, bases de datos, algoritmos y estructuras de datos, ingeniería de software y desarrollo multiplataforma.'
            ]
        ]);
    }

    // Endpoint para la sección Experiencia
    public function getExperience()
    {
        return response()->json([
            [
                'id' => 1,
                'title' => 'Ingeniero Civil Informático en Formación',
                'company' => 'Proyectos Académicos',
                'startDate' => '2022',
                'endDate' => 'Presente',
                'description' => 'Desarrollo de consola y móviles como parte de la formación universitaria. Implementación de soluciones utilizando  C, C#, C++, PostgreSQL, Laravel y Kotlin.',
                'technologies' => ['C', 'C#', 'C++', 'PostreSQL', 'Laravel', 'Kotlin']
            ],
            [
                'id' => 2,
                'title' => 'Desarrollador Full Stack & Móvil Autodidacta',
                'company' => 'Desarrollo Independiente',
                'startDate' => '2024',
                'endDate' => 'Presente',
                'description' => 'Diseño y desarrollo de aplicaciones web y móviles. Construcción de plataformas de gestión (como sistemas para el sector gastronómico) y herramientas de seguimiento de datos, implementando una arquitectura basada en el patrón MVC. Creación de APIs robustas con Laravel, interfaces de usuario dinámicas con React y desarrollo de aplicaciones nativas para Android utilizando Kotlin.',
                'technologies' => ['Laravel', 'React', 'Kotlin', 'API REST', 'MVC', 'Bootstrap']
            ],
            [
                'id' => 4,
                'title' => 'Practicante en Desarrollo TI',
                'company' => 'Casino Marina del Sol - Talcahuano',
                'startDate' => 'Enero 2026',
                'endDate' => 'Febrero 2026', 
                'description' => 'Desarrollo de soluciones web enfocadas en la optimización de procesos internos. Creación de interfaces de usuario interactivas, modernas y responsivas utilizando React y Tailwind CSS.',
                'technologies' => ['React', 'Express.js', 'Tailwind CSS', 'API REST']
            ]
        ]);
    }

    // Endpoint para la sección Proyectos
    public function getProjects()
    {
        return response()->json([
            'featured' => [
                [
                    'id' => 1,
                    'title' => 'Sistema de Gestión Académica',
                    'description' => 'Aplicación web completa para gestión de estudiantes, cursos y calificaciones. Implementada con Laravel en el backend y React en el frontend.',
                    'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&h=600&fit=crop',
                    'technologies' => ['Laravel', 'React', 'MySQL', 'Tailwind CSS'],
                    'githubUrl' => 'https://github.com/detossj',
                    'liveUrl' => null,
                    'featured' => true,
                    'category' => 'Web'
                ],
                [
                    'id' => 2,
                    'title' => 'App Móvil de Tareas',
                    'description' => 'Aplicación nativa Android desarrollada en Kotlin para gestión de tareas con recordatorios, categorías y sincronización local.',
                    'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&h=600&fit=crop',
                    'technologies' => ['Kotlin', 'Android Studio', 'Room Database', 'Material Design'],
                    'githubUrl' => 'https://github.com/detossj',
                    'liveUrl' => null,
                    'featured' => true,
                    'category' => 'Mobile'
                ],
                [
                    'id' => 3,
                    'title' => 'API RESTful con Laravel',
                    'description' => 'Backend robusto con autenticación JWT, manejo de relaciones complejas y documentación con Swagger.',
                    'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&h=600&fit=crop',
                    'technologies' => ['Laravel', 'PostgreSQL', 'JWT', 'Swagger'],
                    'githubUrl' => 'https://github.com/detossj',
                    'liveUrl' => null,
                    'featured' => true,
                    'category' => 'Backend'
                ],
                [
                    'id' => 4,
                    'title' => 'Portfolio Interactivo',
                    'description' => 'Sitio web personal desarrollado con React, diseño responsive y animaciones modernas.',
                    'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop',
                    'technologies' => ['React', 'Tailwind CSS', 'Framer Motion'],
                    'githubUrl' => 'https://github.com/detossj',
                    'liveUrl' => 'https://jorgerubilar.dev',
                    'featured' => false,
                    'category' => 'Web'
                ]
            ],
            'github' => [
                [
                    'id' => 'gh1',
                    'name' => 'portfolio-react',
                    'description' => 'Portfolio personal desarrollado con React y Tailwind CSS',
                    'stars' => 12,
                    'language' => 'JavaScript',
                    'url' => 'https://github.com/detossj'
                ],
                [
                    'id' => 'gh2',
                    'name' => 'laravel-api-boilerplate',
                    'description' => 'Template para APIs REST con Laravel, JWT y mejores prácticas',
                    'stars' => 8,
                    'language' => 'PHP',
                    'url' => 'https://github.com/detossj'
                ],
                [
                    'id' => 'gh3',
                    'name' => 'kotlin-todo-app',
                    'description' => 'Aplicación de tareas nativa para Android con arquitectura MVVM',
                    'stars' => 5,
                    'language' => 'Kotlin',
                    'url' => 'https://github.com/detossj'
                ]
            ]
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