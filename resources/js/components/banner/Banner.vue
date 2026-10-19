<script setup lang="ts">
type BannerData = {
    id: number;
    title: string;
    description: string;
    background_image: string;
};

const bannerData: BannerData = {
    id: 1,
    title: 'Приєднуйтесь до групових практик',
    description: 'Кожного вівторка о 19:00 - онлайн, безкоштовно для клієнтів',
    background_image: '/images/banner/banner.webp',
};
</script>
<template>
    <div
        class="banner"
        :style="
            bannerData.background_image
                ? {
                      backgroundImage: `url(${bannerData.background_image})`,
                  }
                : undefined
        "
    >
        <h3 v-if="bannerData.title">{{ bannerData.title }}</h3>
        <p v-if="bannerData.description" class="mb-4">
            {{ bannerData.description }}
        </p>
        <a
            href="#"
            class="inline-block bg-white text-[var(--text-button-secondary)]"
        >
            Записатись
        </a>
    </div>
</template>
