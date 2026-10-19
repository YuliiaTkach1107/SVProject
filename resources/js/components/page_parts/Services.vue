<script setup lang="ts">
import { computed, ref } from 'vue';
import { ChevronDown } from '@lucide/vue';

type ServiceDetail = {
    id: number;
    title: string;
    subtitle?: string;
    duration?: string;
    summary?: string;
    description?: string;
    price?: string;
    price_note?: string;
    booking_url?: string;
};

const servicesData: ServiceDetail[] = [
    {
        id: 1,
        title: 'Індивідуальна консультація',
        duration: '60 хв',
        summary:
            'Зустріч для обговорення вашого запиту, переживань і ситуацій, які зараз турбують. Разом визначаємо можливий напрям подальшої роботи.',
        price: '50€',
        booking_url:
            'https://cal.com/yuliia-tkachenko-a6atx2/individual-consultation',
    },
    {
        id: 2,
        title: 'Сімейне консультування',
        duration: '90 хв',
        summary:
            'Простір для спільного обговорення труднощів у стосунках, потреб членів сім’ї та можливих кроків до кращого взаєморозуміння.',
        price: '75€',
        booking_url:
            'https://cal.com/yuliia-tkachenko-a6atx2/family-counseling',
    },
    {
        id: 3,
        title: 'Арт-терапевтична сесія',
        duration: '90 хв',
        summary:
            'Творчі методи допомагають дослідити переживання та поглянути на запит через образи й асоціації.',
        price: '60€',
        booking_url:
            'https://cal.com/yuliia-tkachenko-a6atx2/art-therapy-session',
    },
    {
        id: 4,
        title: 'Практика ВВМ',
        duration: '75 хв',
        summary:
            'Сесія з дихальними практиками для стабілізації стану та відновлення контакту з власними відчуттями.',
        price: '60€',
        booking_url: 'https://cal.com/yuliia-tkachenko-a6atx2/practice-bbm',
    },
    {
        id: 5,
        title: 'Фінансово-психологічно тренінг-гра "Psychology of money"',
        subtitle: 'Індивідуальний формат гри',
        duration: 'до 2 год',
        summary:
            'Тренінг-гра для дослідження власних звичок, переконань і рішень, пов’язаних із грошима.',
        price: '75€',
        booking_url:
            'https://cal.com/yuliia-tkachenko-a6atx2/psychology-of-money-individual',
    },
    {
        id: 6,
        title: 'Фінансово-психологічно тренінг-гра "Psychology of money"',
        subtitle: 'Груповий формат гри',
        duration: 'до 4 год',
        summary:
            'Тренінг-гра для дослідження власних звичок, переконань і рішень, пов’язаних із грошима.',
        price: '50€',
        price_note: '( з учасника )',
        booking_url:
            'https://cal.com/yuliia-tkachenko-a6atx2/psychology-of-money-group',
    },
    {
        id: 7,
        title: 'Сесія - дослідження особистості ',
        duration: '90 хв',
        summary:
            'Зустріч для дослідження індивідуальних особливостей, цінностей і сильних сторін.',
        price: '60€',
        booking_url:
            'https://cal.com/yuliia-tkachenko-a6atx2/personality-assessment-session',
    },
    {
        id: 8,
        title: 'Профорієнтаційна консультація - дослідження',
        duration: '60 хв',
        summary:
            'Допомагає дослідити інтереси, схильності та сильні сторони, щоб окреслити професійні напрями для подальшого розгляду.',
        price: '55€',
        booking_url:
            'https://cal.com/yuliia-tkachenko-a6atx2/career-guidance-consultation',
    },
];

const groupedServices = computed<Record<string, ServiceDetail[]>>(() => {
    const result: Record<string, ServiceDetail[]> = {};

    servicesData.forEach((detail) => {
        if (!result[detail.title]) {
            result[detail.title] = [];
        }

        result[detail.title].push(detail);
    });

    return result;
});

const expandedServiceIds = ref<number[]>([]);

const toggleServiceDetails = (id: number): void => {
    expandedServiceIds.value = expandedServiceIds.value.includes(id)
        ? expandedServiceIds.value.filter((expandedId) => expandedId !== id)
        : [...expandedServiceIds.value, id];
};
</script>

