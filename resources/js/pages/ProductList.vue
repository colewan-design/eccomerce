<template>
    <v-container>
        <h1>Our Products</h1>
            <p>Siged Tiklis, The Good Basket, is committed to providing organic and sustainably-sourced products. When you buy a basket, you'll be getting a balanced combination of fruits and vegetables, poultry products, and guilt-free snacks.</p>

            <div class = "flex-fill">
                <v-row cols="12" md="4" lg="4" xl="4" v-for="item in basket_items" :key="item.id">
                    <v-col cols="12" md="4" lg="4" xl="4">
                        <v-img aspect-ratio="4/3" src="/img/placeholder/jk-placeholder-image-300x203.jpg"></v-img>
                    </v-col>
                    <v-col >

                    <h1>{{ item.basket_item_name }}</h1>
                    <h3>{{ item.category }}</h3>
                    <p>Date {{ item.created_at }}</p>
                           
                    </v-col>
                    <hr>
                </v-row>


                <hr>

                <v-row>
                    <v-col cols="12" md="4" lg="4" xl="4">
                        <v-img aspect-ratio="4/3" src="https://images.pexels.com/photos/7890161/pexels-photo-7890161.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></v-img>
                    </v-col>
                    <v-col cols="12" md="8" lg="8" xl="8">
                        <h2>Baskets</h2>
                        <p>We deliver baskets filled with well-balanced, healthy, and affordable food. These baskets include fresh and processed vegetables and fruits from farmers, tailored to your health needs.</p>
                        <p>Our baskets include fresh vegetables, cleanly-sourced poultry, seasonal fruit, herbs, processed products, and ancestral and domain-based products.</p>

                        <!-- <v-btn block class="button_set_a mx-auto d-flex d-sm-none">Subscribe</v-btn>
                        <v-btn block class="button_set_a mx-auto d-none d-sm-flex" width="30em">Subscribe</v-btn> -->
                    </v-col>
                </v-row>
                <hr>

                <v-row>
                    <v-col cols="12" md="4" lg="4" xl="4">
                        <v-img aspect-ratio="4/3" src="https://images.pexels.com/photos/1691180/pexels-photo-1691180.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></v-img>
                    </v-col>
                    <v-col cols="12" md="8" lg="8" xl="8">
                        <h2>Vegetables</h2>
                        <p>With Siged Tiklis, you can enjoy a wide range of hand-grown vegetables, sourced from groups such as the  Atok Organic Practitioners Association, Inc.</p>
                        <p>We offer vegetables such as bulbs, leafy vegetables, cole crops, legumes, stems and shoots, fruit vegetables, and root and tuber crops.</p>

                        <h2>Poultry</h2>
                        <p>Siged Tiklis We provide ducks and native chickens, which can be delivered to you live or dressed. We also offer fresh free-range and native eggs.</p>
                        <p>Our poultry sources are refreshed weekly to ensure freshness.</p>

                        <h2>Seasonal Fruit</h2>
                        <p>Siged Tiklis sources its seasonal fruit from different groups, such as the Atok Organic Practitioners Association, Inc. for highland vegetables and the Aduyon Organic Farmers Association (AOFA) for fruits and poultry supplies. We update our supply weekly to ensure freshness.</p>
                        <p>Our range of seasonal fruit includes rambutan, indian mango, avocado, lemon green, and passion fruit.</p>

                        <h2>Herbs</h2>
                        <p>Our hand-grown herbs are sure to bring your dish depth of flavor. You can enjoy lemon grass, mint, oregano, and rosemary with our services.</p>

                        <!-- <v-btn block class="button_set_a mx-auto d-flex d-sm-none">Subscribe</v-btn> -->
                        <!-- <v-btn block class="button_set_a mx-auto">Subscribe</v-btn> -->
                    </v-col>
                </v-row>
                <hr>

                <v-row>
                    <v-col cols="12" md="4" lg="4" xl="4">
                        <v-img aspect-ratio="4/3" src="https://gcdnb.pbrd.co/images/OsG2FZm6LQhS.png?o=1"></v-img>
                    </v-col>
                    <v-col cols="12" md="8" lg="8" xl="8">
                        <h2>Indigenous and Organic Products</h2>
                        <p>With Siged Tiklis, you can enjoy a variety of indigenous and organic products.</p>

                        <h2>Processed Products</h2>
                        <!-- <v-img src = "https://gcdnb.pbrd.co/images/VT742efYvU7A.png?o=1" width = "200px" height ="200px"></v-img> -->
                        <p>Siged Tiklis can provide a wide range of processed products. Choose from our selection of dehydrated fruits and vegetable snacks or treat yourself to our tomato and rhubarb spreads.</p>

                        <h2>Ancestral and Domain-Based</h2>
                        <p>Enjoy a wide range of Siged Tiklis' ancestral and domain-based products. We offer locally-produced heirloom rice, natural wild products, and more.</p>
                        <!-- <v-btn block class="button_set_a mx-auto">Subscribe</v-btn> -->
                    </v-col>
                </v-row>
                <hr>

                <v-row>
                    <v-col>
                        <h1>Cultivated With Love</h1>
                        <p>With Siged Tilkis, every crop, fruit, and meal plan was designed with your health and enjoyment in mind. </p>
                        <p>We are dedicated to delivering healthy, locally-sourced meals with every basket. Get yours now.</p>
                        <v-btn block class="button_set_a mx-auto d-flex d-sm-none">Learn More</v-btn><!-- <600px viewport -->
                        <v-btn class="button_set_a mx-auto d-none d-sm-flex" width="30em">Learn More</v-btn><!-- >600px viewport -->
                    </v-col>
                </v-row>
            </div>
    </v-container>
