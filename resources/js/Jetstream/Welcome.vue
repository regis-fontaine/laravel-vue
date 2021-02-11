<template>
  <div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
      <div>
        <logo class="block h-12 w-auto" />
      </div>

      <div class="mt-8 text-2xl">Welcome to your Email Sender application!</div>

      <div class="mt-6 text-gray-500">
        L'application permet l'envoi automatique de mails, (avec le même
        contenu) à intervalle régulier, à plusieurs destinataires.
      </div>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
      <div class="p-6">
        <div class="flex items-center">
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            class="w-8 h-8 text-gray-400"
          >
            <path
              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
            ></path>
          </svg>
          <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
            <a href="https://laravel.com/docs">Documentation</a>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
              <ul class="list-decimal list-inside mb-2">
                <li>Se rendre sur l'application via le lien 'Email Sender'</li>
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
                Pour accéder à l'application via le dashboard, rendez-vous sur
                le lien 'Email Sender' ci-dessous ou dans la barre de
                navigation.
              </div>
            </div>

            <jet-nav-link
              :href="route('emailApp')"
              :active="route().current('emailApp')"
              class="mt-3 flex items-center text-sm font-semibold text-indigo-700"
            >
              Email Sender
            </jet-nav-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import JetNavLink from "@/Jetstream/NavLink";
import Logo from "@/components/Logo.vue";

export default {
  components: {
    JetApplicationLogo,
    JetNavLink,
    Logo,
  },
};
</script>
