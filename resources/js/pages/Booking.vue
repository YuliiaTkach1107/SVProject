<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import MainLayout from '@/layouts/MainLayout/MainLayout.vue';
import BookingBanner from '@/components/booking/BookingBanner.vue';
import { Clock, MoveLeft, MoveRight } from '@lucide/vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    services: {
        type: Array,
        default: () => [],
    },
});

const selectedService = ref(null);
const selectService = (service) => {
    selectedService.value = service;
};

const resetSelection = () => {
    selectedService.value = null;
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
            class="bg-[var(--bg-menu)] !pt-28 md:!pt-32"
        >
            <div class="mx-auto max-w-6xl">
                <Link
                    href="/"
                    class="mb-10 inline-flex items-center gap-2 !px-0 !py-0 text-[var(--text-secondary)] !shadow-none"
                >
                    <MoveLeft aria-hidden="true" class="size-4" />
                    На головну
                </Link>

                <header class="mx-auto mb-10 max-w-3xl text-center md:mb-14">
                    <span
                        class="inline-block rounded-full bg-white/70 px-4 py-2 !text-sm !text-[var(--text-secondary)]"
                    >
                        ОНЛАЙН-ЗАПИС
                    </span>
                    <h1 class="booking mt-4 text-[var(--text-primary)]">
                        Оберіть послугу для запису
                    </h1>
                    <p>
                        Оберіть формат консультації, щоб переглянути доступні
                        дати та час.
                    </p>
                </header>

                <ul
                    class="mx-auto max-w-5xl divide-y divide-[var(--border-secondary)]/30 overflow-hidden rounded-2xl border border-[var(--border-secondary)]/30 bg-white/70 px-5 md:px-8"
                    aria-label="Послуги для онлайн-запису"
                >
                    <li
                        v-for="service in props.services"
                        :key="service.id"
                        class="flex flex-col gap-4 py-5 sm:flex-row sm:items-center sm:justify-between sm:gap-6 sm:py-6"
                    >
                        <div class="flex min-w-0 items-start gap-4">
                            <span
                                class="mt-1 flex size-10 shrink-0 items-center justify-center rounded-full bg-[var(--bg-card-rose)] font-medium text-[var(--text-primary)]"
                                aria-hidden="true"
                            >
                                {{ String(service.id).padStart(2, '0') }}
                            </span>
                            <div class="min-w-0">
                                <span
                                    v-if="service.duration"
                                    class="mb-2 inline-flex items-center gap-2 rounded-full bg-[var(--bg-card-pink)] px-3 py-1 !text-sm text-[var(--text-secondary)]"
                                >
                                    <Clock aria-hidden="true" class="size-4" />
                                    {{ service.duration }}
                                </span>
                                <h2
                                    class="!m-0 !text-xl font-medium text-[var(--text-primary)] md:!text-2xl"
                                >
                                    {{ service.title }}
                                </h2>
                                <p
                                    v-if="service.subtitle"
                                    class="mt-1 !mb-0 text-sm text-[var(--text-secondary)]"
                                >
                                    {{ service.subtitle }}
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex shrink-0 items-center justify-between gap-10 pl-14 sm:justify-end sm:pl-0"
                        >
                            <p
                                class="min-w-0 text-left font-medium text-[var(--text-primary)]"
                            >
                                <span
                                    class="block !text-xl font-medium !text-[var(--text-primary)]"
                                    >{{ service.price }}€</span
                                >
                                <span
                                    v-if="service.price_note"
                                    class="block !text-sm font-normal !text-[var(--text-secondary)]"
                                >
                                    {{ service.price_note }}
                                </span>
                            </p>
                            <button
                                type="button"
                                :disabled="!service.booking_url"
                                :aria-label="`Обрана послуга: ${service.title}`"
                                @click="selectService(service)"
                                class="booking_button inline-flex min-h-10 shrink-0 items-center justify-center gap-2 rounded-full bg-[var(--bg-button-primary)] px-4 py-2 text-sm font-medium text-[var(--text-button-primary)] transition-all duration-300 hover:bg-[var(--bg-button-hover)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[var(--border-secondary)] active:scale-[.98] disabled:cursor-not-allowed disabled:opacity-50"
                            >
                                Обрати <MoveRight class="w-4" />
                            </button>
                        </div>
                    </li>
                </ul>

                <div
                    class="mx-auto mt-8 flex max-w-5xl items-start gap-3 rounded-xl bg-[var(--bg-card-pink)] px-5 py-4"
                >
                    <Clock
                        aria-hidden="true"
                        class="mt-1 size-5 shrink-0 text-[var(--text-secondary)]"
                    />
                    <p class="!mb-0 text-left">
                        Після вибору послуги ви зможете обрати зручні дату та
                        час.
                    </p>
                </div>
            </div>
        </section>
        <BookingBanner
            :service="selectedService"
            @close="selectedService = null"
        />
    </MainLayout>
</template>
