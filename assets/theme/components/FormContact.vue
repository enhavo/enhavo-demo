<template>
    <!-- Shown after a successful, valid submission -->
    <div v-if="submitted" class="contact-form__success">
        <div class="theme-headline boldHeadline">Vielen Dank!</div>
        <p class="theme-text">{{ successMessage }}</p>
    </div>

    <form-form v-else :form="form" @submit="onSubmit" novalidate class="contact-form">
        <div class="contact-form">
            <div class="form-row" :class="{ 'has-error': hasError('title') }">
                <label v-if="titleField.label">{{ titleField.label }}</label>
                <div ref="titleRef" class="contact-select"
                     :class="{ 'is-open': titleOpen, 'is-selected': !!titleField.value }">
                    <div class="contact-select__trigger" @click="titleOpen = !titleOpen">
                        <span class="contact-select__value">{{ titleLabel }}</span>
                        <span class="contact-select__caret"></span>
                    </div>
                    <ul class="contact-select__list" v-show="titleOpen">
                        <li v-for="choice in titleField.choices" :key="choice.value"
                            class="contact-select__item" @click="selectTitle(choice)">
                            {{ choice.label }}
                        </li>
                    </ul>
                    <input type="hidden" :name="titleField.fullName" :value="titleField.value">
                </div>
                <form-errors :form="form.get('title')"></form-errors>
            </div>
            <div class="form-row" :class="{ 'has-error': hasError('firstName') }">
                <form-row :form="form.get('firstName')"></form-row>
            </div>
            <div class="form-row" :class="{ 'has-error': hasError('lastName') }">
                <form-row :form="form.get('lastName')"></form-row>
            </div>
            <div class="form-row" :class="{ 'has-error': hasError('message') }">
                <form-row :form="form.get('message')"></form-row>
            </div>
            <form-widget v-if="form.has('_token')" :form="form.get('_token')"></form-widget>
        </div>

        <label class="contact-form__consent" :class="{ 'has-error': hasError('disclaimer') }">
            <form-widget :form="form.get('disclaimer')"></form-widget>
            <span v-html="form.get('disclaimer')?.label"></span>
        </label>
        <form-errors :form="form.get('disclaimer')"></form-errors>

        <button class="contact-form__submit" type="submit" :disabled="loading">
            Kontakt aufnehmen
        </button>
    </form-form>
</template>

<script setup lang="ts">
import {ref, computed, onMounted, onUnmounted} from "vue";
import {ChoiceForm} from "@enhavo/vue-form/model/ChoiceForm";
import {FormUtil} from "@enhavo/vue-form/form/FormUtil";

const props = defineProps<{
    form: ChoiceForm
}>()

const loading = ref(false)
const submitted = ref(false)
const successMessage = ref('')

// --- custom dropdown for the title/anrede field (styled like the jobs dropdown) ---
const titleField = props.form.get('title') as ChoiceForm
const titleOpen = ref(false)
const titleRef = ref<HTMLElement | null>(null)

const titleLabel = computed(() => {
    const choice = titleField.choices?.find((c: any) => c.value === titleField.value)
    return choice ? choice.label : (titleField.placeholder || 'Auswählen')
})

function selectTitle(choice: any): void
{
    titleField.value = choice.value
    titleField.dispatchChange?.()
    titleOpen.value = false
}

function onDocumentClick(event: MouseEvent): void
{
    if (titleRef.value && !titleRef.value.contains(event.target as Node)) {
        titleOpen.value = false
    }
}

onMounted(() => document.addEventListener('click', onDocumentClick))
onUnmounted(() => document.removeEventListener('click', onDocumentClick))

function hasError(name: string): boolean
{
    const field = props.form.get(name)
    return !!field && Array.isArray(field.errors) && field.errors.length > 0
}

function applyErrors(formData: any): void
{
    props.form.errors = formData?.errors ?? []

    for (const child of (formData?.children ?? [])) {
        if (!props.form.has(child.name)) {
            continue
        }

        props.form.get(child.name).errors = child.errors ?? []

        // Keep the refreshed CSRF token so a retry submits a valid one.
        if (child.name === '_token' && typeof child.value === 'string') {
            props.form.get('_token').value = child.value
        }
    }
}

async function onSubmit(event: Event): Promise<void>
{
    event.preventDefault()
    loading.value = true

    try {
        const response = await FormUtil.submitAsync(props.form)

        if (response?.data?.success) {
            // Backend-driven redirect wins (e.g. to /success)...
            if (response.data.redirect) {
                window.location.href = response.data.redirect
                return
            }
            // ...otherwise show an inline confirmation.
            successMessage.value = response.data.message ?? 'Ihre Nachricht wurde erfolgreich gesendet.'
            submitted.value = true
        }
    } catch (error: any) {
        const data = error?.response?.data

        if (data?.form) {
            applyErrors(data.form)
        }
    } finally {
        loading.value = false
    }
}
</script>
