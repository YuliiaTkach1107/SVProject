<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import PracticeCard from '@/components/cards/PracticeCard.vue';
import Banner from '@/components/banner/Banner.vue';
import { MoveRight } from '@lucide/vue';

type PracticeCardData = {
    id: number;
    duration: string;
    title: string;
    description: string;
    icon?: string;
};

const practicesCards: PracticeCardData[] = [
    {
        id: 1,
        duration: '10 хв',
        title: 'Дихальна практика',
        description: 'Допомагає відновити спокій і знизити напруження.',
        icon:'<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"> <path d="M0 0h1024v1024H0z" fill="none" /> <path fill="currentColor" d="M923 283.6a260 260 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.3 265.3 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39q-15 9.15-28.5 20.1q-13.5-10.95-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.4 258.4 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9M512 814.8S156 586.7 156 385.5C156 283.6 240.3 201 344.3 201c73.1 0 136.5 40.8 167.7 100.4C543.2 241.8 606.6 201 679.7 201c104 0 188.3 82.6 188.3 184.5c0 201.2-356 429.3-356 429.3" /></svg>'
    },
    {
        id: 2,
        duration: '15 хв',
        title: 'Практика усвідомленості',
        description: 'Допомагає зосередитися на теперішньому моменті.',
        icon:'<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"> <path d="M0 0h1024v1024H0z" fill="none" /> <path fill="currentColor" d="M923 283.6a260 260 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.3 265.3 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39q-15 9.15-28.5 20.1q-13.5-10.95-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.4 258.4 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9M512 814.8S156 586.7 156 385.5C156 283.6 240.3 201 344.3 201c73.1 0 136.5 40.8 167.7 100.4C543.2 241.8 606.6 201 679.7 201c104 0 188.3 82.6 188.3 184.5c0 201.2-356 429.3-356 429.3" /></svg>'

    },
    {
        id: 3,
        duration: '20 хв',
        title: 'Щоденник емоцій',
        description: 'Практика для кращого розуміння власних почуттів.',
        icon:'<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"> <path d="M0 0h1024v1024H0z" fill="none" /> <path fill="currentColor" d="M923 283.6a260 260 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.3 265.3 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39q-15 9.15-28.5 20.1q-13.5-10.95-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.4 258.4 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9M512 814.8S156 586.7 156 385.5C156 283.6 240.3 201 344.3 201c73.1 0 136.5 40.8 167.7 100.4C543.2 241.8 606.6 201 679.7 201c104 0 188.3 82.6 188.3 184.5c0 201.2-356 429.3-356 429.3" /></svg>'

    },
    {
        id: 4,
        duration: '5 хв',
        title: 'Пауза турботи про себе',
        description: 'Коротке відновлення уваги до власних потреб.',
        icon:'<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"> <path d="M0 0h1024v1024H0z" fill="none" /> <path fill="currentColor" d="M923 283.6a260 260 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.3 265.3 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39q-15 9.15-28.5 20.1q-13.5-10.95-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.4 258.4 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9M512 814.8S156 586.7 156 385.5C156 283.6 240.3 201 344.3 201c73.1 0 136.5 40.8 167.7 100.4C543.2 241.8 606.6 201 679.7 201c104 0 188.3 82.6 188.3 184.5c0 201.2-356 429.3-356 429.3" /></svg>'

    }

];

const latestPracticesCards = practicesCards.slice(0, 6);
</script>
<template>
    <section id="practices_section" class="py-15" aria-labelledby="practices-heading">
    <span>ПРОСТІР ПРАКТИК</span>
    <h2 id='practices-heading' class="text-[var(--text-primary)]">Інструменти для щоденної роботи</h2>
    <Swiper
        class="mySwiper"
        :modules="[Pagination]"
        :space-between="16"
        :slides-per-view="1"
        :breakpoints="{
          768: { slidesPerView: 2 },
          1200: { slidesPerView: 4 }
        }"
        :pagination="{ clickable: true }"
      >
        <SwiperSlide v-for="(card, index) in latestPracticesCards" :key="card.id" class="mb-2">
          <PracticeCard :card="card" :index="index" />
        </SwiperSlide>
      </Swiper>
      <div class="flex flex-col gap-2 w-fit items-center  md:flex-row md:gap-10 lg:gap-20 mt-10 justify-center mb-20 mx-auto">
        <a href="#" class="flex gap-2 items-center text-[var(--text-button-primary)] bg-[var(--bg-button-primary)]">Безкоштовна допомога <MoveRight aria-hidden="true" :stroke-width="2" class="icon size-5 shrink-0"/></a>
        <a href="#" class="flex items-center text-[var(--text-button-secondary)] bg-[var(--bg-button-secondary) border-1 border-[var(--text-button-secondary)]">Трансформаційні практики</a>
      </div>
      <Banner/>
  </section>
</template>