<script setup></script>
<template>
    <section
        id="about_section"
        aria-labelledby="about-title"
        class="align-center relative flex items-center gap-6 py-10 md:flex-row md:gap-10 lg:gap-32 lg:py-15"
    >
        <div
            class="pointer-events-none absolute top-15 right-4 z-0 hidden lg:block lg:w-[15%]"
        >
            <img
                src="images/about/Svitlana_Darmostuk.svg"
                alt=""
                loading="lazy"
                class="w-full rotate-20"
                aria-hidden="true"
            />
        </div>
        <div
            class="relative z-10 my-auto hidden h-[80%] w-[40vw] shrink-0 overflow-hidden rounded-t-full rounded-b-lg md:block md:h-[70%] md:w-[30vw]"
        >
            <img
                src="images/about/About.jpeg"
                alt=""
                loading="lazy"
                class="h-full w-full rounded-t-full rounded-b-lg border-1 border-[var(--circle-secondary)] object-cover object-[center_20%] shadow-sm"
            />
        </div>
        <div class="flex flex-col">
            <div class="mb-0 mb-4 flex flex-row gap-5 md:gap-0">
                <div class="my-auto md:my-0">
                    <span>ПРО МЕНЕ</span>
                    <h2 id="about-title">
                        <span class="text-[var(--text-primary)]"
                            >Професійна підтримка,</span
                        ><br /><span class="text-[var(--text-secondary)]"
                            >заснована на досвіді та турботі</span
                        >
                    </h2>
                </div>
                <div
                    class="relative z-10 my-auto ml-auto block h-[80%] w-[30vw] shrink-0 overflow-hidden rounded-t-full rounded-b-lg md:hidden"
                >
                    <img
                        src="images/about/About.jpeg"
                        alt=""
                        loading="lazy"
                        class="h-full w-full rounded-t-full rounded-b-lg border-1 border-[var(--circle-secondary)] object-cover object-[center_20%] shadow-sm"
                    />
                </div>
            </div>
            <p>
                Я - дипломований психолог з 5 річним досвідом практичної роботи,
                тренер ВВМ, менеджер ТRіМ (Управління ризиком травми (ТРіМ) є
                методом вторинної профілактики ПТСР), ігропрактик, модератор
                фінансово-психологічної тренінг-гри "Психологія грошей",
                спеціаліст з індивідуального та сімейного консультування, працюю
                в інтегративному підході.<br /><br />У своїй роботі поєдную
                знання, навички та техніки з арт-терапії, позитивної
                психотерапії , ігрової терапії та інших методів, щоб надавати
                комплексне індивідуальне та сімейне консультування. 
            </p>
        </div>
    </section>
</template>
