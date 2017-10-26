<template>

<div class="panel-group">
<div class="panel panel-primary">
<div class="panel-heading">Profile </div>
<div class="panel-body">
<div class="card" style="width: 20rem; text-align: center; margin : 0px 400px;">

  <div v-if="open">

    <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control" v-model="list.name" required>
    </div>
    <div class="form-group">
      <label >Email@:</label>
      <input type="text" class="form-control" v-model="list.email" required>
    </div>
    <div class="form-group">
      <label >Profile Picture :</label>
      <input  v-on:change="fileSelected" type="file" class="form-control" v-model="list.photo" required>
    </div>

    <button type="submit" class="btn btn-danger" v-on:click="editexp()">accept</button>


  </div>


  <div class="card-block">
    <h4 class="card-title">{{data.name}} 's Profile</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{data.name}}</li>
    <li class="list-group-item">{{data.email}}</li>
    <li class="list-group-item">Join at {{data.created_at}}</li>
  </ul>
  <a  style ="float: right;" class="btn btn-warning" v-on:click="getready(data)">Edit My Profile</a>
</div>


</div>
</div>
</div>




</template>




<script>
export default{
  data() {
  return {
    open: false,
    data: [],
    list: {
      name : '',
      email : '',
      image : '',
    },
    id:null,
    }
  },
  props:['userid'],
  methods: {
    getdata: function() {

      var that = this;
    axios.get(`/user/` + this.userid.id)
      .then(function(response) {
        console.log(response);
        that.data = response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
    },

    editprofile: function() {
      var that = this;
      axios.put('/editprofile/'+this.list.id, this.$data.list)
      .then(function(response) {
        console.log(response);
        console.log('data sent');
        that.open = false;
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    getready: function(data) {
    this.list = data;
    this.open = true;
  },


  fileSelected: function(e) {
              let files = e.target.files || e.dataTransfer.files;
              if (!files.length) {
                   return;
              }
              this.createImage(files[0]);
          },

          createImage(file) {
              let image = new Image();
              let reader = new FileReader();

              reader.onload = (e) => {
                  this.image   = e.target.result;
              };
              reader.readAsDataURL(file);
          },
},


  mounted() {
    this.getdata();
    }
  };
</script>
