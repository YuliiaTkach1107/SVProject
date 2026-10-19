<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';
import MainLayout from '@/layouts/MainLayout/MainLayout.vue';
import { Clock, MoveRight, MoveLeft } from '@lucide/vue';
import { Link } from '@inertiajs/vue3';

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
const hasAgreed = ref(false);

const selectedService = ref<ServiceDetail | null>(null);
const selectService = (service: ServiceDetail) => {
    selectedService.value = service;
    hasAgreed.value = false;
};
const continueToBooking = () => {
    const bookingUrl = selectedService.value?.booking_url;

    if (!hasAgreed.value || !bookingUrl) {
        return;
    }
    window.location.href = bookingUrl;
};
const resetSelection = () => {
    selectedService.value = null;
    hasAgreed.value = false;
};
onMounted(() => {
    window.addEventListener('pageshow', resetSelection);
});

onUnmounted(() => {
    window.removeEventListener('pageshow', resetSelection);
});
</script>

<template>
    <MainLayout>
        <section
            id="booking_section"
            class="bg-[var(--bg-menu)] !pt-26 text-center md:!pt-30 lg:!pt-36"
        >
            <span>ОНЛАЙН-ЗАПИС</span>
            <h1 class="booking text-[var(--text-primary)]">
                Оберіть послугу для запису
            </h1>
            <p>
                Оберіть формат консультації, щоб переглянути доступні дати та
                час.
            </p>

            <div class="mx-auto mt-8 max-w-4xl text-left">
                <ul
                    class="grid gap-3 md:hidden"
                    aria-label="Послуги для онлайн-запису"
                >
                    <li
                        v-for="service in servicesData"
                        :key="service.id"
                        class="rounded-2xl border border-[var(--border-secondary)]/20 bg-white/70 p-4 shadow-sm transition-colors"
                    >
                        <div class="text-left">
                            <h2
                                class="m-0 text-lg font-medium text-[var(--text-primary)]"
                            >
                                {{ service.title }}
                            </h2>
                            <p
                                v-if="service.subtitle"
                                class="mt-1 text-sm text-[var(--text-secondary)]"
                            >
                                {{ service.subtitle }}
                            </p>
                            <p
                                v-if="service.duration"
                                class="mt-2 text-sm text-[var(--text-secondary)]"
                            >
                                Тривалість: {{ service.duration }}
                            </p>
                        </div>

                        <div
                            class="mt-4 flex items-center justify-between gap-3 border-t border-[var(--border-secondary)]/20 pt-3"
                        >
                            <p
                                class="min-w-0 text-left font-medium text-[var(--text-primary)]"
                            >
                                <span
                                    class="block text-lg !text-[var(--text-primary)]"
                                    >{{ service.price }}</span
                                >
                                <span
                                    v-if="service.price_note"
                                    class="block text-xs font-normal text-[var(--text-primary)]"
                                >
                                    {{ service.price_note }}
                                </span>
                            </p>
                            <a
                                :href="service.booking_url || '#'"
                                target="_blank"
                                rel="noopener noreferrer"
                                :aria-label="`Обрана послуга: ${service.title}`"
                                @click.prevent="selectService(service)"
                                type="button"
                                class="booking_button inline-flex min-h-11 shrink-0 items-center justify-center gap-2 rounded-full bg-[var(--bg-button-primary)] px-5 py-2 text-sm font-medium text-[var(--text-button-primary)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[var(--border-secondary)]"
                            >
                                Обрати <MoveRight class="w-4" />
                            </a>
                        </div>
                    </li>
                </ul>

                <table
                    class="hidden w-full border-separate border-spacing-y-3 md:table"
                >
                    <caption class="sr-only">
                        Послуги, доступні для онлайн-запису
                    </caption>
                    <thead class="sr-only">
                        <tr>
                            <th scope="col">Послуга та тривалість</th>
                            <th scope="col">Вартість</th>
                            <th scope="col">Вибір послуги</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="service in servicesData"
                            :key="service.id"
                            class="bg-white/70"
                        >
                            <th
                                scope="row"
                                class="rounded-l-xl border-y border-l border-[var(--border-secondary)]/20 px-4 py-3 text-left font-normal sm:px-5"
                            >
                                <span
                                    class="block text-base font-medium text-[var(--text-primary)] md:text-lg"
                                >
                                    {{ service.title }}
                                </span>
                                <span
                                    v-if="service.subtitle"
                                    class="mt-1 block text-sm text-[var(--text-secondary)] md:text-sm"
                                >
                                    {{ service.subtitle }}
                                </span>
                                <div class="flex items-center gap-2">
                                    <span v-if="service.duration"
                                        ><Clock class="w-4"
                                    /></span>
                                    <span
                                        v-if="service.duration"
                                        class="block text-sm text-[var(--text-secondary)]"
                                    >
                                        {{ service.duration }}
                                    </span>
                                </div>
                            </th>
                            <td
                                class="w-28 border-y border-[var(--border-secondary)]/20 px-2 py-3 text-center text-sm font-medium text-[var(--text-primary)] sm:w-36 sm:px-4"
                            >
                                <span
                                    class="!text-lg text-[var(--text-primary)]"
                                    >{{ service.price }}</span
                                >
                                <span
                                    v-if="service.price_note"
                                    class="mt-1 block text-xs text-[12px] font-normal !text-[var(--text-primary)]"
                                >
                                    {{ service.price_note }}
                                </span>
                            </td>
                            <td
                                class="rounded-r-xl border-y border-r border-[var(--border-secondary)]/20 px-2 py-3 text-right sm:px-4"
                            >
                                <a
                                    :href="service.booking_url || '#'"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    @click.prevent="selectService(service)"
                                    type="button"
                                    :aria-label="`Обрана послуга: ${service.title}`"
                                    class="booking_button inline-flex min-h-10 items-center justify-center gap-2 rounded-full bg-[var(--bg-button-primary)] px-3 py-2 text-xs font-medium whitespace-nowrap text-[var(--text-button-primary)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[var(--border-secondary)] sm:px-4 sm:text-sm"
                                >
                                    Обрати <MoveRight class="w-4" />
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-4 flex justify-center gap-4">
                <Clock class="text-[var(--text-secondary)]" />
                <p>
                    Після вибору послуги ви зможете обрати зручні дату та час.
                </p>
            </div>
            <div
                class="mt-6 block h-[0.5px] w-full rounded-full bg-[var(--bg-button-primary)]"
            ></div>
            <Link
                href="/"
                class="mt-4 flex justify-center gap-4 text-[var(--text-primary)] !shadow-none md:justify-start"
                ><MoveLeft />Повернутися до сайту</Link
            >
        </section>
        <div
            v-if="selectedService"
            class="fixed inset-0 z-[100] grid place-items-center bg-black/50 p-4"
        >
            <div
                class="m-auto w-[60%] rounded-3xl border-[0.5px] border-[var(--text-secondary)] bg-white p-6 shadow-lg"
            >
                <h2 class="!text-3xl text-[var(--text-primary)]">
                    Умови роботи
                </h2>
                <p class="!text-base">
                    Консультація триває {{ selectedService?.duration }} та
                    проходить онлайн . Вартість — {{ selectedService?.price }}.
                    Оплата здійснюється [порядок оплати]. Якщо потрібно
                    скасувати або перенести зустріч, будь ласка, повідомте про
                    це щонайменше за [строк]. Умови оплати в разі скасування:
                    [умови].
                </p>
                <h2 class="!text-3xl text-[var(--text-primary)]">
                    Інформована згода
                </h2>
                <p class="mb-6 !text-base">
                    Я розумію, що консультація є психологічною послугою, а не
                    медичною допомогою чи екстреною службою. Я добровільно
                    погоджуюся на участь у консультації та розумію, що її
                    результат залежить від багатьох чинників і не може бути
                    гарантований. Інформація, якою я ділюся під час
                    консультації, є конфіденційною, крім випадків, передбачених
                    законодавством або пов’язаних із безпосередньою загрозою
                    життю чи безпеці.
                </p>
                <label class="flex items-center !text-base">
                    <input
                        v-model="hasAgreed"
                        type="checkbox"
                        name="agreement"
                        value="yes"
                        class="mr-4 size-5 cursor-pointer accent-[var(--bg-button-primary)]"
                    />
                    Я ознайомився/ознайомилася з умовами роботи та надаю
                    інформовану згоду на консультацію.
                </label>
                <button
                    type="button"
                    :disabled="!hasAgreed || !selectedService?.booking_url"
                    @click="continueToBooking"
                    class="m-auto mt-4 flex cursor-pointer justify-center rounded-full bg-[var(--bg-button-primary)] px-8 py-3 text-white shadow-sm"
                >
                    Підтвердити та продовжити
                </button>
            </div>
        </div>
    </MainLayout>
</template>
