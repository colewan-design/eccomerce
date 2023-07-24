<template>
    <v-window v-model="step">
    <v-window-item :value="1">
    <v-card
      width="550"
      align-center
      column
      variant="outlined"
      color="#5F9656"
      dense
    >
      <v-img
        src="https://gcdnb.pbrd.co/images/yyvLFCMctIZf.png?o=1"
        height="200"
      ></v-img>
      <h1 align-center>Join Us Today</h1>
      <v-text-field
        class="ma-6"
        label="Email"
        variant="outlined"
        color="#2D4D22"
      ></v-text-field>

      <v-text-field
        class="ma-6"
        type="Password"
        label="Password"
        variant="outlined"
        color="#2D4D22"
        length="300px"
      ></v-text-field>

      <v-btn class="ma-4 font-weight-bold" variant="flat" color="#C2EB8E"
         @click="step = 2">Proceed</v-btn
      >
      <v-divider></v-divider>
      <h2 align-center>Or:</h2>
      <v-card column class="ml-5">
        <v-btn class="ma-2" variant="outlined" color="red"
          >Sign Up With Google</v-btn>
        <v-btn variant="outlined" color="blue">Sign Up With Facebook</v-btn>
      </v-card>
    </v-card>

</v-window-item>

<v-window-item :value ="2">
    <v-card
    width="1000"
    align-center
    column
    variant="outlined"
    color="#5F9656"
    dense
  >
    <v-img
      src="https://gcdnb.pbrd.co/images/yyvLFCMctIZf.png?o=1"
      height="150"
    ></v-img>
    <h1 align-center>Almost there!</h1>
    <v-text-field
      class="ma-6"
      label="Name"
      variant="outlined"
      color="#2D4D22"
    ></v-text-field>

    <v-text-field
      class="ma-6"
      label="Contact Number"
      variant="outlined"
      color="#2D4D22"
    ></v-text-field>

    <v-text-field
      class="ma-6"
      label="Delivery Address"
      variant="outlined"
      color="#2D4D22"
    ></v-text-field>

    <v-btn
      class="ma-4 font-weight-bold"
      variant="flat"
      color="#C2EB8E"
      size="x-large"
      >Finish</v-btn
    >
  </v-card>
