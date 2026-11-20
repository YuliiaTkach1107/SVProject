<script setup>
import { MoveRight } from '@lucide/vue';
import { Link } from '@inertiajs/vue3';

const currentYear = new Date().getFullYear();

const props = defineProps({
    contactDetails: Array,
});
</script>

<template>
    <footer
        class="relative w-full bg-[var(--bg-footer)] px-6 py-8 md:px-8 lg:px-15"
    >
        <div
            class="container-details mx-auto grid w-full max-w-[1400px] grid-cols-1 gap-8 lg:grid-cols-3 lg:gap-10"
        >
            <div class="logo_info flex flex-col items-start gap-4 pb-4 md:pb-0">
                <Link
                    href="/"
                    class="logo"
                    aria-label="Повернутися на головну сторінку"
                >
                    <img
                        src="/images/logo/Logo_light.png"
                        alt="Логотип сайту"
                        class="w-30 py-2 md:w-40"
                    />
                </Link>
                <p class="w-[80%] !text-white">
                    Поруч із тобою на шляху до внутрішньої гармонії.
                </p>
            </div>

            <div
                class="quick_links border-t border-white pt-6 lg:border-t-0 lg:pt-0"
            >
                <nav aria-label="Навігація у футері">
                    <ul class="flex flex-col items-start gap-3">
                        <li>
                            <a href="/#about_section" class="footer_link"
                                >Про мене</a
                            >
                        </li>
                        <li>
                            <a href="/#services_section" class="footer_link"
                                >Послуги</a
                            >
                        </li>
                        <li>
                            <a href="/#practices_section" class="footer_link"
                                >Простір практик</a
                            >
                        </li>
                        <li>
                            <a href="/#contact_section" class="footer_link"
                                >Контакти</a
                            >
                        </li>
                        <li><a href="#" class="footer_link">FAQ</a></li>
                    </ul>
                </nav>
            </div>

            <div
                class="contact_details flex flex-col gap-6 border-t border-white pt-6 lg:col-span-1 lg:justify-center lg:border-t-0 lg:pt-0"
            >
                <div class="contacts">
                    <h2 class="!text-white">Контакти</h2>
                    <div v-for="detail in contactDetails" :key="detail.id">
                        <a
                            v-if="detail.type === 'contact'"
                            :href="detail.url"
                            class="footer_link"
                            >{{ detail.contact_detail }}</a
                        >
                    </div>
                </div>
                <div class="social_media">
                    <h2 class="!text-white">Соціальні мережі</h2>
                    <div class="flex items-center gap-2">
                        <div v-for="detail in contactDetails" :key="detail.id">
                            <a
                                v-if="detail.type === 'social_media'"
                                :href="detail.url"
                                :aria-label="detail.contact_detail"
                                target="_blank"
                                rel="noopener noreferrer"
                                v-html="detail.icon"
                                class="footer-icon"
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto my-8 h-px w-full max-w-[1400px] bg-white"></div>

        <div
            class="container-bottom mx-auto mb-4 flex w-full max-w-[1400px] flex-col items-center gap-4 py-2 text-center lg:flex-row lg:justify-between lg:text-left"
        >
            <p class="!text-white">
                © {{ currentYear }} Світлана Дармостук · Практичний психолог ·
                Київ
            </p>
            <div
                class="flex flex-col items-center gap-3 sm:flex-row sm:flex-wrap sm:justify-center sm:gap-x-5 sm:gap-y-2 lg:justify-end"
            >
                <Link href="#" class="footer_link"
                    >Політика конфіденційності</Link
                >
                <Link href="#" class="footer_link">Угода користувача</Link>
                <Link href="#" class="footer_link"
                    >Згода на обробку персональних даних</Link
                >
            </div>
        </div>
    </footer>
</template>
