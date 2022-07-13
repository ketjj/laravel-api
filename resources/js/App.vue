<template>
    <div class="container d-flex justify-content-between mt-5">   
      <h1>Hello, Api!</h1>
    </div>
  
</template>

<script>
export default {
 name: 'App',

 data(){
  return{
    apiUrl: 'http://127.0.0.1:8000/api/posts',
    posts: null
  }
 },
 methods:{
  getApi(){
    // console.log('Hello,Api')
    axios.get(this.apiUrl)
    .then(res =>{
      this.posts = res.data;
      console.log(res.data);
    })
  }
 },

 mounted(){
  this.getApi();
 }
}
</script>

<style>

</style>