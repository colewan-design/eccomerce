<template>
    <v-toolbar flat class="px-0">
      <v-toolbar-title>Add ons Items</v-toolbar-title>
      <v-text-field clearable v-model="table_search" outlined hide-details dense style="maxWidth: 1500px" label="Enter Product Name" class=""  @change="search"></v-text-field>
      <v-btn color="primary" dark class="ml-3" @change="search"> Search </v-btn>
      <v-divider class="mx-4" inset vertical></v-divider>
      <v-btn small dark color="teal" @click="create_additionals()" class="ma-2">
        <v-icon left> mdi-book-variant </v-icon> New Item
      </v-btn>
      <v-spacer></v-spacer>
    </v-toolbar>

<v-table
  fixed-header
  height="800px"
>
  <thead>
    <tr>
      <th class="text-left">
        Category
      </th>
      <th class="text-left">
        Add ons Name
      </th>
      <th class="text-left">
        Add ons Description
      </th>
      <th class="text-left">
        Amount
      </th>
      <th class="text-left">
        Action
      </th>
    </tr>
  </thead>
  <tbody>
    <tr
      v-for="item in additionals"
      :key="item.name"
    >
      <td>{{ item.category }}</td>
      <td>{{ item.additional_name }}</td>
      <td>{{ item.additional_description }}</td>
      <td>{{ item.amount }}</td>
      <td>
        <v-btn @click="edit(item)" small dark color="teal" class="ma-2">
          <v-icon left> mdi-pencil </v-icon> Edit
        </v-btn>
        <v-btn @click="delete_additionals(item.id, item.additional_name)" small dark color="teal" class="ma-2">
          <v-icon left> mdi-close </v-icon> Delete
        </v-btn>
      </td>
    </tr>
  </tbody>
</v-table>
  <v-dialog v-model="modal_additional" transition="dialog-top-transition" scrollable persistent max-width="100%">
  <v-card>
          <v-toolbar dense fixed height="60px">
              <v-toolbar-title>{{ formTitle }}</v-toolbar-title>
              <v-spacer></v-spacer>
              <div class="text-center">
        <v-btn @click="Save()" dark color="teal" class="ma-2">
                      <v-icon left> mdi-eye </v-icon>Save
                  </v-btn>
                  <v-btn dark color="orange" class="ma-2" @click="close()">
                      <v-icon left> mdi-close </v-icon> Close
                  </v-btn>
              </div>
          </v-toolbar>
          <v-col cols="13">
            <v-select
                label="Category"
                :items="['Spreads', 'Dehyrated Snacks', 'Chips']"
                v-model="additionals_crud.category"
            ></v-select>
            </v-col>
    
    <v-col cols="12" class="pa-5">
      <v-text-field label="Add ons Name" v-model="additionals_crud.additional_name" outlined hide-details dense></v-text-field>
    </v-col>
    <v-col cols="13" class="pa-5">
      <v-text-field label="Add ons Description" v-model="additionals_crud.additional_description" outlined hide-details dense></v-text-field>
    </v-col>
    <v-col cols="13">
      <v-text-field label="Amount" type="number" v-model="additionals_crud.amount" outlined hide-details dense></v-text-field>
      </v-col>
          <v-card-text>

    </v-card-text>
      </v-card>
  </v-dialog>
<v-dialog v-model="dialog_delete" persistent max-width="600">
          <v-card>
              <v-card-title class="text-h5"> Notification </v-card-title>
              <v-card-text class="ma-0">
                  <v-alert dense border="left" color="error" type="error">
                      {{notify_text}}
                  </v-alert>
                  <v-divider></v-divider>
              </v-card-text>
              <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="teal" text @click="deleteAdditionals()">Confirm</v-btn>
                  <v-btn color="grey" text @click="dialog_delete=false">Close</v-btn>
              </v-card-actions>
          </v-card>
      </v-dialog>
</template>

<script>
export default {
  data () {
    return {
      modal_additional: false,
      dialog_delete: false,
      editedIndex: -1,
      additionals: [],
      additionals_crud:{
        category:"",
        additional_name:"",
        additional_description:"",
        amount:"",
      },
      defaultItem: {  
        category:"",
        additional_name:"",
        additional_description:"",
        amount:"",
      },
      id:"",
      notify_text: '',
      table_search: '',
    }
  },
  created(){
      this.Additionals();
  },
  methods: {
      create_additionals() {
        this.key = this.key + 1;
        this.additionals = {};
        this.modal_additional = true;
      },
      async Additionals() {
          this.$axios.get('/Additional/index')
          .then((response) => {
            this.additionals = response.data;
          })
          .catch((error) => {
          });
      },
      Save() {
        if (this.id) {
          axios
            .put("/Additional/additional-update/" +this.id, this.additionals_crud)
            .then((response) => {
              this.Additionals();
              this.close();
            })
            .catch((error) => {
              console.error("There was an error!", error);
            });
        } else {
          axios
            .post("/Additional/additional-store", this.additionals_crud)
            .then((response) => {
              this.Additionals();
              this.close();
            })
            .catch((error) => {
              console.error("There was an error!", error);
            });
        }
      
            },
      edit(val) {
        console.log(val);
        this.id = val.id;
        this.editedIndex = this.additionals.indexOf(val);
        this.additionals_crud = Object.assign({}, val);
        this.modal_additional = true;
            },
      close() {
          this.modal_additional = false;
          this.$nextTick(() => {
            this.additionals_crud = Object.assign({}, this.defaultItem);
            this.editedIndex = -1;
          });
          this.Additionals();
      },
      delete_additionals: function(id, additionals) {
        this.notify_text = "Are You Sure To Delete This Additionals : " + additionals;
        this.id = id;
        this.dialog_delete = true;
            },
      async deleteAdditionals() {
          var res = await axios.delete("/Additional/additional-delete/" + this.id);
          if (res.status === 200) {
            this.Additionals();
            this.dialog_delete = false;
          } else {
            this.$Notice.error({
              title: "Error",
              desc: "Error occurred while loading data",
            });
          }
     },
     search() {
            axios.get('/Additional/search/additional/?s=' + this.table_search).then((response) => {
              if(this.table_search === ''){
                 this.Additionals();
              }else{
                 this.additionals = response.data.data
              }
            }).catch(() => {
              toast.fire({
              icon: 'error',
              title: "search failed"
              })
            })
      },
  },
  watch:{
    dialog(val) {
       val || this.close();
    },
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Additionals." : "Edit Additionals.";
    },
  },
}
</script>