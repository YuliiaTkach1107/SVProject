<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { computed, ref, watch, onMounted } from 'vue';

const page = usePage();
const data = useForm({
    name: '',
    surname: '',
    phone: '',
    email: '',
    message: '',
    viber: '',
    telegram: '',
    whatsapp: '',
});

const hasMessengerContact = computed(() =>
    Boolean(data.viber.trim() || data.telegram.trim() || data.whatsapp.trim()),
);
const attemptedMessengerValidation = ref(false);

function submit() {
    if (!hasMessengerContact.value) {
        attemptedMessengerValidation.value = true;
        return;
    }

    attemptedMessengerValidation.value = false;
    data.post(route('contact.send'), {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            data.reset();
        },
        onError: (errors) => {
            console.log(errors);
        },
    });
}

const flash = computed(() => page.flash);

const show = ref(false);

watch(
    flash,
    (newFlash) => {
        if (newFlash?.success || newFlash?.error) {
            show.value = true;

            setTimeout(() => {
                show.value = false;
            }, 4000);
        }
    },
    { immediate: true },
);
onMounted(() => {
    const urlParams = new URLSearchParams(window.location.search);
    const subjectParam = urlParams.get('subject');

    if (subjectParam) {
        data.subject = subjectParam;
    }
});
</script>
<template>
    <transition name="fade">
        <div
            v-if="show && flash.success"
            role="status"
            aria-live="polite"
            class="fixed top-24 right-0 z-50 rounded-xl bg-[var(--bg-success)] px-6 py-3 text-white shadow-lg md:right-5 lg:top-5"
        >
            {{ flash.success }}
        </div>
    </transition>
    <transition name="fade">
        <div
            v-if="show && flash.error"
            role="alert"
            aria-live="assertive"
            class="fixed top-24 right-0 z-50 rounded-xl bg-[var(--bg-error)] px-6 py-3 text-white shadow-lg md:right-5 lg:top-5"
        >
            {{ flash.error }}
        </div>
    </transition>
    <form class="contact-form" @submit.prevent="submit">
        <div
            class="flex flex-col gap-4 rounded-lg border border-[var(--text-primary)] bg-[var(--bg-basic)] px-8 py-8"
        >
            <div class="initials flex flex-col !gap-4 gap-8 lg:flex-row">
                <div class="field">
                    <label
                        for="contact-surname"
                        class="after:ml-1 after:text-red-500 after:content-['*']"
                        >Прізвищє</label
                    >
                    <input
                        id="contact-surname"
                        name="name"
                        v-model="data.surname"
                        type="text"
                        placeholder="Таранович"
                        required
                    />
                    <span
                        v-if="data.errors.surname"
                        id="name-error"
                        role="alert"
                        class="mt-2 text-center text-sm font-medium text-red-500"
                        >Будь ласка, введіть ваше прізвище.
                    </span>
                </div>
                <div class="field">
                    <label
                        for="contact-name"
                        class="after:ml-1 after:text-red-500 after:content-['*']"
                        >Ім’я</label
                    >
                    <input
                        id="contact-name"
                        name="name"
                        v-model="data.name"
                        type="text"
                        placeholder="Марія"
                        required
                    />
                    <span
                        v-if="data.errors.name"
                        id="name-error"
                        role="alert"
                        class="mt-2 text-center text-sm font-medium text-red-500"
                        >Будь ласка, введіть ваше ім’я.
                    </span>
                </div>
            </div>
            <div class="field">
                <label
                    for="contact-phone"
                    class="after:ml-1 after:text-red-500 after:content-['*']"
                    >Телефон
                </label>
                <input
                    id="contact-phone"
                    name="phone"
                    v-model="data.phone"
                    type="tel"
                    placeholder="+38 000 000 00 00 "
                    required
                />
                <span
                    v-if="data.errors.phone"
                    id="phone-error"
                    role="alert"
                    class="mt-2 text-center text-sm font-medium text-red-500"
                    >Будь ласка, введіть номер телефону
                </span>
            </div>
            <div class="field">
                <label
                    for="contact-application"
                    class="after:ml-1 after:text-red-500 after:content-['*']"
                    >Ваш контакт месенджері</label
                >
                <div class="flex flex-col gap-2">
                    <div
                        class="flex w-[70%] flex-col items-start justify-center lg:flex-row lg:items-center lg:justify-between lg:gap-2"
                    >
                        <label for="contact-viber">Viber</label>
                        <input
                            id="contact-viber"
                            name="viber"
                            v-model="data.viber"
                            type="text"
                            placeholder="+380 00 000 00 00"
                            :aria-invalid="
                                Boolean(
                                    data.errors.viber ||
                                    (attemptedMessengerValidation &&
                                        !hasMessengerContact),
                                )
                            "
                        />
                    </div>
                    <div
                        class="flex w-[70%] flex-col items-start justify-center lg:flex-row lg:items-center lg:justify-between lg:gap-2"
                    >
                        <label for="contact-telegram">Telegram</label>
                        <input
                            id="contact-telegram"
                            name="telegram"
                            v-model="data.telegram"
                            type="text"
                            placeholder="@username або номер телефону"
                            :aria-invalid="
                                Boolean(
                                    data.errors.telegram ||
                                    (attemptedMessengerValidation &&
                                        !hasMessengerContact),
                                )
                            "
                        />
                    </div>
                    <div
                        class="flex w-[70%] flex-col items-start justify-center lg:flex-row lg:items-center lg:justify-between lg:gap-2"
                    >
                        <label for="contact-whatsapp"> WhatsApp</label>
                        <input
                            id="contact-whatsapp"
                            name="whatsapp"
                            v-model="data.whatsapp"
                            type="text"
                            placeholder="+380 00 000 00 00"
                            :aria-invalid="
                                Boolean(
                                    data.errors.whatsapp ||
                                    (attemptedMessengerValidation &&
                                        !hasMessengerContact),
                                )
                            "
                        />
                    </div>
                    <span
                        id="contact-messenger-error"
                        v-if="
                            (attemptedMessengerValidation &&
                                !hasMessengerContact) ||
                            data.errors.viber ||
                            data.errors.telegram ||
                            data.errors.whatsapp
                        "
                        role="alert"
                        class="text-center text-sm font-medium text-red-500"
                        >Заповніть хоча б одне поле з контактами у
                        месенджерах.</span
                    >
                    <span
                        v-else
                        class="text-start text-sm font-medium text-[var(--color-primary)]"
                        >* Обов'язково заповніть хоча б одне поле</span
                    >
                </div>
            </div>
            <div class="field">
                <label
                    for="contact-email"
                    class="after:ml-1 after:text-red-500 after:content-['*']"
                    >Email
                </label>
                <input
                    id="contact-email"
                    name="email"
                    v-model="data.email"
                    type="email"
                    placeholder="example@gmail.com "
                    required
                />
                <span
                    v-if="data.errors.email"
                    id="email-error"
                    role="alert"
                    class="mt-2 text-center text-sm font-medium text-red-500"
                    >Будь ласка, введіть ваш email.</span
                >
            </div>

            <div class="field">
                <label
                    for="contact-message"
                    class="after:ml-1 after:text-red-500 after:content-['*']"
                    >З чим хочете звернутися?</label
                >
                <textarea
                    id="contact-message"
                    name="message"
                    v-model="data.message"
                    rows="5"
                    placeholder="Кілька слів про ваш запит ..."
                    required
                ></textarea>
                <span
                    v-if="data.errors.message"
                    id="message-error"
                    role="alert"
                    class="mt-2 text-center text-sm font-medium text-red-500"
                    >Будь ласка, напишіть, з чим хочете звернутися.</span
                >
            </div>
            <button type="submit">Надіслати</button>
        </div>
    </form>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition:
        opacity 0.4s ease,
        transform 0.4s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}
</style>
