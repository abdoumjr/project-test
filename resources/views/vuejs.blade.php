<div class="app">
  <ul v-for="exp in exps">
    <li>@{{exp.id}}</li>
    <li>@{{exp.title}}</li>
    <li>@{{exp.body}}</li>
  </ul>
</div>

<script>
window.Laravel = (!! json_encode([
  'csrfToken' => csrf_token(),
  'id' => $id,
  'url' => url('/')
]))
</script>

<script>


var app = new Vue({
el : '#app',
data : {
  exps : [],
},
methods : {
  getdata : function() {
    var that = this;
  axios.get(window.Laravel.url+'/java/'+ window.Laravel.id)
    axios.get('/java')
    .then(function (response) {
      that.exps = response.data;
    })
    .catch(function (error) {
      console.log(error);
    });
}
},
mounted() {
  var that = this;
  that.getdata();
}
})
</script>
