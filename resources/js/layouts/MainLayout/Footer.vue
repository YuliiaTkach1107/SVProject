<script setup lang="ts">
import { MoveRight } from '@lucide/vue';
import { Link } from'@inertiajs/vue3';

const currentYear = new Date().getFullYear();

type ContactDetailsData = {
    id: number;
    icon: string;
    contact_detail: string;
    url: string;
    type: string;
};

const contactDetails: ContactDetailsData[] = [
    {
        id: 1,
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none" /><path fill="currentColor" fill-rule="evenodd" d="M5.84 9.856a17.22 17.22 0 0 0 8.922 8.663l.012.005l.764.34a2.25 2.25 0 0 0 2.74-.737l1.274-1.763a.25.25 0 0 0-.046-.341l-2.224-1.795a.25.25 0 0 0-.358.046l-.866 1.168a.75.75 0 0 1-.912.237a13.4 13.4 0 0 1-6.67-6.67a.75.75 0 0 1 .237-.912L9.88 7.23a.25.25 0 0 0 .046-.358L8.132 4.648a.25.25 0 0 0-.341-.046l-1.773 1.28a2.25 2.25 0 0 0-.732 2.756zm8.33 10.041a18.72 18.72 0 0 1-9.693-9.416l-.002-.002l-.554-1.22A3.75 3.75 0 0 1 5.14 4.666l1.773-1.28a1.75 1.75 0 0 1 2.386.32l1.795 2.225a1.75 1.75 0 0 1-.32 2.505l-.67.496a11.9 11.9 0 0 0 5.118 5.118l.497-.67a1.75 1.75 0 0 1 2.504-.32l2.225 1.795a1.75 1.75 0 0 1 .32 2.387l-1.274 1.764a3.75 3.75 0 0 1-4.566 1.229z" clip-rule="evenodd" /></svg>',
        contact_detail: '+38 (097) 000-00-00',
        url: 'tel:+380970000000',
        type: 'contact'
    },
    {
        id: 2,
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"> <path d="M0 0h1024v1024H0z" fill="none" /> <path fill="currentColor" d="M512 306.9c-113.5 0-205.1 91.6-205.1 205.1S398.5 717.1 512 717.1S717.1 625.5 717.1 512S625.5 306.9 512 306.9m0 338.4c-73.4 0-133.3-59.9-133.3-133.3S438.6 378.7 512 378.7S645.3 438.6 645.3 512S585.4 645.3 512 645.3m213.5-394.6c-26.5 0-47.9 21.4-47.9 47.9s21.4 47.9 47.9 47.9s47.9-21.3 47.9-47.9a47.84 47.84 0 0 0-47.9-47.9M911.8 512c0-55.2.5-109.9-2.6-165c-3.1-64-17.7-120.8-64.5-167.6c-46.9-46.9-103.6-61.4-167.6-64.5c-55.2-3.1-109.9-2.6-165-2.6c-55.2 0-109.9-.5-165 2.6c-64 3.1-120.8 17.7-167.6 64.5C132.6 226.3 118.1 283 115 347c-3.1 55.2-2.6 109.9-2.6 165s-.5 109.9 2.6 165c3.1 64 17.7 120.8 64.5 167.6c46.9 46.9 103.6 61.4 167.6 64.5c55.2 3.1 109.9 2.6 165 2.6c55.2 0 109.9.5 165-2.6c64-3.1 120.8-17.7 167.6-64.5c46.9-46.9 61.4-103.6 64.5-167.6c3.2-55.1 2.6-109.8 2.6-165m-88 235.8c-7.3 18.2-16.1 31.8-30.2 45.8c-14.1 14.1-27.6 22.9-45.8 30.2C695.2 844.7 570.3 840 512 840s-183.3 4.7-235.9-16.1c-18.2-7.3-31.8-16.1-45.8-30.2c-14.1-14.1-22.9-27.6-30.2-45.8C179.3 695.2 184 570.3 184 512s-4.7-183.3 16.1-235.9c7.3-18.2 16.1-31.8 30.2-45.8s27.6-22.9 45.8-30.2C328.7 179.3 453.7 184 512 184s183.3-4.7 235.9 16.1c18.2 7.3 31.8 16.1 45.8 30.2c14.1 14.1 22.9 27.6 30.2 45.8C844.7 328.7 840 453.7 840 512s4.7 183.2-16.2 235.8" />',
        contact_detail: '@svitlana.darmostuk',
        url: 'https://www.instagram.com/svitlanadar_psychology?stkn=dGkwcGs3d3Z3MDZv',
        type:'social_media'
    },
    {
        id: 3,
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"> <path d="M0 0h24v24H0z" fill="none" /> <path fill="currentColor" d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2m4.635 6.8c-.15 1.581-.8 5.418-1.133 7.189c-.14.75-.416 1-.683 1.026c-.581.053-1.022-.384-1.584-.753c-.881-.577-1.378-.936-2.232-1.5c-.987-.651-.347-1.008.215-1.593c.148-.153 2.706-2.48 2.756-2.691a.2.2 0 0 0-.047-.177a.23.23 0 0 0-.207-.02q-.132.03-4.218 2.788a1.9 1.9 0 0 1-1.084.4a7 7 0 0 1-1.555-.369c-.626-.2-1.124-.312-1.081-.657q.034-.27.744-.553q4.374-1.9 5.832-2.512c2.777-1.155 3.354-1.356 3.731-1.362a.66.66 0 0 1 .387.116a.42.42 0 0 1 .142.271a1.7 1.7 0 0 1 .017.394" /></svg>',
        contact_detail: '@svitlanadar_psychology',
        url: 'https://t.me/svitlanadar_psychology',
        type: 'social_media'
    },
]

