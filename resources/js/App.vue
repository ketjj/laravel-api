<template>
    <div class="container mt-5">   
      <h1>Hello, Api!</h1>

      <h5>Here are all the posts!</h5>

        <div 
        v-for="post in posts"
        :key="post.id" class="my-4">  

        <h3>{{ post.title}}</h3>
        <div>{{ post.content }}</div>
        </div>

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