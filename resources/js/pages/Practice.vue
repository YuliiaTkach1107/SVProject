<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { MoveLeft } from '@lucide/vue';
import MainLayout from '@/layouts/MainLayout/MainLayout.vue';

const props = defineProps({
    practice: {
        type: Object,
        required: true,
    },
    backUrl: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Практика" />

    <MainLayout>
        <section class="bg-[var(--bg-menu)] !pt-28 md:!pt-32">
            <div class="mx-auto max-w-4xl">
                <Link
                    :href="props.backUrl"
                    class="mb-10 inline-flex items-center gap-2 !px-0 !py-0 text-[var(--text-secondary)] !shadow-none"
                >
                    <MoveLeft aria-hidden="true" class="size-4" />
                    Повернутись 
                </Link>

                <article v-if="props.practice">
                    <h1 class="mt-4 mb-4 text-2xl font-extralight text-[var(--text-primary)] md:text-3xl lg:mt-4 lg:mb-6 lg:text-4xl">
                        {{ props.practice.title }}
                    </h1>
                    <p>{{ props.practice.description }}</p>
                </article>

                <p v-else>Практику не знайдено.</p>
            </div>
        </section>
    </MainLayout>
</template>
