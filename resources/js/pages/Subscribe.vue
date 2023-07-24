<template>
    <v-container>
        <v-window v-model="tab">
            <v-window-item :value="1" key="sub1">
                <div class="banner"></div>

                <h1>Choose Your Plan</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div class="flex-fill">
                    <v-row>
                    <v-col cols="12" md="4" lg="4" xl="4" @click="selectPlan(1)">
                        <ul class="price" :class="{ selected: selectedPlan === 1 }">
                        <li class="header">Plan 1</li>
                        <li class="grey">PHP 599</li>
                        <li>Good For 1-2</li>
                        <!-- Add a checkmark icon -->
                        <li v-if="selectedPlan === 1" class="checkmark">&#10003;</li>
                        </ul>
                    </v-col>
                    <v-col cols="12" md="4" lg="4" xl="4" @click="selectPlan(2)">
                        <ul class="price" :class="{ selected: selectedPlan === 2 }">
                        <li class="header">Plan 2</li>
                        <li class="grey">PHP 999</li>
                        <li>Good For 3-4</li>
                        <!-- Add a checkmark icon -->
                        <li v-if="selectedPlan === 2" class="checkmark">&#10003;</li>
                        </ul>
                    </v-col>
                    <v-col cols="12" md="4" lg="4" xl="4" @click="selectPlan(3)">
                        <ul class="price" :class="{ selected: selectedPlan === 3 }">
                        <li class="header">Plan 3</li>
                        <li class="grey">PHP 1599</li>
                        <li>Good For 1-2</li>
                        <!-- Add a checkmark icon -->
                        <li v-if="selectedPlan === 3" class="checkmark">&#10003;</li>
                        </ul>
                    </v-col>
                    </v-row>
                </div>

                <div class="next_button">
                    <button class="button_set_a" @click="tab = 2">Next</button>
                </div>
            </v-window-item>

            <v-window-item :value="2" key="sub2">

                <div class="banner"></div>
                <div>
                    <v-row>
                        <v-col
                                v-for="item in basket_items"
                                :key="item.id"
                                :cols="getColumns"
                                :class="{ selected: selectedBasket === item.id }"
                                @click="selectBasket(item.id)"
                            >
                        <v-hover v-slot="{ isHovering, props }" open-delay="200">
                            <v-card
                            :elevation="isHovering ? 16 : 2"
                            :class="{ 'on-hover': isHovering }"
                            v-bind="props"
                            >
                            <v-container>
                                <v-row align="center">
                                <v-col cols="auto">
                                    <v-icon color="primary" size="32">mdi-basket</v-icon>
                                </v-col>
                                <v-col>
                                    <h2 class="text-h5 checkmark" >
                                    {{ item.basket_size }}
                                    <v-icon v-show="selectedBasket === item.id">mdi-check</v-icon>
                                    <v-icon v-show="selectedBasket !== item.id">0</v-icon>
                                    </h2>
                                    
                                </v-col>
                                </v-row>
                            </v-container>

                            <v-card-text class="full-width">
                                <v-row>
                                    <v-col>₱{{ item.basket_amount }}</v-col>
                                    <v-col>
                                    <template v-if="item.basket_item">
                                        <span v-for="(basketItem, index) in JSON.parse(item.basket_item)" :key="index">
                                        {{ basketItem }}
                                        <br />
                                        </span>
                                    </template>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col>Days Left: {{ item.daysLeft }}</v-col>
                                    <v-col>{{ item.from }}</v-col>
                                </v-row>
                            </v-card-text>

                            </v-card>
                        </v-hover>
                        </v-col>
                    </v-row>
                    </div>


                <div>
                    <h1>Customize Your Plan</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo
                        lectus ut cursus convallis. Integer vel neque eget metus semper dictum.
                        Suspendisse potenti. Cras feugiat quam non urna ultrices auctor.
                    </p>

                    <v-card>
                    <v-container>
                    <v-row>
                        <!-- table row -->
                        <v-col
                        v-for="delivery in deliveries"
                        :key="delivery.deliveryNo"
                        :cols="getColumns"
                        >
                        <v-card>
                            <v-card-text>
                            <div>
                                <strong>Delivery No.:</strong> {{ delivery.deliveryNo }}
                            </div>
                            <div>
                                <strong>Bundle Type:</strong>
                                <v-select
                                v-model="delivery.bundleType"
                                label="Select"
                                :items="bundleTypes"
                                ></v-select>
                            </div>
                            <div>
                                <strong>Meal:</strong>
                                <v-select
                                v-model="delivery.mealType"
                                label="Select"
                                :items="mealTypes"
                                ></v-select>
                            </div>
                            <div>
                                <strong>Add-Ons:</strong>
                                <v-select
                                clearable
                                chips
                                label="Select"
                                :items="addOns"
                                multiple
                                ></v-select>
                            </div>
                            <div>
                                <strong>Delivery Date:</strong>
                                <v-text-field type="date"></v-text-field>
                            </div>
                            <div>
                                <strong>Add-Ons Price:</strong> {{ delivery.addOnsPrice }}
                            </div>
                            <div>
                                <strong>Bundle Price:</strong> {{ delivery.bundlePrice }}
                            </div>
                            </v-card-text>
                        </v-card>
                        </v-col>
                    </v-row>
                    </v-container>
                </v-card>

                    <div class="next_button">
                        <button class="button_set_a" @click="tab = 1">Previous</button>
                        <button class="button_set_a" @click="tab = 3">Next</button>
                    </div>
                </div>
            </v-window-item>
            <v-window-item :value="3" key="sub3">
               <v-container>
                <div class = "banner"></div>

                   <v-row>
                        <v-col>
                            <div>
                                <h1>Special Instructions</h1>
                                <p>Tell us about your allergies, preferences, or other special instructions.</p>
                            </div>
                        </v-col>
                   </v-row>

                   <v-row>
                        <v-col>
                            <v-textarea
                            name="specialinstructions"
                            label="Special Instructions"
                            placeholder="Enter your special instructions here..."
                            outlined
                            rows="5"
                            dense
                            ></v-textarea>
                    </v-col>
                   </v-row>


                    <v-row>
                        <v-col>
                        <div class="next_button">
                            <button class="button_set_a" @click="tab = 2">Previous</button>
                            <button class="button_set_a" @click="tab = 4">Next</button>
                        </div>
                    </v-col>
                    </v-row>
               </v-container>
            </v-window-item>
            <v-window-item :value="4" key="sub4">
               <v-row>
                 <!-- main address -->
                 <div class="banner"></div>

                    <v-col>
                        <div>
                         <h1>Shipping and Billing Address</h1>
                        </div>
                    </v-col>

                    <v-container>
                        <v-row>
                            <!-- Email -->
                            <v-col>
                            <v-text-field label="Email" required></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row>
                            <!-- First Name -->
                            <v-col>
                            <v-text-field label="First Name" required></v-text-field>
                            </v-col>

                            <!-- Last Name -->
                            <v-col>
                            <v-text-field label="Last Name" required></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row>
                            <!-- Street Address -->
                            <v-col>
                            <v-text-field label="Street Address" required></v-text-field>
                            </v-col>

                            <!-- Town/City -->
                            <v-col>
                            <v-text-field label="Town/City" required></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row>
                            <!-- Post Code -->
                            <v-col>
                            <v-text-field label="Post Code" required></v-text-field>
                            </v-col>

                            <!-- Country -->
                            <v-col>
                            <v-text-field label="Country" required></v-text-field>
                            </v-col>
                        </v-row>

                    </v-container>


                   <v-col>
                        <div class="next_button">
                            <button class="button_set_a" @click="tab = 3">Previous</button>
                            <button class="button_set_a" @click="tab = 5">Next</button>
                        </div>
                   </v-col>
               </v-row>
            </v-window-item>


            <v-window-item :value="5" key="sub5">
                <div class = "banner"></div>

                <h1>My Cart</h1>

                <div>
                    <v-container>
                        <v-row>
                            <v-col v-for="(record, index) in records" :key="index" cols="12" sm="6" md="4">
                            <v-card outlined class="record-card">
                                <v-row class="card-row">
                                <v-col cols="2">
                                    <v-checkbox v-model="record.selected" color="#446C36" hide-details></v-checkbox>
                                </v-col>
                                <v-col cols="8">
                                <!-- Image with increased space -->
                                    <v-img aspect-ratio="1" src="/img/placeholder/jk-placeholder-image-300x203.jpg"></v-img>
                                </v-col>
                               
                                <v-col cols="12">
                                    <div class="record-content">
                                    <h3 class="product-name">{{ record.product }}</h3>
                                    <p class="description">{{ record.description }}</p>
                                    <p class="price">Price: {{ record.price }}</p>
                                    <div class="quantity-control">
                                        <v-btn icon @click="decrementQuantity(index)" class="quantity-btn">
                                            <v-icon size="14">mdi-minus</v-icon>
                                        </v-btn>
                                        <span class="quantity">{{ record.quantity }}</span>
                                        <v-btn icon @click="incrementQuantity(index)" class="quantity-btn">
                                            <v-icon size="14">mdi-plus</v-icon>
                                        </v-btn>
                                        </div>

                                    </div>
                                </v-col>
                                </v-row>
                            </v-card>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col>
                            <v-card class="text-center checkout-card" variant="flat">
                                <v-btn size="x-large" variation="flat" color="#C7C47F" @click="checkoutItems">CHECK OUT</v-btn>
                            </v-card>
                            </v-col>
                        </v-row>
                        </v-container>
                </div>
        </v-window-item>

        <v-window-item :value="6" key="sub6">
            <div class="banner"></div>

            <h1>Checkout</h1>

            <div>
                <v-container>
                <!-- Show Total Amount -->
                <div class="total-amount">
                    <h3>Total Amount: {{ calculateTotalAmount() }}</h3>
                </div>

                <!-- Shipping Address Section -->
                <div class="shipping-address">
                    <h3>Shipping Address</h3>
                    <!-- Display the user's set shipping address here -->
                    <p>{{ shippingAddress }}</p>
                    <!-- Add an edit button to allow the user to edit the shipping address -->
                    <v-btn text @click="tab = 7">Edit Address</v-btn>
                    <!-- <button class="button_set_a" @click="tab = 3">Eddit Address</button> -->
                </div>

                <!-- Payment Method Section -->
                <div class="payment-method">
                    <h3>Payment Method</h3>
                    <!-- Use v-radio-group to allow the user to select the payment method -->
                    <v-radio-group v-model="selectedPaymentMethod" row>
                    <v-radio label="Cash on Delivery" value="cash_on_delivery"></v-radio>
                    <v-radio label="GCash" value="gcash"></v-radio>
                    </v-radio-group>
                </div>

                <!-- List of Checked Out Items -->
                <div class="checked-out-items">
                    <h3>Checked Out Items</h3>
                    <v-container>
                    <v-row>
                        <v-col v-for="(record, index) in checkedOutItems" :key="index" cols="12" sm="6" md="4">
                        <v-card outlined class="record-card">
                            <v-row class="card-row">
                            <v-col cols="4">
                                <v-img aspect-ratio="1" src="/img/placeholder/jk-placeholder-image-300x203.jpg"></v-img>
                            </v-col>
                            <v-col cols="8">
                                <div class="record-content">
                                <h3 class="product-name">{{ record.product }}</h3>
                                <p class="description">{{ record.description }}</p>
                                <p class="price">Price: {{ record.price }}</p>
                                <div class="quantity-control">
                                    <span class="quantity">Quantity: {{ record.quantity }}</span>
                                </div>
                                </div>
                            </v-col>
                            </v-row>
                        </v-card>
                        </v-col>
                    </v-row>
                    </v-container>
                </div>

                <!-- Place Order Button -->
                <v-row>
                    <v-col>
                    <v-card class="text-center checkout-card" variant="flat">
                        <v-btn size="x-large" variation="flat" color="#C7C47F" @click="placeOrder">Place Order</v-btn>
                    </v-card>
                    </v-col>
                </v-row>
                </v-container>
            </div>
            </v-window-item>

            <v-window-item :value="7" key="sub7">
                <div class="banner"></div>

                <p>Select Shipping Address</p>

                <div>
                    <v-container>
                    <v-row align="center" justify="space-between">
                        <!-- First column for the map icon -->
                        <v-col cols="1" class="map-icon-column">
                        <v-icon size="14" class="map-icon">mdi-map-marker</v-icon>
                        </v-col>
                        <v-col cols="7" class="shipping-address" >
                        <div style="font-size: 12px;line-height: 1;">John Doe</div>
                        <div style="font-size: 12px;line-height: 1;">Someplace, Country</div>
                        <div style="font-size: 12px;line-height: 1;">HOME</div>
                        </v-col>
                        <!-- Third column for the edit button -->
                        <v-col cols="4">
                        <v-btn @click="editShippingAddress" class="edit-address-btn" block>
                            Edit
                        </v-btn>
                        </v-col>
                    </v-row>
                    
                    </v-container>
                </div>
            </v-window-item>

            <v-window-item :value="8" key="sub8">
                <div class="banner"></div>

                <p>Edit Shipping Address</p>

                <div>
                    <v-container>
                        <v-row>
                            <!-- Email -->
                            <v-col>
                            <v-text-field label="Email" required></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row>
                            <!-- First Name -->
                            <v-col>
                            <v-text-field label="First Name" required></v-text-field>
                            </v-col>

                            <!-- Last Name -->
                            <v-col>
                            <v-text-field label="Last Name" required></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row>
                            <!-- Street Address -->
                            <v-col>
                            <v-text-field label="Street Address" required></v-text-field>
                            </v-col>

                            <!-- Town/City -->
                            <v-col>
                            <v-text-field label="Town/City" required></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row>
                            <!-- Post Code -->
                            <v-col>
                            <v-text-field label="Post Code" required></v-text-field>
                            </v-col>

                            <!-- Country -->
                            <v-col>
                            <v-text-field label="Country" required></v-text-field>
                            </v-col>
                        </v-row>

                    </v-container>
                </div>
            </v-window-item>


        </v-window>
        <v-tabs v-model="tab" align-tabs="center">
            <v-tab :value="1"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
            <v-tab :value="2"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
            <v-tab :value="3"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
            <v-tab :value="4"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
            <v-tab :value="5"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
            <v-tab :value="6"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
            <v-tab :value="7"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
        </v-tabs>
    </v-container>
