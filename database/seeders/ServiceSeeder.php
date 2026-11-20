<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'Індивідуальна консультація',
            'duration' => '60 хв',
            'summary' => 'Зустріч для обговорення вашого запиту, переживань і ситуацій, які зараз турбують. Разом визначаємо можливий напрям подальшої роботи.',
            'price' => 50,
            'booking_url' => 'https://cal.com/yuliia-tkachenko-a6atx2/individual-consultation',
        ]);
        Service::create([
            'title' => 'Сімейне консультування',
            'duration' => '90 хв',
            'summary' => 'Простір для спільного обговорення труднощів у стосунках, потреб членів сім’ї та можливих кроків до кращого взаєморозуміння.',
            'price' => 75,
            'booking_url' => 'https://cal.com/yuliia-tkachenko-a6atx2/family-counseling',
        ]);
        Service::create([
            'title' => 'Арт-терапевтична сесія',
            'duration' => '90 хв',
            'summary' => 'Творчі методи допомагають дослідити переживання та поглянути на запит через образи й асоціації.',
            'price' => 60,
            'booking_url' => 'https://cal.com/yuliia-tkachenko-a6atx2/art-therapy-session',
        ]);
        Service::create([
            'title' => 'Практика ВВМ',
            'duration' => '75 хв',
            'summary' => 'Сесія з дихальними практиками для стабілізації стану та відновлення контакту з власними відчуттями.',
            'price' => 60,
            'booking_url' => 'https://cal.com/yuliia-tkachenko-a6atx2/practice-bbm',

        ]);
        Service::create([
            'title' => 'Фінансово-психологічно тренінг-гра "Psychology of money"',
            'subtitle' => 'Індивідуальний формат гри',
            'duration' => 'до 2 год',
            'summary' => 'Тренінг-гра для дослідження власних звичок, переконань і рішень, пов’язаних із грошима.',
            'price' => 75,
            'booking_url' => 'https://cal.com/yuliia-tkachenko-a6atx2/psychology-of-money-individual',
        ]);
        Service::create([
            'title' => 'Фінансово-психологічно тренінг-гра "Psychology of money"',
            'subtitle' => 'Груповий формат гри',
            'duration' => 'до 4 год',
            'summary' => 'Тренінг-гра для дослідження власних звичок, переконань і рішень, пов’язаних із грошима.',
            'price' => 50,
            'price_note' => '( з учасника )',
            'booking_url' => 'https://cal.com/yuliia-tkachenko-a6atx2/psychology-of-money-group',
        ]);
        Service::create([
            'title' => 'Сесія - дослідження особистості ',
            'duration' => '90 хв',
            'summary' => 'Зустріч для дослідження індивідуальних особливостей, цінностей і сильних сторін.',
            'price' => 60,
            'booking_url' => 'https://cal.com/yuliia-tkachenko-a6atx2/personality-assessment-session',
        ]);
        Service::create([
            'title' => 'Профорієнтаційна консультація - дослідження',
            'duration' => '60 хв',
            'summary' => 'Допомагає дослідити інтереси, схильності та сильні сторони, щоб окреслити професійні напрями для подальшого розгляду.',
            'price' => 55,
            'booking_url' => 'https://cal.com/yuliia-tkachenko-a6atx2/career-guidance-consultation',
        ]);
    }
}
