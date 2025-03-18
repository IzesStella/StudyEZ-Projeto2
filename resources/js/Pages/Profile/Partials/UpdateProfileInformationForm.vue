<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <section class="profile-container">
        <!-- Título da seção -->
        <div class="profile"> 
            <h2>Alterar nome</h2>
        </div>

        <!-- Formulário de edição -->
        <!-- Alterado de form.patch para form.put -->
        <form @submit.prevent="form.put(route('profile.update'))">

            <!-- Nome -->
            <div class="input-group">
                <InputLabel for="name" value="Nome" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <!-- Email -->
            <div class="input-group">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <!-- Verificação de e-mail -->
            <div v-if="props.mustVerifyEmail && user.email_verified_at === null" class="verification-section">
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    Endereço de Email inválido.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    >
                        Clique aqui para reenviar o e-mail de verificação.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600 dark:text-green-400"
                >
                    Um novo link de verificação foi enviado para o seu e-mail.
                </div>
            </div>

            <!-- Botão de salvar -->
            <div class="button-salve">
                <button class="custom-button" :disabled="form.processing">
                    Salvar
                </button>
            </div>
    
            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
            </Transition>
        </form>
    </section>
</template>

<style scoped>
.profile-container {
    max-width: 600px;
    margin: 0 auto;
}

.profile {
    font-size: 20px;
    font-weight: bold;
    color: #000000;
}

.input-group {
    margin-bottom: 24px;
}

.input-group label {
    display: block;
    font-size: 15px;
    font-weight: 600;
    color: #686767;
    margin-bottom: 8px;
} 

.input-group input {
    background-color: #ffffff;
    color: #333;
    border: 1px solid #135572;
    padding: 12px;
    font-size: 16px;
    border-radius: 5px;
    width: 100%;
}

.button-salve {
    background-color: #135572;
    color: white;
    padding: 10px 20px;
    font-size: 15px;
    border-radius: 5px;
    width: 85px;
}
</style>
