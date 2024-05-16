<?php

return [
    'title' => [
        'generateroutine' => 'Generar Rutina',
    ],
    'subtitle' => [
        'generateroutine' => 'Generación de Rutina Usando OpenAI',
    ],
    'prompt' => [
        'intro' => 'Crea una rutina de ejercicios personalizada. No extiendas la respuesta, mantenla corta y usa no más de 1000 caracteres, basada en las siguientes especificaciones:',
        'user_info' => "Nombre del usuario: :name\nEdad del usuario: :age\nPeso del usuario: :weight\nAltura del usuario: :height\nGénero del usuario: :gender",
        'training_info' => "Contexto de entrenamiento: :name\nTiempo disponible: :time minutos\nLugar de entrenamiento: :place\nFrecuencia de entrenamiento: :frequency veces por semana\nObjetivos de entrenamiento: :objectives\nEspecificaciones de entrenamiento: :specifications",
        'exercises' => 'Ejercicios disponibles:'
    ],
    'routine' => [
        'generated_name' => 'Rutina generada por OpenAI'
    ],
    'button' => [
        'generateroutine' => 'Generar Rutina'
    ]
];