<template>
    <section
        id="services_section"
        aria-labelledby="services-heading"
        class="align-center relative min-h-screen bg-[var(--bg-primary)]/30 py-15"
    >
        <div class="flex flex-col">
            <span>ПОСЛУГИ</span>
            <h2 id="services-heading" class="text-[var(--text-primary)]">
                Ви можете обрати ...
            </h2>
            <div class="m-auto mt-5 flex w-[100%] flex-col gap-4 lg:w-[90%]">
                <div
                    v-for="(details, title) in groupedServices"
                    :key="title"
                    class="rounded-lg border border-[var(--border-primary)] p-6 shadow-md transition-shadow hover:shadow-lg"
                >
                    <div
                        v-if="details.length === 1 && !details[0].subtitle"
                        class="md:hidden"
                    >
                        <h3>{{ title }}</h3>
                        <div class="mt-4 flex items-center justify-around">
                            <button
                                type="button"
                                class="inline-flex items-center gap-1.5 rounded-full border border-[var(--border-secondary)]/50 px-3 py-2 text-sm font-medium text-[var(--text-secondary)] transition-colors hover:bg-[var(--bg-menu)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[var(--border-secondary)]"
                                :aria-label="`${expandedServiceIds.includes(details[0].id) ? 'Згорнути деталі' : 'Показати деталі'}: ${title}`"
                                :aria-expanded="
                                    expandedServiceIds.includes(details[0].id)
                                "
                                :aria-controls="`service-details-mobile-${details[0].id}`"
                                @click="toggleServiceDetails(details[0].id)"
                            >
                                {{
                                    expandedServiceIds.includes(details[0].id)
                                        ? 'Згорнути'
                                        : 'Детальніше'
                                }}
                                <ChevronDown
                                    aria-hidden="true"
                                    class="size-4 transition-transform"
                                    :class="{
                                        'rotate-180':
                                            expandedServiceIds.includes(
                                                details[0].id,
                                            ),
                                    }"
                                />
                            </button>
                            <a
                                :href="details[0].booking_url || '#'"
                                target="_blank"
                                rel="noopener noreferrer"
                                :aria-label="`Записатися на послугу: ${title}`"
                                class="inline-flex items-center justify-center !rounded-full !bg-[var(--bg-button-primary)] !px-4 !py-2 !text-sm whitespace-nowrap !text-white"
                            >
                                Записатись
                            </a>
                        </div>
                        <div
                            v-show="expandedServiceIds.includes(details[0].id)"
                            :id="`service-details-mobile-${details[0].id}`"
                            class="mt-3 space-y-3 rounded-md bg-white/60 p-4"
                        >
                            <p
                                v-if="details[0].summary"
                                class="service-summary"
                            >
                                {{ details[0].summary }}
                            </p>
                            <p
                                v-if="details[0].description"
                                class="text-sm text-[var(--text-secondary)]"
                            >
                                {{ details[0].description }}
                            </p>
                            <dl
                                class="grid grid-cols-2 gap-y-2 border-t border-[var(--border-primary)]/20 pt-3 text-sm"
                            >
                                <template v-if="details[0].duration">
                                    <dt class="text-[var(--text-secondary)]">
                                        Тривалість
                                    </dt>
                                    <dd
                                        class="text-right text-[var(--text-primary)]"
                                    >
                                        {{ details[0].duration }}
                                    </dd>
                                </template>
                                <template v-if="details[0].price">
                                    <dt class="text-[var(--text-secondary)]">
                                        Вартість
                                    </dt>
                                    <dd
                                        class="text-right font-medium text-[var(--text-primary)]"
                                    >
                                        {{ details[0].price }}
                                        <span v-if="details[0].price_note">{{
                                            details[0].price_note
                                        }}</span>
                                    </dd>
                                </template>
                            </dl>
                        </div>
                    </div>

                    <div v-else class="space-y-4 md:hidden">
                        <h3>{{ title }}</h3>
                        <div
                            v-for="(detail, index) in details"
                            :key="detail.id"
                            :class="
                                index > 0 &&
                                'border-t border-[var(--border-primary)]/20 pt-4'
                            "
                        >
                            <h4 v-if="detail.subtitle">
                                {{ detail.subtitle }}
                            </h4>
                            <div
                                class="mt-4 flex items-center justify-between gap-3"
                            >
                                <button
                                    type="button"
                                    class="inline-flex items-center gap-1.5 rounded-full border border-[var(--border-secondary)]/50 px-3 py-2 text-sm font-medium text-[var(--text-secondary)] transition-colors hover:bg-[var(--bg-menu)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[var(--border-secondary)]"
                                    :aria-label="`${expandedServiceIds.includes(details[0].id) ? 'Згорнути деталі' : 'Показати деталі'}: ${title}`"
                                    :aria-expanded="
                                        expandedServiceIds.includes(
                                            details[0].id,
                                        )
                                    "
                                    :aria-controls="`service-details-mobile-${details[0].id}`"
                                    @click="toggleServiceDetails(details[0].id)"
                                >
                                    {{
                                        expandedServiceIds.includes(
                                            details[0].id,
                                        )
                                            ? 'Згорнути'
                                            : 'Детальніше'
                                    }}
                                    <ChevronDown
                                        aria-hidden="true"
                                        class="size-4 transition-transform"
                                        :class="{
                                            'rotate-180':
                                                expandedServiceIds.includes(
                                                    details[0].id,
                                                ),
                                        }"
                                    />
                                </button>
                                <a
                                    :href="detail.booking_url || '#'"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    :aria-label="`Записатися на послугу: ${title}${detail.subtitle ? ', ' + detail.subtitle : ''}`"
                                    class="inline-flex items-center justify-center !rounded-full !bg-[var(--bg-button-primary)] !px-4 !py-2 !text-sm whitespace-nowrap !text-white"
                                >
                                    Записатись
                                </a>
                            </div>
                            <div
                                v-show="expandedServiceIds.includes(detail.id)"
                                :id="`service-details-mobile-${detail.id}`"
                                class="mt-3 space-y-3 rounded-md bg-white/60 p-4"
                            >
                                <p
                                    v-if="detail.summary"
                                    class="service-summary"
                                >
                                    {{ detail.summary }}
                                </p>
                                <p
                                    v-if="detail.description"
                                    class="text-sm text-[var(--text-secondary)]"
                                >
                                    {{ detail.description }}
                                </p>
                                <dl
                                    class="grid grid-cols-2 gap-y-2 border-t border-[var(--border-primary)]/20 pt-3 text-sm"
                                >
                                    <template v-if="detail.duration">
                                        <dt
                                            class="text-[var(--text-secondary)]"
                                        >
                                            Тривалість
                                        </dt>
                                        <dd
                                            class="text-right text-[var(--text-primary)]"
                                        >
                                            {{ detail.duration }}
                                        </dd>
                                    </template>
                                    <template v-if="detail.price">
                                        <dt
                                            class="text-[var(--text-secondary)]"
                                        >
                                            Вартість
                                        </dt>
                                        <dd
                                            class="text-right font-medium text-[var(--text-primary)]"
                                        >
                                            {{ detail.price }}
                                            <span v-if="detail.price_note">{{
                                                detail.price_note
                                            }}</span>
                                        </dd>
                                    </template>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <table class="hidden w-full md:table">
                        <caption class="sr-only">
                            Послуга:
                            {{
                                title
                            }}
                        </caption>
                        <thead class="sr-only">
                            <tr>
                                <th scope="col">Послуга та тривалість</th>
                                <th scope="col">Вартість</th>
                                <th scope="col">Запис</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-if="
                                    details.length === 1 && !details[0].subtitle
                                "
                            >
                                <td class="flex-1">
                                    <h3>{{ title }}</h3>
                                    <p v-if="details[0].duration">
                                        {{ details[0].duration }}
                                    </p>
                                    <p
                                        v-if="details[0].summary"
                                        class="service-summary hidden md:block"
                                    >
                                        {{ details[0].summary }}
                                    </p>
                                </td>

                                <td class="w-50 text-center">
                                    <p
                                        v-if="details[0].price"
                                        class="!font-medium"
                                    >
                                        {{ details[0].price }}
                                    </p>
                                    <p v-if="details[0].price_note">
                                        {{ details[0].price_note }}
                                    </p>
                                </td>

                                <td class="w-60 text-center">
                                    <a
                                        :href="details[0].booking_url || '#'"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        :aria-label="`Записатися на послугу: ${title}`"
                                        class="inline-block bg-[var(--bg-button-primary)] text-white"
                                    >
                                        Записатись онлайн
                                    </a>
                                </td>
                            </tr>

                            <template v-else>
                                <tr>
                                    <td colspan="3" class="pb-3">
                                        <h3>{{ title }}</h3>
                                    </td>
                                </tr>

                                <tr
                                    v-for="(detail, index) in details"
                                    :key="detail.id"
                                    :class="
                                        index > 0 && 'border-t border-gray-100'
                                    "
                                >
                                    <td
                                        :class="['flex-1', index > 0 && 'pt-3']"
                                    >
                                        <h4 v-if="detail.subtitle">
                                            {{ detail.subtitle }}
                                        </h4>
                                        <p v-if="detail.duration">
                                            {{ detail.duration }}
                                        </p>
                                        <p
                                            v-if="
                                                detail.summary &&
                                                index === details.length - 1
                                            "
                                            class="service-summary hidden md:block"
                                        >
                                            {{ detail.summary }}
                                        </p>
                                    </td>

                                    <td
                                        :class="[
                                            'w-50 text-center',
                                            index > 0 && 'pt-3',
                                        ]"
                                    >
                                        <p
                                            v-if="detail.price"
                                            class="!font-medium"
                                        >
                                            {{ detail.price }}
                                        </p>
                                        <p v-if="detail.price_note">
                                            {{ detail.price_note }}
                                        </p>
                                    </td>

                                    <td
                                        :class="[
                                            'w-60 text-center',
                                            index > 0 && 'pt-3',
                                        ]"
                                    >
                                        <a
                                            :href="detail.booking_url || '#'"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            :aria-label="`Записатися на послугу: ${title}${detail.subtitle ? ', ' + detail.subtitle : ''}`"
                                            class="inline-block bg-[var(--bg-button-primary)] text-white"
                                        >
                                            Записатись онлайн
                                        </a>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>
