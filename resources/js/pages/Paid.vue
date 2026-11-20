<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { Clock, MoveLeft } from '@lucide/vue';
import MainLayout from '@/layouts/MainLayout/MainLayout.vue';

const props = defineProps({
    practices: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <Head title="Платні практики" />

    <MainLayout>
        <section class="bg-[var(--bg-menu)] !pt-28 md:!pt-32">
            <div class="mx-auto max-w-6xl">
                <Link
                    href="/#practices_section"
                    class="mb-10 inline-flex items-center gap-2 !px-0 !py-0 text-[var(--text-secondary)] !shadow-none"
                >
                    <MoveLeft aria-hidden="true" class="size-4" />
                    На головну
                </Link>

                <header class="mx-auto mb-10 max-w-3xl text-center md:mb-14">
                    <span
                        class="inline-block rounded-full bg-white/70 px-4 py-2 !text-sm !text-[var(--text-secondary)]"
                    >
                        ПРОСТІР ПРАКТИК
                    </span>
                    <h1
                        class="mt-4 !text-4xl text-[var(--text-primary)] md:!text-5xl"
                    >
                        Трансформаційні практики
                    </h1>
                    <p class="mx-auto max-w-2xl">
                        Невеликі вправи, які допоможуть зробити паузу,
                        прислухатися до себе й обрати комфортний темп.
                    </p>
                </header>

                <div class="grid gap-5 md:grid-cols-2">
                    <Link
                        v-for="(practice, index) in practices" 
                        :key="practice.id"
                        :href="`/practice/${practice.id}?from=paid`"
                        class="practice-list-card group rounded-2xl border border-[var(--border-secondary)]/30 bg-white/80 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg md:p-8"
                    >
                        <div class="mb-6 flex items-center justify-between">
                            <span
                                class="flex size-11 items-center justify-center rounded-full bg-[var(--bg-card-rose)] font-medium text-[var(--text-primary)]"
                                aria-hidden="true"
                            >
                                {{ String(index + 1).padStart(2, '0') }}
                            </span>
                            <span
                                class="inline-flex items-center gap-2 rounded-full bg-[var(--bg-card-pink)] px-3 py-2 !text-sm text-[var(--text-secondary)]"
                            >
                                <Clock aria-hidden="true" class="size-4" />
                                {{ practice.duration }}
                            </span>
                        </div>

                        <h2
                            class="!mt-0 !mb-3 !text-2xl text-[var(--text-primary)]"
                        >
                            {{ practice.title }}
                        </h2>
                        <p class="!mb-0 text-[var(--text-secondary)]">
                            {{ practice.description }}
                        </p>
                    </Link>
                </div>

                <div
                    class="mx-auto mt-10 max-w-3xl rounded-2xl bg-[var(--bg-card-pink)] px-6 py-7 text-center md:mt-14 md:px-10"
                >
                    <h2
                        class="!mt-0 !mb-3 !text-2xl text-[var(--text-primary)]"
                    >
                        Обирайте свій темп
                    </h2>
                    <p class="!mb-0">
                        Це простір для самостійної практики. Оберіть вправу,
                        яка найбільше відгукується саме зараз.
                    </p>
                </div>
            </div>
        </section>
    </MainLayout>
</template>