</script>

<template>
    <footer class="relative w-full bg-[var(--bg-footer)] px-6 py-8 sm:px-8 lg:px-15">
        <div class="container-details mx-auto grid w-full max-w-[1400px] grid-cols-1 gap-8 lg:grid-cols-3 lg:gap-10">
            <div class="logo_info flex flex-col items-start gap-4">
                <Link href="/" class="logo" aria-label="Повернутися на головну сторінку">
                    <img src="/images/logo/Logo_light.png" alt="Логотип сайту" class="w-30 py-2 md:w-40" />
                </Link>
                <p class="w-[80%] !text-white">Поруч із тобою на шляху до внутрішньої гармонії.</p>
            </div>

            <div class="quick_links border-t border-[var(--border-secondary)] pt-6 lg:border-t-0 lg:pt-0">
                <nav aria-label="Навігація у футері">
                    <ul class="flex flex-col items-start gap-3">
                        <li><a href="#about_section" class="footer_link">Про мене</a></li>
                        <li><a href="#services_section" class="footer_link">Послуги</a></li>
                        <li><a href="#practices_section" class="footer_link">Простір практик</a></li>
                        <li><a href="#contact_section" class="footer_link">Контакти</a></li>
                        <li><a href="#" class="footer_link">FAQ</a></li>
                    </ul>
                </nav>
            </div>

            <div class="contact_details flex flex-col gap-6 border-t border-[var(--border-secondary)] pt-6 lg:col-span-1 lg:justify-center lg:border-t-0 lg:pt-0">
                <div class="contacts">
                    <h2 class="!text-white">Контакти</h2>
                    <div v-for="detail in contactDetails" :key="detail.id">
                        <a v-if="detail.type === 'contact'" :href="detail.url" class="footer_link">{{ detail.contact_detail }}</a>
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

        <div class="container-bottom mx-auto mb-4 py-2 flex w-full max-w-[1400px] flex-col items-center gap-4 text-center lg:flex-row lg:justify-between lg:text-left">
            <p class="!text-white">© {{ currentYear }} Світлана Дармостук · Практичний психолог · Київ</p>
            <div class="flex flex-col items-center gap-3 sm:flex-row sm:flex-wrap sm:justify-center sm:gap-x-5 sm:gap-y-2 lg:justify-end">
                <Link href="#" class="footer_link">Політика конфіденційності</Link>
                <Link href="#" class="footer_link">Угода користувача</Link>
                <Link href="#" class="footer_link">Згода на обробку персональних даних</Link>
            </div>
        </div>
    </footer>
</template>