</template>

<script>
    import router from '../routes.js';
    export default {
        data() {
            return {
                checkedOutItems: [],
                records: [
                    { product: 'Plan 1', description: 'Onions, Garlic, Tomatoes, Ginger', price: 699, quantity: 0 },
                    { product: 'Plan 2', description: 'Onions, Garlic, Tomatoes, Ginger', price: 999, quantity: 0 },
                    { product: 'Plan 3', description: 'Onions, Garlic, Tomatoes, Ginger', price: 799, quantity: 0 },
                    // Add more records here as needed
                ],
                selectedBasket: null,
                basket_items: [],
                // bigBasketItems: [
                //     { unit: '1kg', measurement: 'Choice of Native Chicken or Duck (dressed)', name: '1kg Choice of Native Chicken or Duck (dressed)' },
                //     { unit: '1/4 kg', measurement: 'Ampalaya Shoots (native)', name: '1/4 kg Ampalaya Shoots (native)' },
                //     { unit: '1/2 doz', measurement: 'Native Eggs', name: '1/2 doz Native Eggs' },
                //     { unit: '1/4 kg', measurement: 'Eggplant', name: '1/4 kg Eggplant' },
                //     { unit: '1/2 kg', measurement: 'Pole Beans', name: '1/2 kg Pole Beans' },
                //     { unit: '1/4 kg', measurement: 'Taro/Gabi', name: '1/4 kg Taro/Gabi' },
                //     { unit: '1/4 kg', measurement: 'Kangkong', name: '1/4 kg Kangkong' },
                //     { unit: '1/4 kg', measurement: 'Okra', name: '1/4 kg Okra' },
                //     { unit: '1/2 kg', measurement: 'sayote', name: '1/2 kg sayote' },
                //     { unit: '200 g', measurement: 'Malunggay Leaves', name: '200 g Malunggay Leaves' },
                //     { unit: '1/4 kg', measurement: 'Ginger (native)', name: '1/4 kg Ginger (native)' },
                //     { unit: '1 kg', measurement: 'Avocado', name: '1 kg Avocado' },
                //     { unit: '1/4 kg', measurement: 'Carrots', name: '1/4 kg Carrots' },
                //     { unit: '100 g', measurement: 'Parsley', name: '100 g Parsley' },
                //     { unit: '1/2 kg', measurement: 'Lemon', name: '1/2 kg Lemon' },
                //     { unit: '25 g', measurement: 'Kale Chips', name: '25 g Kale Chips' },
                //     { unit: '25 g', measurement: 'Dehydrated Rhubarb, Strawberry, Tamarillo', name: '25 g Dehydrated Rhubarb, Strawberry, Tamarillo' },
                // ],
                // mediumBasketItems: [
                //     { unit: '1kg', measurement: 'Choice of Native Chicken or Duck (dressed)', name: '1kg Choice of Native Chicken or Duck (dressed)' },
                //     { unit: '1/4 kg', measurement: 'Ampalaya Shoots (native)', name: '1/4 kg Ampalaya Shoots (native)' },
                //     { unit: '1/2 doz', measurement: 'Native Eggs', name: '1/2 doz Native Eggs' },
                //     { unit: '1/4 kg', measurement: 'Eggplant', name: '1/4 kg Eggplant' },
                //     { unit: '1/2 kg', measurement: 'Pole Beans', name: '1/2 kg Pole Beans' },
                //     { unit: '1/4 kg', measurement: 'Taro/Gabi', name: '1/4 kg Taro/Gabi' },
                //     { unit: '1/4 kg', measurement: 'Kangkong', name: '1/4 kg Kangkong' },
                //     { unit: '1/4 kg', measurement: 'Okra', name: '1/4 kg Okra' },
                //     { unit: '1/2 kg', measurement: 'sayote', name: '1/2 kg sayote' },
                //     { unit: '200 g', measurement: 'Malunggay Leaves', name: '200 g Malunggay Leaves' },
                //     { unit: '1/4 kg', measurement: 'Ginger (native)', name: '1/4 kg Ginger (native)' },
                //     { unit: '1 kg', measurement: 'Avocado', name: '1 kg Avocado' },
                //     { unit: '1/4 kg', measurement: 'Carrots', name: '1/4 kg Carrots' },
                //     { unit: '100 g', measurement: 'Parsley', name: '100 g Parsley' },
                //     { unit: '1/2 kg', measurement: 'Lemon', name: '1/2 kg Lemon' },
                //     { unit: '25 g', measurement: 'Kale Chips', name: '25 g Kale Chips' },
                //     { unit: '25 g', measurement: 'Dehydrated Rhubarb, Strawberry, Tamarillo', name: '25 g Dehydrated Rhubarb, Strawberry, Tamarillo' },
                // ],
                // smallBasketItems: [
                //     { unit: '1kg', measurement: 'Choice of Native Chicken or Duck (dressed)', name: '1kg Choice of Native Chicken or Duck (dressed)' },
                //     { unit: '1/4 kg', measurement: 'Ampalaya Shoots (native)', name: '1/4 kg Ampalaya Shoots (native)' },
                //     { unit: '1/2 doz', measurement: 'Native Eggs', name: '1/2 doz Native Eggs' },
                //     { unit: '1/4 kg', measurement: 'Eggplant', name: '1/4 kg Eggplant' },
                //     { unit: '1/2 kg', measurement: 'Pole Beans', name: '1/2 kg Pole Beans' },
                //     { unit: '1/4 kg', measurement: 'Taro/Gabi', name: '1/4 kg Taro/Gabi' },
                //     { unit: '1/4 kg', measurement: 'Kangkong', name: '1/4 kg Kangkong' },
                //     { unit: '1/4 kg', measurement: 'Okra', name: '1/4 kg Okra' },
                //     { unit: '1/2 kg', measurement: 'sayote', name: '1/2 kg sayote' },
                //     { unit: '200 g', measurement: 'Malunggay Leaves', name: '200 g Malunggay Leaves' },
                //     { unit: '1/4 kg', measurement: 'Ginger (native)', name: '1/4 kg Ginger (native)' },
                //     { unit: '1 kg', measurement: 'Avocado', name: '1 kg Avocado' },
                //     { unit: '1/4 kg', measurement: 'Carrots', name: '1/4 kg Carrots' },
                //     { unit: '100 g', measurement: 'Parsley', name: '100 g Parsley' },
                //     { unit: '1/2 kg', measurement: 'Lemon', name: '1/2 kg Lemon' },
                //     { unit: '25 g', measurement: 'Kale Chips', name: '25 g Kale Chips' },
                //     { unit: '25 g', measurement: 'Dehydrated Rhubarb, Strawberry, Tamarillo', name: '25 g Dehydrated Rhubarb, Strawberry, Tamarillo' },
                // ],
                bundleTypes: ['Pure Veg', 'Pure Meat', 'Veg + Meat'],
                mealTypes: ['Chopsuey', 'Pinapaitan', 'Tinola'],
                addOns: ['Cabbage', 'Onion', 'Ginger', 'Garlic'],
                selectedPlan: null,
                selectedPayment: '', // Selected payment method value
                // deliveries start
                deliveries: [
                {   
                    deliveryNo: 1,
                    bundleType: 'Pure Veg',
                    meal: 'Chopsuey',
                    addOns: [],
                    deliveryDate: '2023-07-08',
                    addOnsPrice: 'PHP 100',
                    bundlePrice: 'PHP 599'
                },
                {
                    deliveryNo: 2,
                    bundleType: 'Pure Veg',
                    meal: 'Chopsuey',
                    addOns: [],
                    deliveryDate: '2023-07-08',
                    addOnsPrice: 'PHP 100',
                    bundlePrice: 'PHP 599'
                },
                {
                    deliveryNo: 3,
                    bundleType: 'Pure Veg',
                    meal: 'Chopsuey',
                    deliveryDate: '2023-07-08',
                    addOnsPrice: 'PHP 100',
                    bundlePrice: 'PHP 599',
                    addOns: [],
                }
                ],
                // deliveries end
                paymentMethods: [
                    {
                        value: 'gcash',
                        //label: 'Gcash',
                        icon: 'mdi-currency-usd',
                        name: 'Gcash Payment',
                        description: 'Pay using Gcash digital wallet.',
                        color: '#4CAF50',
                    },
                    {
                        value: 'cod',
                        //   label: 'Cash on Delivery',
                        icon: 'mdi-cash',
                        name: 'Cash on Delivery',
                        description: 'Pay in cash upon delivery.',
                        color: '#FF9800',
                    },
                 ],
                quantityPlan1: 1,   // Initial quantity value
                quantityPlan2: 1, // Initial quantity value
                tab: 1,
                subscribe_data: {

                }
            }
        },
        created(){
            this.BasketItems();

        },
        methods: {
            checkoutItems() {
      // Filter the selected cart items and add them to checkedOutItems array
      this.checkedOutItems = this.records.filter((record) => record.selected);
      // Move to the Checkout tab
      this.tab = 6;
    },
    editShippingAddress() {
      // Filter the selected cart items and add them to checkedOutItems array
     
      // Move to the Checkout tab
      this.tab = 8;
    },
            calculateTotalAmount() {
                // Calculate the total amount based on the selected cart items and their quantities
                let totalAmount = 0;
                for (const record of this.records) {
                if (record.selected) {
                    totalAmount += record.price * record.quantity;
                }
                }
                return totalAmount;
            },
            selectBasket(id) {
            this.selectedBasket = id;
            },
            getColumns() {
            // Calculate the number of columns based on the screen size
            if (this.$vuetify.breakpoint.xs) {
                return 12; // For screens smaller than 600px, show 1 card per row
            } else {
                return 4; // For larger screens, show 3 cards per row (cols="4")
            }
            },
            
            selectPlan(plan) {
            this.selectedPlan = plan;
            this.tab = 2;
            },
            incrementQuantity(index) {
            this.records[index].quantity++;
            },
            decrementQuantity(index) {
            if (this.records[index].quantity > 0) {
                this.records[index].quantity--;
            }
            },
          
            async subscribeCustomer() {
                console.log('test')
                this.$axios.post('/subscribe')
                .then((response) => {
                    console.log('success')
                })
                .catch((error) => {
                    console.log('fail')
                });
            },
             async BasketItems() {
                this.$axios.get('/Display_Basket/index')
                .then((response) => {
                this.basket_items = response.data;
                })
                .catch((error) => {
                });
            },
        },
        mounted() {
        // Fetch basket items when the component is mounted
        this.BasketItems();
        }
    }
