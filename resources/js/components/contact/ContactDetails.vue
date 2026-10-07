<script setup lang="ts">
defineProps<{
    detail: {
        id: number;
        icon: string;
        contact_detail: string;
        url: string;
    };
}>();
</script>

<template>
    <ul>
        <li class="contact_details mb-4 flex flex-row items-center gap-2">
            <span
                v-if="detail.icon"
                class="contact-icon"
                aria-hidden="true"
                v-html="detail.icon"
            ></span>
            <a v-if="detail.contact_detail" :href="detail.url" class="contact_link">
                {{ detail.contact_detail }}
            </a>
        </li>
    </ul>
</template>