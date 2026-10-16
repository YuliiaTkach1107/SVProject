<script setup>
import {ref, onMounted, onUnmounted, watch } from "vue";
import { Link, usePage  } from '@inertiajs/vue3'

const mobileMenuOpen = ref(false)
const closeMobileMenu = () => {
  mobileMenuOpen.value = false
  document.body.style.overflow = ''
}
watch(mobileMenuOpen, (value) => {
    document.body.classList.toggle("overflow-hidden", value);
});
const isHero = ref(true)
const activeSection = ref('')

const sectionIds = [
  'about_section',
  'services_section',
  'practices_section',
  'contact_section',
]
const scrollToSection = (id) => {
  document.getElementById(id)?.scrollIntoView({
    behavior: 'smooth',
    block: 'start',
  })
}
const handleScroll = () => {
  const hero = document.getElementById('hero_section');
  if (hero) {
    isHero.value =
      hero.getBoundingClientRect().bottom > window.innerHeight * 0.2
  }

  const activationLine = window.innerHeight * 0.35
  const currentSection = sectionIds
    .map((id) => document.getElementById(id))
    .filter((section) => section && section.getBoundingClientRect().top <= activationLine)
    .at(-1)

  activeSection.value = currentSection?.id ?? ''
}

onMounted(()=>{
    handleScroll()
    window.addEventListener('scroll', handleScroll)
})
onUnmounted(()=>{
  window.removeEventListener('scroll',handleScroll)
})
</script>
<template>
  <header class="fixed left-0 top-0 z-50 w-full">
      <div :class="['fixed flex justify-between items-center lg:flex fixed w-full z-50 text-[var(--text-primary)] px-10 lg:px-15 transition-all duration-500 ease-in-out', isHero ? 'bg-[var(--bg-menu)]' : 'bg-white shadow-sm shadow-[var(--circle-tertiary)]']">
         <!-- Logo -->
          <div>
            <Link href="/" class="logo" aria-label="Повернутися на головну сторінку">
              <img src="/images/logo/Logo.png" alt="Логотип сайту" class="w-30 md:w-36 lg:w-36 py-2" />
            </Link>
          </div>
         <!-- Navigation -->
         <nav aria-label="Головне меню сайту">
            <ul class="hidden lg:flex w-full items-center justify-center gap-8">
                <li>
                    <a href="#about_section" class="menu_link" :class="{ 'is_current': activeSection === 'about_section' }"   @click.prevent="scrollToSection('about_section')"> Про мене </a>
                </li>
                <li>
                    <a href="#services_section" class="menu_link" :class="{ 'is_current': activeSection === 'services_section' }" @click.prevent="scrollToSection('services_section')" > Послуги </a>
                </li>
                <li>
                    <a href="#practices_section" class="menu_link" :class="{ 'is_current': activeSection === 'practices_section' }" @click.prevent="scrollToSection('practices_section')"> Простір практик </a>
                </li>
                <li>
                    <a href="#contact_section" class="menu_link" :class="{ 'is_current': activeSection === 'contact_section' }" @click.prevent="scrollToSection('contact_section')"> Контакти </a>
                </li>
            </ul>
         </nav>
         <!-- Burger Menu -->
         <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="cursor-pointer lg:hidden flex flex-col justify-between w-6 h-4 relative" :aria-label="mobileMenuOpen ? 'Закрити меню' : 'Відкрити меню'" :aria-expanded="mobileMenuOpen" aria-controls="mobile-menu">
            <span :class="[ 'block h-0.5 w-full bg-[#463028] transform transition-all duration-300 ease-in-out origin-center rounded-full', mobileMenuOpen ? 'rotate-45 translate-y-1.5' : '']"></span>
            <span :class="['block h-0.5 w-full bg-[#463028] transform transition-all duration-300 ease-in-out rounded-full', mobileMenuOpen ? 'opacity-0' : '']"></span>
            <span :class="[ 'block h-0.5 w-full bg-[#463028] transform transition-all duration-300 ease-in-out origin-center rounded-full', mobileMenuOpen ? '-rotate-45 -translate-y-2' : '']"></span>
         </button>
         <!-- Button -->
         <a href="#" class="last_menu_link menu-cta-button" aria-label="Записатись на консультацію">Записатись онлайн</a>
      </div>
      <!-- Mobile Menu -->
      <transition name="slide-fade">
         <div id="mobile-menu" v-if="mobileMenuOpen" role="dialog" aria-modal="true" aria-label="Мобільне меню" @click="closeMobileMenu" :class="['lg:hidden w-full min-h-screen bg-[var(--bg-menu)] px-6 pt-28 overscroll-y-none', isHero ? 'bg-[var(--bg-menu)]' : 'bg-white shadow-sm shadow-[var(--circle-tertiary)]']">
            <ul class="flex flex-col gap-6 text-center">
               <li>
                    <a href="#about_section" class="menu_link" :class="{ 'is_current': activeSection === 'about_section' }" @click.prevent="scrollToSection('about_section')"> Про мене </a>
                </li>
                <li>
                    <a href="#services_section" class="menu_link" :class="{ 'is_current': activeSection === 'services_section' }" @click.prevent="scrollToSection('services_section')"> Послуги </a>
                </li>
                <li>
                    <a href="#practices_section" class="menu_link" :class="{ 'is_current': activeSection === 'practices_section' }" @click.prevent="scrollToSection('practices_section')"> Простір практик </a>
                </li>
                <li>
                    <a href="#contact_section" class="menu_link" :class="{ 'is_current': activeSection === 'contact_section' }" @click.prevent="scrollToSection('contact_section')"> Контакти </a>
                </li>
                <li>
                  <a href="#" class="burger_menu_link menu-cta-button" aria-label="Записатись на консультацію">Записатись онлайн</a>
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
