<template>
  <nav>
    <v-row>
      <v-col>
        <!-- for tablet and desktop, >600 viewport -->
        <v-app-bar app color="#4d783f" class="d-none d-sm-flex text-white" height="90px">
          <v-app-bar-title class="ml-5 font-weight-black">GoodBasket</v-app-bar-title>
          <v-spacer></v-spacer>
          <template v-slot:append>
            <router-link v-for="(item, i) in items" :key="i" :to="item.path" v-slot="{ navigate }" custom>
              <v-btn class="ma-2" :value="i" @click="navigate" role="link">
                <v-icon :icon="item.icon" class="mr-1"></v-icon>
                <span>{{ item.title }}</span>
              </v-btn>
            </router-link>
            <!-- for logged in users only -->
            <!-- profile -->
            <v-btn class="ma-2">
              <v-icon icon="mdi-account" class="mr-1"></v-icon>
              <span>Profile</span>
            </v-btn>
            <!-- logout -->
            <v-btn class="ma-2" @click="userLogout">
              <v-icon icon="mdi-account-arrow-left-outline" class="mr-1"></v-icon>
              <span>Logout</span>
            </v-btn>
          </template>
        </v-app-bar>

        <!-- for mobile, <600 viewport -->
        <v-bottom-navigation
          class="d-flex d-sm-none text-white"
          app
          v-model="selectedItem"
          bg-color="#4d783f"
          mobile-breakpoint="600"
          density="compact"
          style="height: 4em; position: fixed;"
        >
          <router-link v-for="(item, i) in items" :key="i" :to="item.path" v-slot="{ navigate }" custom>
            <v-btn class="m-0 p-0" :value="i" @click="navigate" role="link">
              <v-icon :icon="item.icon"></v-icon>
              <span>{{ item.title }}</span>
            </v-btn>
          </router-link>
        </v-bottom-navigation>
      </v-col>
    </v-row>
  </nav>
</template>

<script>
  import { onMounted } from 'vue'
  import { useDisplay } from 'vuetify'
  import router from '../../routes.js';
  export default {
    setup() {
      const { width, mobile } = useDisplay()
    },

    data: () => ({
      drawer: false,
      items: [
        { title: 'Products', icon: 'mdi-food-apple-outline', path:'/product-list' },
        { title: 'About Us', icon: 'mdi-information-variant', path:'/' },
        { title: 'How It Works', icon: 'mdi-lightbulb-question-outline', path:'/how-it-works' },
        { title: '', icon: 'mdi-cart', path:'/' },
        { title: 'Login', icon: 'mdi-login-variant', path:'/login' },
      ],
      selectedItem: 0,
      // customer_data: {}
    }),

    methods: {
      close () {
          this.drawer =false;
      },

      async userLogout() {
        this.$store.dispatch('logout');
      }
    },

    // created() {
    //   this.customer_data = this.$store.getters.customerData
    //   console.log('customer_data')
    //   console.log(this.customer_data)
    // },

    // computed: {
    //   customer_data() {
    //     console.log('customer_data')
    //     console.log(this.customer_data)
    //     return this.$store.getters.customerData;
    //   }
    // }
  }
</script>