<script setup>
import ContactDetails from '@/components/contact/ContactDetails.vue';
import ContactForm from '@/components/contact/ContactForm.vue';
const props = defineProps({
    contactDetails: Array,
});
</script>
<template>
    <section
        id="contact_section"
        class="flex grid-cols-2 flex-col gap-4 bg-[var(--bg-secondary)] py-15 md:grid lg:gap-10"
    >
        <div>
            <span>КОНТАКТИ</span>
            <h2>
                <span class="text-[var(--text-primary)]">Перший крок —</span
                ><br /><span> це написати мені</span>
            </h2>
            <p class="mb-4 md:mb-10">
                Будь ласка, заповніть цю форму, щоб зв’язатися зі мною. Я
                відповім вам якомога швидше.
            </p>
            <div
                v-for="detail in contactDetails"
                :key="detail.id"
                class="mb-0 md:mb-6"
            >
                <ContactDetails :detail="detail" />
            </div>
        </div>
        <div>
            <ContactForm />
        </div>
    </section>
</template>
