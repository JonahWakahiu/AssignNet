<?php
return [
    'levels' => [
        'College',
        'Undergraduate',
        'Masters',
        'PhD'
    ],
    'paperTypes' => [
        'Research Paper',
        'Essay',
        'Report',
        'Case Study',
        'Literature Review',
        'Thesis/Dissertation',
        'Annoted Bibliography',
        'Team Paper',
        'Reflective Paper',
        'Business Plan',
        'White Paper',
        'Proposal',
        'Creative Writing',
        'Lab Report'
    ],
    'disciplines' => [
        'Arts',
        'Biology',
        'Business',
        'Chemistry',
        'Childcare',
        'Computers',
        'Criminology',
        'Education',
        'Economics',
        'Engineering',
        'Environmenatl Studies',
        'Ethics',
        'Ethinic Studies',
        'Finance',
        'Food Nutrition',
        'Geography',
        'Health Care',
        'History',
        'Law',
        'Linguistics',
        'Literature',
        'Management',
        'Mathematics',
        'Medicine',
        'Music',
        'Nursing',
        'Philosophy',
        'Physical Education',
        'Physics',
        'Political Science',
        'Programming',
        'Psycology',
        'Religion',
        'Sociology',
        'Statistics'
    ],

    'deadline' => [
        '6 hours',
        '12 hours',
        '24 hours',
        '48 hours',
        '3 days',
        '5 days',
        '7 days'
    ],
    'categories' => [
        'Standard',
        'Premium',
        'Platinum',
    ],
    'currency' => [
        'USD',
        'Pound Sterling',
        'Eur',
        'Australia dolar (AUD)',
    ],
    'currencyMultipliers' => [
        'USD' => 1.0,
        'Pound Sterling' => 0.78,
        'Eur' => 0.92,
        'Australia dolar (AUD)' => 1.54,
    ],

    'currencySymbols' => [
        'USD' => '$',
        'Pound Sterling' => '£',
        'Eur' => '€',
        'Australia dolar (AUD)' => 'A$',
    ],

    // prices
    'basePrices' => [
        'College' => 20,
        'Undergraduate' => 25,
        'Masters' => 30,
        'PhD' => 35,
    ],

    // Additional cost per page
    'pricePerPage' => 5,

    // Urgency multipliers
    'urgencyMultipliers' => [
        '6 hours' => 2.0,
        '12 hours' => 1.75,
        '24 hours' => 1.5,
        '48 hours' => 1.25,
        '3 days' => 1.1,
        '5 days' => 1.05,
        '7 days' => 1.0,
    ],

    // Writer category multipliers
    'writerCategoryMultipliers' => [
        'Standard' => 1.0,
        'Premium' => 1.2,
        'Platinum' => 1.5,
    ],

];