</template>

<script>
    export default {
        data() {
            return{
                data : {
                    id:'',
                    basket_item_name: '',
                },
                basket_items: [],
                perPage: 10,
                pagination: {},
                search:'',
            }
        },

        mounted() {
            axios.get('/Basket_Items/index')
            .then(response => {
            this.basket_items = response.data;
            })
            .catch(error => {
            console.error(error);
            });
        },

        methods : {

        },


        computed : {
            //   collection() {
            //     if (this.search != '') {
            //             return this.audits.filter(audits => {
            //                 // Adjust the condition based on the property you want to search
            //                 return audits.categoryName.toLowerCase().includes(this.search.toLowerCase());
            //             });
            //         } else {
            //             return this.paginate(this.audits);
            //         }

            //     },
        },

    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    body {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        margin: 0;
        padding: 0;
    }
    /* mobile view */
    @media only screen and (max-width: 600px) {
 
    h1{
        font-weight: bold;
        text-transform: uppercase; 
        font-size:18px !important;
    }
    p {
        font-size: 4vw;
    }
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 50px; /* Added margin for spacing */
    }

    .navigation_bar {
        width: 100%;
        background-color: #4d783f;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 50px;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
        font-size: 20px;
        color: #ffffff;
    }

    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: white;
    }

    .company_name {
        font-size: 20px;
        color: white;
        font-weight: bold;
        font-family: 'Gelasio', serif;
        font-style: italic;
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

    .user_section {
        display: flex;
        align-items: center;
        margin-top: 20px; /* Added margin for spacing */
    }

    .button_set_a {
        width: 158px;
        height: 52px;
        border-radius: 13px;
        background-color: #2d4d22;
        font-weight: bold;
        font-size: 18px;
        color: #ffffff;
    }

    .sign_up_button {
        width: 158px;
        height: 52px;
        border-radius: 13px;
        background-color: #C7C47F;
        font-weight: bold;
        font-size: 18px;
        color: #2d4d22;
    }

    .columns {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        width: 100%;
        margin-top: 40px; /* Increased margin for spacing */
    }


    .next_button {
        display: flex;
        justify-content: center;
        margin-top: 40px; /* Increased margin for spacing */
    }

    .next_button .button_set_a {
        font-size: 20px;
    }

    h1 {
        font-size: 60px;
        font-weight: 600;
        /* font-style: italic; */
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-top: 40px;
    }

    h2 {
        font-size: 40px;
        font-weight: 600;
        /* font-style: italic; */
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-top: 40px;
    }

    h3 {
        font-size: 35px;
        font-weight: 400;
        /* font-style: italic; */
        font-family: 'Inter', sans-serif;
        color: #2d4d22;
        margin-top: 40px;
    }
    p {
        font-size: 20px;
        color: #000;
        margin-bottom: 40px;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .column {
        float: right;
        width: 33.33%;
        padding: 5px;
    }

    * {
        box-sizing: border-box
    }

    img {
        width: 100;
        height: 400;
        display: inline-flex;
    }

    hr {
        display: flex;
        background-color: #7EAB6E;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        height: 4px;
        /* border-style: inset;
        border-width: 4px; */
    }
</style>
