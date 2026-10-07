<script setup lang="ts">
import { computed } from 'vue';

type ServiceDetail = {
    id: number;
    title: string;
    subtitle?: string;
    duration?: string;
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
        price: '50€',
        booking_url: '#',
    },
    {
        id: 2,
        title: 'Сімейне консультування',
        duration: '90 хв',
        price: '75€',
        booking_url: '#',
    },
    {
        id: 3,
        title: 'Арт-терапевтична сесія',
        duration: '90 хв',
        price: '60€',
        booking_url: '#',
    },
    {
        id: 4,
        title: 'Практика ВВМ',
        duration: '75 хв',
        description: '(дихальні практики на стабілізацію стану)',
        price: '60€',
        booking_url: '#',
    },
    {
        id: 5,
        title: 'Фінансово-психологічно тренінг-гра "Psychology of money"',
        subtitle: 'Індивідуальний формат гри',
        duration: 'до 2 год',
        price: '75€',
        booking_url: '#',
    },
    {
        id: 6,
        title: 'Фінансово-психологічно тренінг-гра "Psychology of money"',
        subtitle: 'Груповий формат гри',
        duration: 'до 4 год',
        price: '50€',
        price_note: '( з учасника )',
        booking_url: '#',
    },
    {
        id: 7,
        title: 'Сесія - дослідження особистості ',
        duration: '90 хв',
        price: '60€',
        booking_url: '#',
    },
    {
        id: 8,
        title: 'Профорієнтаційна консультація - дослідження',
        duration: '60 хв',
        price: '55€',
        booking_url: '#',
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
</script>

<template>
    <section
        id="services_section"
        class="relative min-h-screen align-center bg-[var(--bg-primary)]/30 py-15"
    >
        <div class="flex flex-col">
            <span>ПОСЛУГИ</span>
            <h2 class="text-[var(--text-primary)]">Ви можете обрати ...</h2>
            <div class="m-auto mt-5 flex w-[90%] flex-col gap-4">
                <div
                    v-for="(details, title) in groupedServices"
                    :key="title"
                    class="rounded-lg border border-[var(--border-primary)] p-6 shadow-md transition-shadow hover:shadow-lg"
                >
                    <table class="w-full">
                        <tbody>
                            <tr v-if="details.length === 1 && !details[0].subtitle">
                                <td class="flex-1">
                                    <h3>{{ title }}</h3>
                                    <p v-if="details[0].duration">
                                        {{ details[0].duration }}
                                    </p>
                                    <p v-if="details[0].description">
                                        {{ details[0].description }}
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
                                    :class="index > 0 && 'border-t border-gray-100'"
                                >
                                    <td
                                        :class="[
                                            'flex-1',
                                            index > 0 && 'pt-3',
                                        ]"
                                    >
                                        <h4 v-if="detail.subtitle">
                                            {{ detail.subtitle }}
                                        </h4>
                                        <p v-if="detail.duration">
                                            {{ detail.duration }}
                                        </p>
                                        <p v-if="detail.description">
                                            {{ detail.description }}
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