</script>

<style scoped>
   .record-card {
    padding: 16px;
    margin: 8px;
    border: 1px solid #e1e1e1;
  }

  .record-content {
    margin-bottom: 16px;
  }

  .product-name {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 8px;
  }

  .description {
    font-size: 14px;
    color: #666;
    margin-bottom: 8px;
  }

  .price {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 8px;
  }

  .quantity-control {
    display: flex;
    align-items: center;
  }

  .quantity {
    font-size: 18px;
    font-weight: bold;
    margin: 0 12px;
  }

  .checkout-card {
    padding: 16px;
    background-color: #f7f7f7;
  }

  /* Additional styles for Checkout page */
  .total-amount {
    margin-top: 16px;
    font-size: 18px;
    font-weight: bold;
  }

  .shipping-address {
    margin-top: 24px;
  }

  .shipping-address h3,
  .payment-method h3,
  .checked-out-items h3 {
    font-size: 18px;
    margin-bottom: 12px;
  }

  .checked-out-items {
    margin-top: 24px;
  }

  .record-card {
    margin: 8px 0;
  }

  .record-content {
    margin-bottom: 8px;
  }

  .product-name {
    font-size: 16px;
    margin-bottom: 4px;
  }

  .description {
    font-size: 12px;
    margin-bottom: 4px;
  }

  .price {
    font-size: 14px;
    margin-bottom: 4px;
  }

  .quantity-control {
    display: flex;
    align-items: flex-start;
  }

  .quantity {
    font-size: 14px;
    font-weight: bold;
    margin: 4px 0;
  }
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        margin: 0;
        padding: 0;
    }
