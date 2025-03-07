<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section class="password-container">
        <!-- Alterar Senha -->
        <div class="password"> 
            <h2> Alterar Senha</h2>
        </div>

        <!-- Formulário de edição -->
        <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
            <!-- Senha atual -->
            <div class="input-group">
                <InputLabel for="current_password" value="Senha Atual" />

                <TextInput
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="current-password"
                />

                <InputError :message="form.errors.current_password" class="mt-2" />
            </div>

            <!-- nova senha -->
            <div class="input-group">
                <InputLabel for="password" value="Nova Senha" />

                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />

                <InputError :message="form.errors.password" class="mt-2" />
            </div>

            <!-- consirmar senha -->
            <div class="input-group">
                <InputLabel for="password_confirmation" value="Confirme sua nova senha" />

                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />

                <InputError :message="form.errors.password_confirmation" class="mt-2" />
              <!-- Botão de salvar -->
              <div class="button-salve">
    <button
        class="custom-button"
        :disabled="form.processing"
    >
        Salvar
    </button>
    </div>
    
    <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
    </Transition>
            </div>
        </form>
    </section>
</template>

<style scoped>
.password-container {
    max-width: 600px;
    margin: 0 auto;
}

.password{
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
    background-color: #ffffff; /* Cor de fundo clara */
    color: #333; /* Cor do texto */
    border: 1px solid #135572; /* Cor da borda */
    padding: 12px;
    font-size: 16px;
    border-radius: 10px;
    width: 100%;
}

.button-salve {
    margin-top: 30px;
    background-color:  #135572;;
    color: white;
    padding: 10px 20px;
    font-size: 15px;
    border-radius: 25px;
    width: 85px;
}

</style>