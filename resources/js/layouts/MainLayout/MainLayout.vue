<script setup>
import Header from './Header.vue';
import Footer from './Footer.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>
<template>
    <div>
        <Header />
        <main>
            <slot />
        </main>
        <Footer :contact-details="page.props.contactDetails" />
    </div>
</template>
