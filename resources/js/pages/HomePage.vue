<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout/MainLayout.vue';
import HeroSection  from '@/components/page_parts/Hero.vue';
import AboutSection from '@/components/page_parts/About.vue';
import ServicesSection from '@/components/page_parts/Services.vue';
import PracticesSection from '@/components/page_parts/Practices.vue';
import ContactSection from '@/components/page_parts/Contact.vue';
import { Head } from '@inertiajs/vue3'

</script>
<template>
    <Head>
    <title>Світлана Дармостук — практичний психолог</title>
    <meta name="description" content="Індивідуальне та сімейне психологічне консультування. Допомога в особистісному зростанні та добробуті."/>
    <meta property="og:url" content="https://example.com/" />
    <meta property="og:title" content="Світлана Дармостук — практичний психолог"/>
    <meta property="og:description" content="Індивідуальне та сімейне психологічне консультування."/>
    <meta property="og:image" content="/images/hero/Hero.jpeg" />
    <meta property="og:type" content="website" />
    <link rel="canonical" href="https://example.com/" />
    </Head>
    <MainLayout>
        <HeroSection />
        <AboutSection />
        <ServicesSection />
        <PracticesSection />
        <ContactSection />
    </MainLayout>
</template>