<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import PracticeCard from '@/components/cards/PracticeCard.vue';
import Banner from '@/components/banner/Banner.vue';
import { MoveRight } from '@lucide/vue';

const props = defineProps({
    practices: {
        type: Array,
        default: () => [],
    },
});
const latestPracticesCards = props.practices.slice(0, 6);
</script>
<template>
    <section
        id="practices_section"
        class="py-15"
        aria-labelledby="practices-heading"
    >
        <span>ПРОСТІР ПРАКТИК</span>
        <h2 id="practices-heading" class="text-[var(--text-primary)]">
            Інструменти для щоденної роботи
        </h2>
        <Swiper
            class="mySwiper"
            :modules="[Pagination]"
            :space-between="16"
            :slides-per-view="1"
            :breakpoints="{
                768: { slidesPerView: 2 },
                1200: { slidesPerView: 4 },
            }"
            :pagination="{ clickable: true }"
        >
            <SwiperSlide
                v-for="(card, index) in latestPracticesCards"
                :key="card.id"
                class="mb-2"
            >
                <PracticeCard :card="card" :index="index" />
            </SwiperSlide>
        </Swiper>
        <div
            class="mx-auto mt-10 mb-20 flex w-fit flex-col items-center justify-center gap-2 md:flex-row md:gap-10 lg:gap-20"
        >
            <a
                href="/free-practices"
                class="practice-button-primary flex items-center gap-2 bg-[var(--bg-button-primary)] text-[var(--text-button-primary)]"
                >Безкоштовна допомога
                <MoveRight
                    aria-hidden="true"
                    :stroke-width="2"
                    class="icon size-5 shrink-0"
            /></a>
            <a
                href="/paid-practices"
                class="practice-button-secondary bg-[var(--bg-button-secondary) flex items-center border-1 border-[var(--text-button-secondary)] text-[var(--text-button-secondary)]"
                >Трансформаційні практики</a
            >
        </div>
        <Banner />
    </section>
</template>
