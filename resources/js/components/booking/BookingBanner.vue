<script setup>
import { onUnmounted, ref, watch } from 'vue';
import { Link } from '@inertiajs/vue3';
import { MoveRight, X } from '@lucide/vue';

const props = defineProps({
    service: {
        type: Object,
        default: null,
    },
});

const emit = defineEmits(['close']);


const hasAgreed = ref(false);
const isSubmitting = ref(false);
const submissionError = ref('');
let previousBodyOverflow = null;

watch(
    () => props.service !== null,
    (isOpen) => {
        if (isOpen) {
            previousBodyOverflow = document.body.style.overflow;
            document.body.style.overflow = 'hidden';
        } else if (previousBodyOverflow !== null) {
            document.body.style.overflow = previousBodyOverflow;
            previousBodyOverflow = null;
        }
    },
);

onUnmounted(() => {
    if (previousBodyOverflow !== null) {
        document.body.style.overflow = previousBodyOverflow;
    }
});

const closeBanner = () => {
    hasAgreed.value = false;
    submissionError.value = '';
    emit('close');
};

const continueToBooking = async () => {
    const service = props.service;

    if (!hasAgreed.value || !service?.booking_url || isSubmitting.value) {
        return;
    }

    isSubmitting.value = true;
    submissionError.value = '';

    try {
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content');

        if (!csrfToken) {
            throw new Error('CSRF-токен не знайдено в HTML.');
        }

        const response = await fetch('/consent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
            },
            credentials: 'same-origin',
            body: JSON.stringify({
                serviceId: String(service.id),
                termsAccepted: true,
                consentAccepted: true,
            }),
        });

        if (!response.ok) {
            throw new Error(
                `Не вдалося зберегти згоду. Код відповіді: ${response.status}`,
            );
        }

        window.location.assign(service.booking_url);
    } catch (error) {
        console.error('Не вдалося зберегти згоду перед записом:', error);
        submissionError.value =
            'Не вдалося зберегти вашу згоду. Будь ласка, спробуйте ще раз.';
    } finally {
        isSubmitting.value = false;
    }
};
</script>

<template>
    <div
        v-if="service"
        class="fixed inset-0 z-[100] grid place-items-center bg-black/50"
        @click.self="closeBanner"
    >
        <div
            role="dialog"
            aria-modal="true"
            aria-labelledby="booking-banner-title"
            class="relative m-auto max-h-[90vh] w-full max-w-2xl overflow-y-auto rounded-3xl border-[0.5px] border-[var(--text-secondary)] bg-white p-8 shadow-lg"
        >
            <button
                type="button"
                aria-label="Закрити вікно"
                class="absolute top-4 right-4 rounded-full p-2 text-[var(--text-secondary)] hover:bg-[var(--bg-menu)] focus-visible:outline-2 focus-visible:outline-offset-2"
                @click="closeBanner"
            >
                <X aria-hidden="true" class="size-5" />
            </button>

            <h2
                id="booking-banner-title"
                class="!mb-4 !text-3xl text-[var(--text-primary)]"
            >
                Умови роботи
            </h2>
            <p class="!text-base">
                Послуга: {{ service.title }}. Консультація триває
                {{ service.duration }} та проходить онлайн. Вартість —
                {{ service.price }} €. Після запису вам буде надіслано посилання
                на оплату. Оплатити потрібно протягом 48 годин після отримання
                посилання. Зустріч підтверджується після оплати; якщо оплата не
                надійде вчасно, запис буде скасовано.
            </p>

            <h2 class="!mb-2 !text-3xl text-[var(--text-primary)]">
                Інформована згода
            </h2>
            <Link
                href="/informed-consent"
                aria-label="Ознайомитися з текстом інформованої згоди"
                class="banner_link mb-4 flex flex-row items-center justify-center gap-4 !text-base text-[var(--text-primary)] underline !shadow-none md:justify-start"
            >
                Ознайомитися з текстом інформованої згоди
            </Link>

            <label class="!mb-6 flex items-start !text-base">
                <input
                    v-model="hasAgreed"
                    type="checkbox"
                    name="agreement"
                    class="mt-1 mr-4 size-5 shrink-0 cursor-pointer accent-[var(--bg-button-primary)]"
                />
                Я ознайомився/ознайомилася з умовами роботи та надаю інформовану
                згоду на консультацію.
            </label>

            <p
                v-if="submissionError"
                role="alert"
                class="mt-4 text-center text-sm text-red-600"
            >
                {{ submissionError }}
            </p>

            <button
                type="button"
                :disabled="!hasAgreed || !service.booking_url || isSubmitting"
                class="mx-auto mt-4 flex w-[80%] justify-center rounded-full bg-[var(--bg-button-primary)] px-8 py-3 text-white shadow-sm disabled:cursor-not-allowed disabled:opacity-50"
                @click="continueToBooking"
            >
                {{
                    isSubmitting ? 'Зберігаємо...' : 'Підтвердити та продовжити'
                }}
            </button>
        </div>
    </div>
</template>
