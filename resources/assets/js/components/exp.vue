<template>

<div class="panel-group">
<div class="panel panel-primary">
<div class="panel-heading">Experiences <a  style ="float:right;" class="btn btn-primary" v-on:click="open = !open">Add</a> </div>
<div class="panel-body">

<div v-if="open">

  <div class="form-group">
    <label >Experience:</label>
    <input type="text" class="form-control" v-model="list.title" required>
  </div>
  <div class="form-group">
    <label >discreption:</label>
    <input type="text" class="form-control" v-model="list.body" required>
  </div>
  <div class="form-group">
    <label >started at:</label>
    <input type="date" class="form-control" v-model="list.start" required>
  </div>
  <div class="form-group">
    <label >ended at:</label>
    <input type="date" class="form-control" v-model="list.end" required>
  </div>

  <button v-if="edit" type="submit" class="btn btn-danger" v-on:click="editexp()">Edit</button>
  <button  v-else type="submit" class="btn btn-primary" v-on:click="postdata1()">Submit</button>


</div>



     <ul v-for="(exp,key) in exps">
    <div class="panel panel-primary" style="text-align: center;">
       <li><h4 style="color: blue;">Experience:</h4>{{exp.title}}</li>
       <li><h4 style="color: blue;">Discreption:</h4>{{exp.body}}</li>
      <li>
        <a  class="btn btn-warning" @click="showeditform(exp.id)">Edit</a >
        <a  class="btn btn-danger" @click="deletdata(key,exp.id,exps)">Delete</a>
      </li>

  </div>
       <hr>
     </ul>




</div>
</div>
</div>

</template>

<script>

export default {
data () {
return {
  open: false,
  edit: false,
  exps : [],
  list: {
   title: '',
   body:'',
   start: '',
   end: '',
 },

  }
},
props:['expid'],
methods: {
  //get data from the database
  getdata : function() {
    var that = this;
  axios.get(`/java/`+ this.expid.id)
    .then(function (response) {
      that.exps = response.data;
    })
    .catch(function (error) {
      console.log(error);
    });
  },


    // post new Exp
    postdata1 : function() {
      var that = this;
    axios.post(`/postexp`, that.$data.list)
      .then(function (response) {
      console.log(response);
      that.open = false;
      that.edit = false;
      that.getdata();
      })
      .catch(function (error) {
        console.log(error);
      });
     },

   //show Edit button / Add  button + fill the  data .
     showeditform: function(exp) {
       this.open = true;
       this.edit = true;
      this.list = exp;
     },

        // edit the data
     editexp: function (){
       axios.put(`/editexp/`+ this.list.id, this.$data.list)
         .then(function (response) {
         console.log(response);
         this.open = false;
         this.edit = false;
         this.getdata();
         })
         .catch(function (error) {
           console.log(error);
         });
     },

     deletdata : function(key,id,exps) { //this function is not Finshied yet ! fix it later ...
         var that = this;
       axios.get(`/deletexp/`+id)
         .then(function (response) {
           that.exps.splice(key,1);
           console.log(key);
           console.log(id);
         })
         .catch(function (error) {
           console.log(error);
         });
     }

  },

  mounted() {
  this.getdata();
}
};

</script>
