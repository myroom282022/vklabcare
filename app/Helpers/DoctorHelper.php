<?php

if (!function_exists('getDoctorDegrees')) {
    function getDoctorDegrees()
    {
        return [
            'MD' => 'Doctor of Medicine',
            'DO' => 'Doctor of Osteopathic Medicine',
            'MBBS' => 'Bachelor of Medicine, Bachelor of Surgery',
            'MBChB' => 'Bachelor of Medicine and Bachelor of Surgery',
            'BMed' => 'Bachelor of Medicine',
            'BDS' => 'Bachelor of Dental Surgery',
            'DDS' => 'Doctor of Dental Surgery',
            'PhD' => 'Doctor of Philosophy in Medicine',
            'DMD' => 'Doctor of Dental Medicine',
            'DVM' => 'Doctor of Veterinary Medicine',
            'PharmD' => 'Doctor of Pharmacy',
            'DNP' => 'Doctor of Nursing Practice',
            'DC' => 'Doctor of Chiropractic',
            'DPT' => 'Doctor of Physical Therapy',
            'OD' => 'Doctor of Optometry',
            'PsyD' => 'Doctor of Psychology',
            'EdD' => 'Doctor of Education',
            'DSc' => 'Doctor of Science',
            // Add more degrees as needed
        ];
    }
}

if (!function_exists('getMedicalSpecializations')) {
    function getMedicalSpecializations()
    {
        return [
            'Cardiology (Heart)',
            'Ophthalmology (Eyes)',
            'Otolaryngology (Ear, Nose, and Throat)',
            'Neurology (Nervous System)',
            'Orthopedics (Musculoskeletal System)',
            'Dermatology (Skin)',
            'Gastroenterology (Digestive System)',
            'Oncology (Cancer)',
            'Pediatrics (Children\'s Health)',
            'Obstetrics and Gynecology (Women\'s Health)',
            'Urology (Urinary System)',
            'Psychiatry (Mental Health)',
            'Endocrinology (Hormones)',
            'Pulmonology (Respiratory System)',
            'Rheumatology (Joints and Connective Tissues)',
            'Nephrology (Kidneys)',
            'Hematology (Blood)',
            'Infectious Diseases',
            'Allergy and Immunology',
            'Emergency Medicine',
        ];
    }
}
