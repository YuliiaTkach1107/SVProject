<script setup >
import { computed, ref } from 'vue';
import { ChevronDown } from '@lucide/vue';
import BookingBanner from '@/components/booking/BookingBanner.vue';

const props = defineProps({
    services: {
        type: Array,
        default: () => [],
    },
});

const groupedServices = computed(() => {
    const result = {};

    props.services.forEach((service) => {
        if (!result[service.title]) {
            result[service.title] = [];
        }

        result[service.title].push(service);
    });

    return result;
});
const expandedServiceIds = ref([]);
const selectedService = ref(null);

const toggleServiceDetails = (id) => {
    expandedServiceIds.value = expandedServiceIds.value.includes(id)
        ? expandedServiceIds.value.filter((expandedId) => expandedId !== id)
        : [...expandedServiceIds.value, id];
};

const selectService = (service) => {
    selectedService.value = service;
};
</script>

<template>
    <section
        id="services_section"
        aria-labelledby="services-heading"
        class="align-center relative min-h-screen bg-[var(--bg-menu)] py-15"
    >
        <div class="flex flex-col">
            <span>ПОСЛУГИ</span>
            <h2 id="services-heading" class="text-[var(--text-primary)]">
                Ви можете обрати ...
            </h2>
            <div class="m-auto mt-5 flex w-[100%] flex-col gap-4 lg:w-[90%]">
                <div
                    v-for="(details, title) in groupedServices"
                    :key="title"
                    class="rounded-lg border border-[var(--border-primary)] p-6 shadow-md transition-shadow hover:shadow-lg"
                >
                    <div
                        v-if="details.length === 1 && !details[0].subtitle"
                        class="md:hidden"
                    >
                        <h3>{{ title }}</h3>

                       <Transition name="service-expand">
                            <div
                                v-show="expandedServiceIds.includes(details[0].id)"
                                :id="`service-details-mobile-${details[0].id}`"
                                class="service-expand"
                            >
                                <div class="min-h-0 overflow-hidden">
                                    <div class="mt-3 space-y-3 rounded-md bg-white/60 p-4">
                                        <p
                                            v-if="details[0].summary"
                                            class="service-summary"
                                        >
                                            {{ details[0].summary }}
                                        </p>

                                        <p
                                            v-if="details[0].description"
                                            class="text-sm text-[var(--text-secondary)]"
                                        >
                                            {{ details[0].description }}
                                        </p>

                                        <dl
                                            class="grid grid-cols-2 gap-y-2 border-t border-[var(--border-primary)]/20 pt-3 text-sm"
                                        >
                                            <template v-if="details[0].duration">
                                                <dt class="text-[var(--text-secondary)]">
                                                    Тривалість
                                                </dt>
                                                <dd class="text-right text-[var(--text-primary)]">
                                                    {{ details[0].duration }}
                                                </dd>
                                            </template>

                                            <template v-if="details[0].price">
                                                <dt class="text-[var(--text-secondary)]">
                                                    Вартість
                                                </dt>
                                                <dd class="text-right font-medium text-[var(--text-primary)]">
                                                    {{ details[0].price }}
                                                    €
                                                    <span v-if="details[0].price_note">
                                                        {{ details[0].price_note }}
                                                    </span>
                                                </dd>
                                            </template>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </Transition>
                        <div class="mt-4 flex flex-col items-stretch gap-3">
                            <button
                                type="button"
                                class="inline-flex !w-full items-center justify-center gap-1.5 rounded-full border border-[var(--border-secondary)]/50 px-3 py-2 text-sm font-medium text-[var(--text-secondary)] transition-colors hover:bg-[var(--bg-menu)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[var(--border-secondary)]"
                                :aria-label="`${expandedServiceIds.includes(details[0].id) ? 'Згорнути деталі' : 'Показати деталі'}: ${title}`"
                                :aria-expanded="
                                    expandedServiceIds.includes(details[0].id)
                                "
                                :aria-controls="`service-details-mobile-${details[0].id}`"
                                @click="toggleServiceDetails(details[0].id)"
                            >
                                {{
                                    expandedServiceIds.includes(details[0].id)
                                        ? 'Згорнути'
                                        : 'Детальніше'
                                }}
                                <ChevronDown
                                    aria-hidden="true"
                                    class="size-4 transition-transform"
                                    :class="{
                                        'rotate-180':
                                            expandedServiceIds.includes(
                                                details[0].id,
                                            ),
                                    }"
                                />
                            </button>
                            <button
                                type="button"
                                :disabled="!details[0].booking_url"
                                :aria-label="`Записатися на послугу: ${title}`"
                                @click="selectService(details[0])"
                                class="inline-flex !w-full items-center justify-center !rounded-full !bg-[var(--bg-button-primary)] !px-4 !py-2 !text-sm whitespace-nowrap !text-white disabled:cursor-not-allowed disabled:opacity-50"
                            >
                                Записатись
                            </button>
                        </div>
                    </div>

                    <div v-else class="space-y-4 md:hidden">
                        <h3>{{ title }}</h3>
                        <div
                            v-for="(detail, index) in details"
                            :key="detail.id"
                            :class="
                                index > 0 &&
                                'border-t border-[var(--border-primary)]/20 pt-4'
                            "
                        >
                            <h4 v-if="detail.subtitle">
                                {{ detail.subtitle }}
                            </h4>
                            <Transition name="service-expand">
                                <div
                                    v-show="expandedServiceIds.includes(detail.id)"
                                    :id="`service-details-mobile-${detail.id}`"
                                    class="service-expand"
                                >
                                    <div class="min-h-0 overflow-hidden">
                                        <div class="mt-3 space-y-3 rounded-md bg-white/60 p-4">
                                            <p
                                                v-if="detail.summary"
                                                class="service-summary"
                                            >
                                                {{ detail.summary }}
                                            </p>

                                            <p
                                                v-if="detail.description"
                                                class="text-sm text-[var(--text-secondary)]"
                                            >
                                                {{ detail.description }}
                                            </p>

                                            <dl
                                                class="grid grid-cols-2 gap-y-2 border-t border-[var(--border-primary)]/20 pt-3 text-sm"
                                            >
                                                <template v-if="detail.duration">
                                                    <dt class="text-[var(--text-secondary)]">
                                                        Тривалість
                                                    </dt>
                                                    <dd class="text-right text-[var(--text-primary)]">
                                                        {{ detail.duration }}
                                                    </dd>
                                                </template>

                                                <template v-if="detail.price">
                                                    <dt class="text-[var(--text-secondary)]">
                                                        Вартість
                                                    </dt>
                                                    <dd class="text-right font-medium text-[var(--text-primary)]">
                                                        {{ detail.price }} €
                                                        <span v-if="detail.price_note">
                                                            {{ detail.price_note }}
                                                        </span>
                                                    </dd>
                                                </template>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </Transition>
                            <div
                                class="mt-4 flex flex-col gap-3"
                            >
                                <button
                                    type="button"
                                    class="inline-flex !w-full items-center justify-center gap-1.5 rounded-full border border-[var(--border-secondary)]/50 px-3 py-2 text-sm font-medium text-[var(--text-secondary)] transition-colors hover:bg-[var(--bg-menu)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[var(--border-secondary)]"
                                    :aria-label="`${expandedServiceIds.includes(detail.id) ? 'Згорнути деталі' : 'Показати деталі'}: ${title}${detail.subtitle ? ', ' + detail.subtitle : ''}`"
                                    :aria-expanded="
                                        expandedServiceIds.includes(detail.id)
                                    "
                                    :aria-controls="`service-details-mobile-${detail.id}`"
                                    @click="toggleServiceDetails(detail.id)"
                                >
                                    {{
                                        expandedServiceIds.includes(
                                            detail.id,
                                        )
                                            ? 'Згорнути'
                                            : 'Детальніше'
                                    }}
                                    <ChevronDown
                                        aria-hidden="true"
                                        class="size-4 transition-transform"
                                        :class="{
                                            'rotate-180':
                                                expandedServiceIds.includes(
                                                    detail.id,
                                                ),
                                        }"
                                    />
                                </button>
                                <button
                                    type="button"
                                    :disabled="!detail.booking_url"
                                    :aria-label="`Записатися на послугу: ${title}${detail.subtitle ? ', ' + detail.subtitle : ''}`"
                                    @click="selectService(detail)"
                                    class="inline-flex !w-full items-center justify-center !rounded-full !bg-[var(--bg-button-primary)] !px-4 !py-2 !text-sm whitespace-nowrap !text-white disabled:cursor-not-allowed disabled:opacity-50"
                                >
                                    Записатись
                                </button>
                            </div>
                        </div>
                    </div>

                    <table class="hidden w-full md:table">
                        <caption class="sr-only">
                            Послуга:
                            {{
                                title
                            }}
                        </caption>
                        <thead class="sr-only">
                            <tr>
                                <th scope="col">Послуга та тривалість</th>
                                <th scope="col">Вартість</th>
                                <th scope="col">Запис</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-if="
                                    details.length === 1 && !details[0].subtitle
                                "
                            >
                                <td class="flex-1">
                                    <h3>{{ title }}</h3>
                                    <p v-if="details[0].duration">
                                        {{ details[0].duration }}
                                    </p>
                                    <p
                                        v-if="details[0].summary"
                                        class="service-summary hidden md:block"
                                    >
                                        {{ details[0].summary }}
                                    </p>
                                </td>

                                <td class="w-50 text-center">
                                    <p
                                        v-if="details[0].price"
                                        class="!font-medium"
                                    >
                                        {{ details[0].price }}
                                        €
                                    </p>
                                    <p v-if="details[0].price_note">
                                        {{ details[0].price_note }}
                                    </p>
                                </td>

                                <td class="w-60 text-center">
                                    <button
                                        type="button"
                                        :disabled="!details[0].booking_url"
                                        :aria-label="`Записатися на послугу: ${title}`"
                                        @click="selectService(details[0])"
                                        class="service_button inline-flex min-h-10 cursor-pointer items-center justify-center gap-2 rounded-full bg-[var(--bg-button-primary)] !px-6 py-3 text-sm font-medium whitespace-nowrap text-[var(--text-button-primary)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[var(--border-secondary)] sm:px-4 sm:text-sm md:text-base disabled:cursor-not-allowed disabled:opacity-50"
                                    >
                                        Записатись онлайн
                                    </button>
                                </td>
                            </tr>

                            <template v-else>
                                <tr>
                                    <td colspan="3" class="pb-3">
                                        <h3>{{ title }}</h3>
                                    </td>
                                </tr>

                                <tr
                                    v-for="(detail, index) in details"
                                    :key="detail.id"
                                    :class="
                                        index > 0 && 'border-t border-gray-100'
                                    "
                                >
                                    <td
                                        :class="['flex-1', index > 0 && 'pt-3']"
                                    >
                                        <h4 v-if="detail.subtitle">
                                            {{ detail.subtitle }}
                                        </h4>
                                        <p v-if="detail.duration">
                                            {{ detail.duration }}
                                        </p>
                                        <p
                                            v-if="
                                                detail.summary &&
                                                index === details.length - 1
                                            "
                                            class="service-summary hidden md:block"
                                        >
                                            {{ detail.summary }}
                                        </p>
                                    </td>

                                    <td
                                        :class="[
                                            'w-50 text-center',
                                            index > 0 && 'pt-3',
                                        ]"
                                    >
                                        <p
                                            v-if="detail.price"
                                            class="!font-medium"
                                        >
                                            {{ detail.price }}
                                            €
                                        </p>
                                        <p v-if="detail.price_note">
                                            {{ detail.price_note }}
                                        </p>
                                    </td>

                                    <td
                                        :class="[
                                            'w-60 text-center',
                                            index > 0 && 'pt-3',
                                        ]"
                                    >
                                        <button
                                            type="button"
                                            :disabled="!detail.booking_url"
                                            :aria-label="`Записатися на послугу: ${title}${detail.subtitle ? ', ' + detail.subtitle : ''}`"
                                            @click="selectService(detail)"
                                            class="service_button inline-flex min-h-10 cursor-pointer items-center justify-center gap-2 rounded-full bg-[var(--bg-button-primary)] !px-6 py-3 text-sm font-medium whitespace-nowrap text-[var(--text-button-primary)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[var(--border-secondary)] sm:px-4 sm:text-sm md:text-base  disabled:cursor-not-allowed disabled:opacity-50"
                                        >
                                            Записатись онлайн
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <BookingBanner
            :service="selectedService"
            @close="selectedService = null"
        />
    </section>
</template>