/* Mobile Screen */
    @media only screen and (max-width: 600px) {
        /* my cart */
        .map-icon-column {
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Align the icon to the top edge */
  }

  .map-icon {
    line-height: 1; /* Remove any extra vertical space */
  }
        .record-card {
      margin: 8px 0;
      height: 100%;
      
    }

    .record-content {
      margin-bottom: 8px;
    }

    .product-name {
      font-size: 16px;
      margin-bottom: 4px;
    }

    .description {
      font-size: 12px;
      margin-bottom: 4px;
    }

    .price {
      font-size: 14px;
      margin-bottom: 4px;
    }
    .quantity-control {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .quantity-btn {
    min-width: 24px;
    min-height: 24px;
    padding: 0;
  }

    .checkout-card {
      margin-top: 16px;
    }
    .content_section {
    margin: 0;
  }

  .total-amount {
      font-size: 16px;
      margin-top: 12px;
    }

    .shipping-address h3,
    .payment-method h3,
    .checked-out-items h3 {
      font-size: 16px;
      margin-bottom: 8px;
    }

    .shipping-address {
      margin-top: 16px;
    }

    .checked-out-items {
      margin-top: 16px;
    }

    .record-card {
      margin: 8px 0;
      padding: 8px;
    }

    .product-name {
      font-size: 14px;
      margin-bottom: 2px;
    }

    .description {
      font-size: 12px;
      margin-bottom: 2px;
    }

    .price {
      font-size: 12px;
      margin-bottom: 2px;
    }

    .quantity {
      font-size: 12px;
      font-weight: bold;
      margin: 2px 0;
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

    .price1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        width: 25%;
        box-sizing: border-box;

    }

    .price2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        width: 25%;
        box-sizing: border-box;

    }


    .price {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        /* width: 20%; */
        box-sizing: border-box;
        border-radius: 10px;
        border:solid #39612C 2px;

    }


    .price:hover {
        box-shadow: 0 8px 12px 0 rgba(130, 176, 135, 0.75);
    }

    .price .header {
        /* background-color: #2d4d22; */
        color: #2d4d22;
        font-size: 35px;
        font-family: 'Gelasio', serif;
        font-weight: bold;
        text-align: center;
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .price li {
        /* border-bottom: 2px solid #7EAB6E; */
        padding: 20px;
        text-align: center;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
    }

    .price .grey {
        /* background-color: #E8E5A9; */
        font-weight: bold;
        font-size: 20px;
    }

    .price .button {
        background-color: #39612C;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
    }

    .next_button {
        display: flex;
        justify-content: center;
        margin-top: 40px; /* Increased margin for spacing */
    }

    .next_button .button_set_a {
        font-size: 20px;
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

    .banner {
        object-fit: cover;
        width: 100%;
        height: 300px;
        background-image: url('https://images.pexels.com/photos/2252482/pexels-photo-2252482.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-position: center;
        background-size: cover;
        opacity: 0.75;
    }

    h1 {
        font-size: 60px;
        font-weight: 600;
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-top: 40px;
    }

    h2 {
    font-size: 20px;
    font-weight: 650;
    font-style: bold;
    font-family: 'Gelasio', serif;
    color: #2d4d22;
    }

    p {
        font-size: 20px;
        color: #000;
        margin-bottom: 40px;
        text-align: justify;
    }

    .left_section {
        display: flex;
        align-items: center;
    }

    .right_section {
        display: flex;
        align-items: center;
    }

    .content_section {
    margin-left: 100px;
    margin-right: 100px;
  }

    table {
        margin: 0 auto;
        font-size: 18px;
        font-family: 'Inter', sans-serif;
        color: #000;
        border-collapse: collapse;
        width: 80%;
        margin-bottom: 20px;
    }

    th {
        background-color: white;
        font-weight: bold;
        font-size: 25px;
        font-family: 'Inter', sans-serif;
        color: #2d4d22;
        padding: 10px;
    }

    td {
        text-align: center;
        border-bottom: 1px solid #7EAB6E;
        padding: 10px;
    }

    select {
        font-family: 'Inter', sans-serif;
        font-size: 14px;
    }

    input[type="number"] {
        width: 50px;
        padding: 5px;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
    }

    .customize-section {
        text-align: center;
        margin-top: 50px;
    }

    td.center-cell,
    th.center-cell {
        text-align: center;
        padding: 15px;
    }

    a {
        text-decoration: none;
        color: #379937;
    }

    .dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #FAF9E7;
        min-width: 140px;
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: inline-block;
    }

    textarea {
        width: 100%;
        height: 150px;
        border: 2px solid #26451B;
        background: rgba(217, 217, 217, 0.06);
        font-family: 'Inter', sans-serif;
        margin: 0 auto;
        display: block;

    }

    .text-center {
    margin-top: 30px;
    }

  .text-center v-btn {
    margin: 0 10px;
     }

  .v-card {
    margin-bottom: 30px;
    margin-top: 20px;
    margin-left: 25px;
    margin-right: 24px;
  }

  .v-radio label {
    font-size: 15px;
    font-weight: 800;
    font-family: 'Inter', sans-serif;
    color: black;
    background-color: "#DCE4C3"

  }


    /* payment method section */
    .payment-card {
    display: flex;
    align-items: center;
    padding: 16px;
    }

    .payment-icon {
    margin-right: 16px;
    }

    .payment-info {
    flex-grow: 1;
    }

    .payment-name {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    line-height: 1.2; /* Added line-height property */
    }

    .payment-description {
    margin: 0;
    line-height: 1.2; /* Added line-height property */
    }
    /* onclick plan */
    .selected {
    background-color: #f5f5f5; /* Apply a background color to the selected plan */
    }

    .checkmark {
    float: right;
    margin-right: 10px;
    }


    /* customize your plan */

    .center-cell {
    text-align: center;
    }

    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropbtn {
    background-color: #4caf50;
    color: white;
    padding: 5px;
    font-size: 14px;
    border: none;
    cursor: pointer;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    padding: 10px;
    }

    .dropdown-content label {
    display: block;
    }

    .dropdown-content label input {
    margin-right: 5px;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }
    .basket_cards:hover{
        box-shadow: 0 8px 12px 0 rgba(130, 176, 135, 0.75);
    }
    
}

/* Small Screen */
/* Styles for screens larger than 600px up to 960px */
@media (min-width: 600px) and (max-width: 960px) {
  .content_section {
    margin-left: 0;
    margin-right:0;
    width: 100%;
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

    .content_section {
        margin-left: 100px;
        margin-right: 100px;
        width: 100%;
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

    .price1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        width: 25%;
        box-sizing: border-box;

    }

    .price2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        width: 25%;
        box-sizing: border-box;

    }


    .price {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        /* width: 20%; */
        box-sizing: border-box;
        border-radius: 10px;
        border:solid #39612C 2px;

    }


    .price:hover {
        box-shadow: 0 8px 12px 0 rgba(130, 176, 135, 0.75);
    }

    .price .header {
        /* background-color: #2d4d22; */
        color: #2d4d22;
        font-size: 35px;
        font-family: 'Gelasio', serif;
        font-weight: bold;
        text-align: center;
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .price li {
        /* border-bottom: 2px solid #7EAB6E; */
        padding: 20px;
        text-align: center;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
    }

    .price .grey {
        /* background-color: #E8E5A9; */
        font-weight: bold;
        font-size: 20px;
    }

    .price .button {
        background-color: #39612C;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
    }

    .next_button {
        display: flex;
        justify-content: center;
        margin-top: 40px; /* Increased margin for spacing */
    }

    .next_button .button_set_a {
        font-size: 20px;
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

    .banner {
        object-fit: cover;
        width: 100%;
        height: 300px;
        background-image: url('https://images.pexels.com/photos/2252482/pexels-photo-2252482.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-position: center;
        background-size: cover;
        opacity: 0.75;
    }

    h1 {
        font-size: 60px;
        font-weight: 600;
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-top: 40px;
    }

    h2 {
    font-size: 20px;
    font-weight: 650;
    font-style: bold;
    font-family: 'Gelasio', serif;
    color: #2d4d22;
    }

    p {
        font-size: 20px;
        color: #000;
        margin-bottom: 40px;
        text-align: justify;
    }

    .left_section {
        display: flex;
        align-items: center;
    }

    .right_section {
        display: flex;
        align-items: center;
    }

    .content_section {
    margin-left: 100px;
    margin-right: 100px;
  }

    table {
        margin: 0 auto;
        font-size: 18px;
        font-family: 'Inter', sans-serif;
        color: #000;
        border-collapse: collapse;
        width: 80%;
        margin-bottom: 20px;
    }

    th {
        background-color: white;
        font-weight: bold;
        font-size: 25px;
        font-family: 'Inter', sans-serif;
        color: #2d4d22;
        padding: 10px;
    }

    td {
        text-align: center;
        border-bottom: 1px solid #7EAB6E;
        padding: 10px;
    }

    select {
        font-family: 'Inter', sans-serif;
        font-size: 14px;
    }

    input[type="number"] {
        width: 50px;
        padding: 5px;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
    }

    .customize-section {
        text-align: center;
        margin-top: 50px;
    }

    td.center-cell,
    th.center-cell {
        text-align: center;
        padding: 15px;
    }

    a {
        text-decoration: none;
        color: #379937;
    }

    .dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #FAF9E7;
        min-width: 140px;
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: inline-block;
    }

    textarea {
        width: 100%;
        height: 150px;
        border: 2px solid #26451B;
        background: rgba(217, 217, 217, 0.06);
        font-family: 'Inter', sans-serif;
        margin: 0 auto;
        display: block;

    }

    .text-center {
    margin-top: 30px;
    }

  .text-center v-btn {
    margin: 0 10px;
     }

  .v-card {
    margin-bottom: 30px;
    margin-top: 20px;
    margin-left: 25px;
    margin-right: 24px;
  }

  .v-radio label {
    font-size: 15px;
    font-weight: 800;
    font-family: 'Inter', sans-serif;
    color: black;
    background-color: "#DCE4C3"

  }


    /* payment method section */
    .payment-card {
    display: flex;
    align-items: center;
    padding: 16px;
    }

    .payment-icon {
    margin-right: 16px;
    }

    .payment-info {
    flex-grow: 1;
    }

    .payment-name {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    line-height: 1.2; /* Added line-height property */
    }

    .payment-description {
    margin: 0;
    line-height: 1.2; /* Added line-height property */
    }
    /* onclick plan */
    .selected {
    background-color: #f5f5f5; /* Apply a background color to the selected plan */
    }

    .checkmark {
    float: right;
    margin-right: 10px;
    }


    /* customize your plan */

    .center-cell {
    text-align: center;
    }

    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropbtn {
    background-color: #4caf50;
    color: white;
    padding: 5px;
    font-size: 14px;
    border: none;
    cursor: pointer;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    padding: 10px;
    }

    .dropdown-content label {
    display: block;
    }

    .dropdown-content label input {
    margin-right: 5px;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }
    .basket_cards:hover{
        box-shadow: 0 8px 12px 0 rgba(130, 176, 135, 0.75);
    }
}
/* end */
/* Medium Screen */
/* Styles for screens larger than 960px up to 1200px */
@media (min-width: 960px) and (max-width: 1200px) {
  .content_section {
    margin-left: 80px;
    margin-right: 80px;
    width: 100%;
  }
}
/* Large Screen */
/* Styles for screens larger than 1200px */
@media (min-width: 1200px) {
    .content_section {
    margin-left: 0;
    margin-right:0;
    width: 100%;
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

    .content_section {
        margin-left: 100px;
        margin-right: 100px;
        width: 100%;
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

    .price1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        width: 25%;
        box-sizing: border-box;

    }

    .price2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        width: 25%;
        box-sizing: border-box;

    }


    .price {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        /* width: 20%; */
        box-sizing: border-box;
        border-radius: 10px;
        border:solid #39612C 2px;

    }


    .price:hover {
        box-shadow: 0 8px 12px 0 rgba(130, 176, 135, 0.75);
    }

    .price .header {
        /* background-color: #2d4d22; */
        color: #2d4d22;
        font-size: 35px;
        font-family: 'Gelasio', serif;
        font-weight: bold;
        text-align: center;
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .price li {
        /* border-bottom: 2px solid #7EAB6E; */
        padding: 20px;
        text-align: center;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
    }

    .price .grey {
        /* background-color: #E8E5A9; */
        font-weight: bold;
        font-size: 20px;
    }

    .price .button {
        background-color: #39612C;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
    }

    .next_button {
        display: flex;
        justify-content: center;
        margin-top: 40px; /* Increased margin for spacing */
    }

    .next_button .button_set_a {
        font-size: 20px;
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

    .banner {
        object-fit: cover;
        width: 100%;
        height: 300px;
        background-image: url('https://images.pexels.com/photos/2252482/pexels-photo-2252482.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-position: center;
        background-size: cover;
        opacity: 0.75;
    }

    h1 {
        font-size: 60px;
        font-weight: 600;
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-top: 40px;
    }

    h2 {
    font-size: 20px;
    font-weight: 650;
    font-style: bold;
    font-family: 'Gelasio', serif;
    color: #2d4d22;
    }

    p {
        font-size: 20px;
        color: #000;
        margin-bottom: 40px;
        text-align: justify;
    }

    .left_section {
        display: flex;
        align-items: center;
    }

    .right_section {
        display: flex;
        align-items: center;
    }

    .content_section {
    margin-left: 100px;
    margin-right: 100px;
  }

    table {
        margin: 0 auto;
        font-size: 18px;
        font-family: 'Inter', sans-serif;
        color: #000;
        border-collapse: collapse;
        width: 80%;
        margin-bottom: 20px;
    }

    th {
        background-color: white;
        font-weight: bold;
        font-size: 25px;
        font-family: 'Inter', sans-serif;
        color: #2d4d22;
        padding: 10px;
    }

    td {
        text-align: center;
        border-bottom: 1px solid #7EAB6E;
        padding: 10px;
    }

    select {
        font-family: 'Inter', sans-serif;
        font-size: 14px;
    }

    input[type="number"] {
        width: 50px;
        padding: 5px;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
    }

    .customize-section {
        text-align: center;
        margin-top: 50px;
    }

    td.center-cell,
    th.center-cell {
        text-align: center;
        padding: 15px;
    }

    a {
        text-decoration: none;
        color: #379937;
    }

    .dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #FAF9E7;
        min-width: 140px;
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: inline-block;
    }

    textarea {
        width: 100%;
        height: 150px;
        border: 2px solid #26451B;
        background: rgba(217, 217, 217, 0.06);
        font-family: 'Inter', sans-serif;
        margin: 0 auto;
        display: block;

    }

    .text-center {
    margin-top: 30px;
    }

  .text-center v-btn {
    margin: 0 10px;
     }

  .v-card {
    margin-bottom: 30px;
    margin-top: 20px;
    margin-left: 25px;
    margin-right: 24px;
  }

  .v-radio label {
    font-size: 15px;
    font-weight: 800;
    font-family: 'Inter', sans-serif;
    color: black;
    background-color: "#DCE4C3"

  }


    /* payment method section */
    .payment-card {
    display: flex;
    align-items: center;
    padding: 16px;
    }

    .payment-icon {
    margin-right: 16px;
    }

    .payment-info {
    flex-grow: 1;
    }

    .payment-name {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    line-height: 1.2; /* Added line-height property */
    }

    .payment-description {
    margin: 0;
    line-height: 1.2; /* Added line-height property */
    }
    /* onclick plan */
    .selected {
    background-color: #f5f5f5; /* Apply a background color to the selected plan */
    }

    .checkmark {
    float: right;
    margin-right: 10px;
    }


    /* customize your plan */

    .center-cell {
    text-align: center;
    }

    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropbtn {
    background-color: #4caf50;
    color: white;
    padding: 5px;
    font-size: 14px;
    border: none;
    cursor: pointer;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    padding: 10px;
    }

    .dropdown-content label {
    display: block;
    }

    .dropdown-content label input {
    margin-right: 5px;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }
    .basket_cards:hover{
        box-shadow: 0 8px 12px 0 rgba(130, 176, 135, 0.75);
    }
   
}


   

</style>
