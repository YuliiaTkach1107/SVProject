<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';
import { Link } from '@inertiajs/vue3';

const mobileMenuOpen = ref(false);
const closeMobileMenu = () => {
    mobileMenuOpen.value = false;
    document.body.style.overflow = '';
};
watch(mobileMenuOpen, (value) => {
    document.body.classList.toggle('overflow-hidden', value);
});
const isHero = ref(true);
const activeSection = ref('');

const sectionIds = [
    'about_section',
    'services_section',
    'practices_section',
    'contact_section',
];
const scrollToSection = (id) => {
    document.getElementById(id)?.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
    });
};
const navigateToSection = (id) => {
    const section = document.getElementById(id);

    if (section) {
        window.history.pushState(null, '', `#${id}`);
        scrollToSection(id);
        return;
    }

    window.location.href = `/#${id}`;
};
const handleScroll = () => {
    const hero = document.getElementById('hero_section');
    if (hero) {
        isHero.value =
            hero.getBoundingClientRect().bottom > window.innerHeight * 0.2;
    }

    const activationLine = window.innerHeight * 0.35;
    const currentSection = sectionIds
        .map((id) => document.getElementById(id))
        .filter(
            (section) =>
                section &&
                section.getBoundingClientRect().top <= activationLine,
        )
        .at(-1);

    activeSection.value = currentSection?.id ?? '';
};

onMounted(() => {
    handleScroll();
    window.addEventListener('scroll', handleScroll);
});
onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>
<template>
    <header class="fixed top-0 left-0 z-50 w-full">
        <div
            :class="[
                'fixed z-50 flex w-full items-center justify-between px-10 text-[var(--text-primary)] transition-all duration-500 ease-in-out lg:flex lg:px-15',
                isHero
                    ? 'bg-[var(--bg-menu)]'
                    : 'bg-white shadow-[var(--circle-tertiary)] shadow-sm',
            ]"
        >
            <!-- Logo -->
            <div>
                <Link
                    href="/"
                    class="logo"
                    aria-label="Повернутися на головну сторінку"
                >
                    <img
                        src="/images/logo/Logo.png"
                        alt="Логотип сайту"
                        class="w-30 py-2 md:w-36 lg:w-36"
                    />
                </Link>
            </div>
            <!-- Navigation -->
            <nav aria-label="Головне меню сайту">
                <ul
                    class="hidden w-full items-center justify-center gap-8 lg:flex"
                >
                    <li>
                        <a
                            href="#about_section"
                            class="menu_link"
                            :class="{
                                is_current: activeSection === 'about_section',
                            }"
                            @click.prevent="navigateToSection('about_section')"
                        >
                            Про мене
                        </a>
                    </li>
                    <li>
                        <a
                            href="#services_section"
                            class="menu_link"
                            :class="{
                                is_current:
                                    activeSection === 'services_section',
                            }"
                            @click.prevent="
                                navigateToSection('services_section')
                            "
                        >
                            Послуги
                        </a>
                    </li>
                    <li>
                        <a
                            href="#practices_section"
                            class="menu_link"
                            :class="{
                                is_current:
                                    activeSection === 'practices_section',
                            }"
                            @click.prevent="
                                navigateToSection('practices_section')
                            "
                        >
                            Простір практик
                        </a>
                    </li>
                    <li>
                        <a
                            href="#contact_section"
                            class="menu_link"
                            :class="{
                                is_current: activeSection === 'contact_section',
                            }"
                            @click.prevent="
                                navigateToSection('contact_section')
                            "
                        >
                            Контакти
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Burger Menu -->
            <button
                type="button"
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="relative flex h-4 w-6 cursor-pointer flex-col justify-between lg:hidden"
                :aria-label="mobileMenuOpen ? 'Закрити меню' : 'Відкрити меню'"
                :aria-expanded="mobileMenuOpen"
                aria-controls="mobile-menu"
            >
                <span
                    :class="[
                        'block h-0.5 w-full origin-center transform rounded-full bg-[#463028] transition-all duration-300 ease-in-out',
                        mobileMenuOpen ? 'translate-y-1.5 rotate-45' : '',
                    ]"
                ></span>
                <span
                    :class="[
                        'block h-0.5 w-full transform rounded-full bg-[#463028] transition-all duration-300 ease-in-out',
                        mobileMenuOpen ? 'opacity-0' : '',
                    ]"
                ></span>
                <span
                    :class="[
                        'block h-0.5 w-full origin-center transform rounded-full bg-[#463028] transition-all duration-300 ease-in-out',
                        mobileMenuOpen ? '-translate-y-2 -rotate-45' : '',
                    ]"
                ></span>
            </button>
            <!-- Button -->
            <Link
                href="/booking"
                class="last_menu_link menu-cta-button"
                aria-label="Записатись на консультацію"
                >Записатись онлайн</Link
            >
        </div>
        <!-- Mobile Menu -->
        <transition name="slide-fade">
            <div
                id="mobile-menu"
                v-if="mobileMenuOpen"
                role="dialog"
                aria-modal="true"
                aria-label="Мобільне меню"
                @click="closeMobileMenu"
                :class="[
                    'min-h-screen w-full overscroll-y-none bg-[var(--bg-menu)] px-6 pt-28 lg:hidden',
                    isHero
                        ? 'bg-[var(--bg-menu)]'
                        : 'bg-white shadow-[var(--circle-tertiary)] shadow-sm',
                ]"
            >
                <ul class="flex flex-col gap-6 text-center">
                    <li>
                        <a
                            href="#about_section"
                            class="menu_link"
                            :class="{
                                is_current: activeSection === 'about_section',
                            }"
                            @click.prevent="navigateToSection('about_section')"
                        >
                            Про мене
                        </a>
                    </li>
                    <li>
                        <a
                            href="#services_section"
                            class="menu_link"
                            :class="{
                                is_current:
                                    activeSection === 'services_section',
                            }"
                            @click.prevent="
                                navigateToSection('services_section')
                            "
                        >
                            Послуги
                        </a>
                    </li>
                    <li>
                        <a
                            href="#practices_section"
                            class="menu_link"
                            :class="{
                                is_current:
                                    activeSection === 'practices_section',
                            }"
                            @click.prevent="
                                navigateToSection('practices_section')
                            "
                        >
                            Простір практик
                        </a>
                    </li>
                    <li>
                        <a
                            href="#contact_section"
                            class="menu_link"
                            :class="{
                                is_current: activeSection === 'contact_section',
                            }"
                            @click.prevent="
                                navigateToSection('contact_section')
                            "
                        >
                            Контакти
                        </a>
                    </li>
                    <li>
                        <Link
                            href="/booking"
                            class="burger_menu_link menu-cta-button"
                            aria-label="Записатись на консультацію"
                            >Записатись онлайн</Link
                        >
                    </li>
                </ul>
            </div>
        </transition>
    </header>
</template>
<style scoped>
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 0.4s ease;
}
.slide-fade-enter-from {
    transform: translateY(-20px);
    opacity: 0;
}
.slide-fade-enter-to {
    transform: translateY(0);
    opacity: 1;
}
.slide-fade-leave-from {
    transform: translateY(0);
    opacity: 1;
}
.slide-fade-leave-to {
    transform: translateY(-20px);
    opacity: 0;
}
</style>
