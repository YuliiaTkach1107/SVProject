<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    card: {
        type: Object,
        required: true,
    },
    index: {
        type: Number,
        required: true,
    },
});

const colors = ['pink', 'gray', 'rose', 'peach'];
</script>
<template>
    <Link
        :href="`/practice/${card.id}?from=home`"
        class="practice-card"
        :class="`practice-card--${colors[index % colors.length]}`"
    >
        <span
            v-if="card.icon"
            class="practice-icon"
            :class="card.icon"
            aria-hidden="true"
            v-html="card.icon"
        ></span>
        <p v-if="card.duration" class="practice-duration">
            {{ card.duration }}
        </p>
        <h3
            v-if="card.title"
            class="practice-title mb-2 line-clamp-2 min-h-[2.4em]"
        >
            {{ card.title }}
        </h3>
        <p
            v-if="card.description"
            class="practice-description line-clamp-2 min-h-[3em]"
        >
            {{ card.description }}
        </p>
    </Link>
</template>