</v-window-item>
</v-window>
</template>

  <style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }

    .navigation_bar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 8rem;
      width: 100%;
      background-color: #4d783f;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 7%;
      box-sizing: content-box;
      box-shadow: var (--box-shadow);
      z-index: 1000;
    }

    .left_section {
      display: flex;
      align-items: center;
    }

    .logo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #ffffff;
    }

    .company_name {
      color: #ffffff;
      margin-left: 5px;
      font-weight: bold;
      font-family: 'Gelasio', serif;
      font-style: italic;
    }

    .right_section {
      display: flex;
      align-items: center;
    }

    .navigation_links {
      display: flex;
      list-style: none;
      margin-right: 20px;
      justify-content: center;
      align-items: center;
      padding: 1rem;
      border-bottom: 2px solid transparent;
    }

    .navigation_links li {
      color: #ffffff;
      margin-right: 15px;
      cursor: pointer;
    }

    .content_section {
      margin-top: 150px;
      margin-left: 100px;
    }

    h1 {
      font-size: 45px;
      font-weight: 600;
      font-style: italic;
      font-family: 'Gelasio', serif;
      color: #2d4d22;
    }

    p {
      font-size: 20px;
      color: #000;
    }

    .navigation_bar {
      height: 100px;
      width: 100%;
      background-color: #4d783f;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 50px;
      font-family: 'Inter', sans-serif;
      font-size: 20px;
      color: #ffffff;
    }

    .navigation_section ul {
      list-style-type: none;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      padding: 0;
    }

    .navigation_section ul li {
      margin-right: 20px;
    }

    .navigation_section ul li a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      font-weight: bold;
      font-family: 'Inter', sans-serif;
    }

    .logo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: white;
    }

    .company_name {
      margin-left: 10px;
      font-size: 50px;
      color: white;
    }

    .user_section {
      display: flex;
      align-items: center;
    }

    .button_set_a {
      width: 158px;
      height: 52px;
      border-radius: 13px;
      background-color: #2d4d22;
      font-family: 'Inter', sans-serif;
      font-weight: bold;
      font-size: 18px;
      color: #ffffff;
    }

    .sign_up_button {
      width: 158px;
      height: 52px;
      border-radius: 13px;
      background-color: #c7c47f;
      font-family: 'Inter', sans-serif;
      font-weight: bold;
      font-size: 18px;
      color: #2d4d22;
    }

    h1 {
      font-size: 45px;
      font-weight: 600;
      font-style: italic;
      font-family: 'Gelasio', serif;
      color: #2d4d22;
      margin-bottom: 20px;
      text-align: center;
    }

    h3 {
      font-size: 25px;
      font-weight: 600;
      /* font-style: italic; */
      font-family: 'Gelasio', sans-serif;
      color: #2d4d22;
      margin-bottom: 20px;
      text-align: center;
    }

    .row {
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .column {
      text-align: center;
    }

    .banner {
      object-fit: cover;
      width: 100%;
      height: 300px;
      background-image: url('https://images.pexels.com/photos/2252482/pexels-photo-2252482.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
      background-position: center;
      background-size: cover;
      opacity: 0.75;
    }

    .next_button {
      display: flex;
      justify-content: center;
      margin-top: 40px; /* Increased margin for spacing */
    }

    .next_button button {
      font-size: 18px;
      font-weight: bold;
      color: #ffffff;
      background-color: #2d4d22;
      border: none;
      border-radius: 13px;
      padding: 10px 20px;
      margin-right: 10px;
      cursor: pointer;
    }
    .next_button .button_set_a {
      font-size: 20px;
    }
  </style>


<script>
    import router from '../routes.js';
    export default {

    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

    body {
        font-family: 'Inter', sans-serif;
    }

    .navigation_bar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 8rem;
        width: 100%;
        background-color: #4d783f;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 7%;
        box-sizing: content-box;
        box-shadow: var (--box-shadow);
        z-index: 1000;
    }

    .left_section {
        display: flex;
        align-items: center;
    }

    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ffffff;
    }

    .company_name {
        color: #ffffff;
        margin-left: 10px;
        font-weight: bold;
        font-family: 'Gelasio', serif;
        font-style: italic;
    }

    .right_section {
        display: flex;
        align-items: center;
    }

    .navigation_links {
        display: flex;
        list-style: none;
        margin-right: 20px;
        justify-content: center;
        align-items: center;
        padding: 1rem;
        border-bottom: 2px solid transparent;
    }

    .navigation_links li {
        color: #ffffff;
        margin-right: 15px;
        cursor: pointer;
    }

    .content_section {
        margin-top: 150px;
        margin-left: 100px;
    }

    h1 {
        font-size: 45px;
        font-weight: 600;
        font-style: italic;
        font-family: 'Gelasio', serif;
        color: #2d4d22;
    }

    p {
        font-size: 20px;
        color: #000;
    }

    .navigation_bar {
        height: 100px;
        width: 100%;
        background-color: #4d783f;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 50px;
        font-family: 'Inter', sans-serif;
        font-size: 20px;
        color: #ffffff;

    }

    .navigation_section ul {
        list-style-type: none;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        padding: 0;
    }

    .navigation_section ul li {
        margin-right: 20px;
    }

    .navigation_section ul li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        font-family: 'Inter', sans-serif;
    }


    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: white;
    }

    .company_name {
        margin-left: 10px;
        font-size: 50px;
        color: white;
    }


    .user_section {
        display: flex;
        align-items: center;
    }

    .button_set_a {
        /* width: 158px;
        height: 52px; */
        border-radius: 13px;
        background-color: #2d4d22;
        font-family: 'Inter', sans-serif;
        font-weight: bold;
        font-size: 18px;
        color: #ffffff;
    }

    .sign_up_button {
        width: 158px;
        height: 52px;
        border-radius: 13px;
        background-color: #C7C47F;
        font-family: 'Inter', sans-serif;
        font-weight: bold;
        font-size: 18px;
        color: #2d4d22;

    }
</style>
