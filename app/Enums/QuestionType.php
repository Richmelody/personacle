<?php

namespace App\Enums;

enum QuestionType: string
{
    case TEMPERAMENT = "temperament";
    case PERSONALITY_TRAIT = "personality trait";

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function hashMap(bool $reverse = false): array
    {
        $array = array_combine(
            array_column(self::cases(), 'name'),
            array_column(self::cases(), 'value')
        );

        if ($reverse) {
            $array = array_combine(
                array_column(self::cases(), 'value'),
                array_column(self::cases(), 'name')
            );
        }

        return $array;
    }

    public static function getSubTypesByType(self|string $type)
    {
        $type = \is_string($type) ? $type : $type->value;

        $subtypes = [
            'temperament' => [
                'choleric',
                'sanguine',
                'phlegmatic',
                'melancholy'
            ],
            'personality trait' => [
                'openness to experience',
                'conscientiousness',
                'extraversion',
                'agreeableness',
                'neuroticism'
            ],
        ];

        return $subtypes[$type];
    }
}
