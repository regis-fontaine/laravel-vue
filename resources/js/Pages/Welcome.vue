<template>
  <div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
  >
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      <inertia-link
        v-if="$page.props.user"
        href="/dashboard"
        class="text-sm text-gray-700 underline"
      >
        Dashboard
      </inertia-link>

      <template v-else>
        <inertia-link
          :href="route('login')"
          class="text-sm text-gray-700 underline"
        >
          Login
        </inertia-link>

        <inertia-link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 text-sm text-gray-700 underline"
        >
          Register
        </inertia-link>
      </template>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
        <logo />
      </div>

      <div
        class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
      >
        <div class="grid grid-cols-1 md:grid-cols-2">
          <div class="p-6">
            <div class="flex items-center">
              <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                class="w-8 h-8 text-gray-500"
              >
                <path
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                ></path>
              </svg>
              <div class="ml-4 text-lg leading-7 font-semibold">
                <p class="underline text-gray-900 dark:text-white">
                  Description
                </p>
              </div>
            </div>

            <div class="ml-12">
              <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                <p class="mb-2">
                  L'application permet l'envoi automatique de mails, (avec le
                  même contenu) à intervalle régulier, à plusieurs
                  destinataires.
                </p>
                <ul class="list-disc list-inside mb-2">
                  <li>
                    Une interface permettant la gestion de l'envoi du mail pour
                    chaque destinataire,
                  </li>
                  <li>
                    Les intervalles possibles sont les suivants :
                    <ul class="list-disc list-square ml-10">
                      <li>Un envoi toutes les minutes</li>
                      <li>Un envoi toutes les 5 minutes</li>
                      <li>Un envoi toutes les 10 minutes</li>
                    </ul>
                  </li>
                  <li>
                    Possibilité de mettre en pause / reprendre l'envoi
                    automatique du mail,
                  </li>
                  <li>
                    Possibilité de changer l'adresse mail du destinataire,
                  </li>
                  <li>Possibilité de créer un nouvel envoi automatique,</li>
                  <li>Possibilité de supprimer un envoi automatique.</li>
                </ul>
                <p class="mb-2">
                  Le contenu du mail sera " Hello World 'date et heure du jour'
                  ".
                </p>
              </div>
            </div>
          </div>

          <div
            class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l"
          >
            <div class="flex items-center">
              <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                class="w-8 h-8 text-gray-500"
              >
                <path
                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                ></path>
              </svg>
              <div class="ml-4 text-lg leading-7 font-semibold">
                <a
                  href="https://laravel-news.com/"
                  class="underline text-gray-900 dark:text-white"
                  >Documentation</a
                >
              </div>
            </div>

            <div class="ml-12">
              <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                <ul class="list-decimal list-inside mb-2">
                  <li>S'enregister via le lien 'Register'</li>
                  <li>Se connecter avec le profil crée</li>
                  <li>Créer un contact via le bouton 'Create Contact'</li>
                  <li>
                    Insérer les informations du contact :
                    <ul class="list-inside list-square ml-10">
                      <li>Receiver = Nom et Prénom</li>
                      <li>Email</li>
                      <li>Interval entre 1, 5 ou 10 minutes</li>
                      <li>Enregister</li>
                    </ul>
                  </li>
                  <li>
                    Activer l'envoi du mail pour le contact :
                    <ul class="list-inside list-square ml-10">
                      <li>
                        Se rendre sur le profil du contact via le bouton 'Edit'
                      </li>
                      <li>Sélectionner 'Status' et le passer à 'ON'</li>
                      <li>Enregister</li>
                    </ul>
                  </li>
                </ul>
                <div class="text-red-600 text-sm font-bold mt-2">
                  Pour accéder à l'application via la page d'accueil,
                  connectez-vous puis vous rendre sur 'Dashboard' puis
                  'EmailApp'.
                </div>
              </div>
            </div>
          </div>

          <div class="p-6 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
              <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                class="w-8 h-8 text-gray-500"
              >
                <path
                  d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                ></path>
                <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
              <div class="ml-4 text-lg leading-7 font-semibold">
                <a
                  href="https://regis-fontaine.netlify.app/"
                  class="underline text-gray-900 dark:text-white"
                  >Développeur</a
                >
              </div>
            </div>

            <div class="ml-12">
              <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                <h1 class="text-lg">Régis Fontaine</h1>
                <div class="my-2 text-sm">
                  <a
                    href="https://github.com/regis-fontaine/laravel-vue"
                    target="_blank"
                    class="underline text-gray-900 dark:text-white"
                    >Repositorie du projet 🌍</a
                  >
                </div>
                <div class="my-2 text-sm">
                  <a
                    href="https://github.com/regis-fontaine/"
                    target="_blank"
                    class="underline text-gray-900 dark:text-white"
                    >Github 🌟</a
                  >
                </div>
                <div class="my-2 text-sm">
                  <a
                    href="https://regis-fontaine.netlify.app/"
                    target="_blank"
                    class="underline text-gray-900 dark:text-white"
                    >Portfolio 💻</a
                  >
                </div>
              </div>
            </div>
          </div>

          <div
            class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l"
          >
            <div class="flex items-center">
              <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                class="w-8 h-8 text-gray-500"
              >
                <path
                  d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                ></path>
              </svg>
              <div
                class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"
              >
                Todo
              </div>
            </div>

            <div class="ml-12">
              <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                Voici une liste non-exhaustive afin d'améliorer l'application:
                <ul class="list-disc ml-10">
                  <li>
                    Certains éléments de Vue peuvent être découper en composant
                  </li>
                  <li>Ajout du multilangue</li>
                  <li>
                    Utilisation le cache pour recharger le front après
                    modification
                  </li>
                  <li>
                    Créer model/controller/Vue pour Message, afin de pouvoir
                    envoyer des mails plus personnalisés
                  </li>
                  <li>Intégrer Message::class dans les tâches</li>
                  <li>Dark Mode</li>
                  <li>Ouvert aux suggestions... .</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 sm:text-left">
          <div class="flex items-center"></div>
        </div>

        <div
          class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0"
        >
          Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.bg-gray-100 {
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
  border-color: #edf2f7;
  border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
  color: #cbd5e0;
  color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
  color: #a0aec0;
  color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
  color: #718096;
  color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
  color: #4a5568;
  color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
  color: #1a202c;
  color: rgba(26, 32, 44, var(--tw-text-opacity));
}

/* @media (prefers-color-scheme: dark) {
  .dark\:bg-gray-800 {
    background-color: #2d3748;
    background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
  }

  .dark\:bg-gray-900 {
    background-color: #1a202c;
    background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
  }

  .dark\:border-gray-700 {
    border-color: #4a5568;
    border-color: rgba(74, 85, 104, var(--tw-border-opacity));
  }

  .dark\:text-white {
    color: #fff;
    color: rgba(255, 255, 255, var(--tw-text-opacity));
  }

  .dark\:text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
  }
} */
</style>

<script>
import Logo from "../components/Logo.vue";
export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
  components: {
    Logo,
  },
};
</script>
